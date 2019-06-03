<template>
  <div>
    <h1>Workouts for {{ user.UserName }}</h1>
    <div class="list-item-wrapper">
      <div class="grid-header-cell" style="width: 30%">Exercise</div>
      <div class="grid-header-cell" style="width: 7%">Reps</div>
      <div class="grid-header-cell" style="width: 7%">Weight</div>
      <div class="grid-header-cell" style="width: 7%">RPE</div>
      <div class="grid-header-cell" style="width: 19%">Time</div>
      <div class="grid-header-cell" style="width: 10%">Edit</div>
      <div class="grid-header-cell" style="width: 10%">Delete</div>
      <div class="grid-header-cell" style="width: 10%">Select</div>
    </div>
    <div class="list-item-wrapper" v-bind:key="workout.WorkoutID" v-for="workout in workoutForUser">
      <Workout v-on:select="selectWorkout" v-bind:workout="workout" v-bind:exercises="exercises"/>
    </div>
    <div class="list-item-wrapper">
      <button v-on:click="postWorkout" style="margin-top: 3px; float:left">Add Workout</button>
    </div>
  </div>
</template>

<script>
import Workout from './Workout.vue'

function indexById(arr, id, key){
  var i;
  for(i = 0; i < arr.length; i++){
    if(arr[i][key] == id)
      return i;
  }
}

export default {
  name: 'WorkoutGrid',
  props: ["endpoint","user"],
  components: {
    Workout
  },
  methods: {
    selectWorkout: function(workout){
      if(this.selected)
        this.selected.WorkoutSelected = false;
      this.selected = this.workouts[indexById(this.workouts,workout.WorkoutID,"WorkoutID")];
      this.selected.WorkoutSelected = true;
      this.$parent.selectWorkout(this.selected);
    },
    editWorkout: function(workout){
      fetch(this.endpoint + "/Workouts", { 
          body: JSON.stringify(workout),
          method: "PUT",
          headers: {
            "Content-Type" : "application/json"
          }
        })
        .then((res) => {
          if(res.status == 200)
            this.workouts[indexById(this.workouts,workout.WorkoutID,"WorkoutID")] = workout;
          else
            alert("Error editing workout " + workout.WorkoutID);
        });
    },
    deleteWorkout: function(workout){
      fetch(this.endpoint + "/Workouts/" + workout.WorkoutID, { method: "DELETE" })
        .then((res) => {
          if(res.status == 200)
            this.workouts.splice(indexById(this.workouts,workout.WorkoutID,"WorkoutID"),1);
          else
            alert("Error deleting workout " + workout.WorkoutID);
        });
      
    },
    postWorkout: function(){
      fetch(this.endpoint + "/Workouts", { 
          body: JSON.stringify({
            "UserID" : this.user.UserID,
            "SessionID" : 1,
            "ExerciseID" : 1,
            "Reps" : 0,
            "Weight" : 0.0,
            "RPE" : 0,
            "Timestamp" : Date.now()
          }),
          method: "POST",
          headers: {
            "Content-Type" : "application/json"
          }
        })
        .then(res => res.json())
        .then((workout) => {
          workout.WorkoutSelected = false;
          this.workouts.push(workout);
        });
    }
  },
  mounted() {
    fetch(this.endpoint + "/Workouts")
      .then(response => response.json())
      .then((data) => {
        var i;
        for(i = 0; i < data.length; i++)
          data[i].WorkoutSelected = false;
        this.workouts = data;
      });
    fetch(this.endpoint + "/Exercises")
      .then(response => response.json())
      .then((data) => {
        this.exercises = data;
      })
  },
  data() {
    return {
      height: 0,
      selected: null,
      workouts: [],
      exercises: []
    }
  },
  computed: {
    workoutForUser() {
      return this.workouts.filter(workout => workout.UserID == this.user.UserID);
    }
  }
}
</script>

<style scoped>
h1 {
  color: darkslategray;;
}
.list-item-wrapper {
  width: 70%;
  margin: 0 auto;
}
button {
  background: transparent;
  color: darkslategray;
}
button:hover {
  background: gray;
}
.grid-header-cell {
  font-weight: bold;
  float: left;
  color: darkslategray;
}

</style>
