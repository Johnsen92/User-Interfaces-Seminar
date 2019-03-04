<template>
  <div>
    <select v-model="workout.ExerciseID" style="width: 30%" v-bind:class="[workout.WorkoutSelected ? 'grid-row-selected' : '', editing ? 'grid-cell-edit' : '', 'grid-cell']" v-on:keyup.enter="submit" v-bind:disabled="!editing">
      <option v-bind:key="exercise.ExerciseID" v-for="exercise in exercises" v-bind:value="exercise.ExerciseID">{{ exercise.ExerciseName }}</option>
    </select>
    <input style="width: 7%" v-bind:class="[workout.WorkoutSelected ? 'grid-row-selected' : '', editing ? 'grid-cell-edit' : '', 'grid-cell']" v-on:keyup.enter="submit" v-bind:disabled="!editing" type="number" v-model="workout.Reps" />
    <input style="width: 7%" v-bind:class="[workout.WorkoutSelected ? 'grid-row-selected' : '', editing ? 'grid-cell-edit' : '', 'grid-cell']" v-on:keyup.enter="submit" v-bind:disabled="!editing" type="number" v-model="workout.Weight" />
    <input style="width: 7%" v-bind:class="[workout.WorkoutSelected ? 'grid-row-selected' : '', editing ? 'grid-cell-edit' : '', 'grid-cell']" v-on:keyup.enter="submit" v-bind:disabled="!editing" type="number" v-model="workout.RPE" />
    <div style="width: 19%" v-bind:class="[workout.WorkoutSelected ? 'grid-row-selected' : '', editing ? 'grid-cell-edit' : '', 'grid-cell']">{{ dateFormat(new Date(workout.Timestamp),"dd.mm.yyyy HH:MM") }}</div>
    <button v-if="editing" v-on:click="submit" style="width: 10%" v-bind:class="[workout.WorkoutSelected ? 'grid-row-selected' : '', 'grid-cell']">Submit</button>
    <button v-else v-on:click="edit" style="width: 10%" v-bind:class="[workout.WorkoutSelected ? 'grid-row-selected' : '', 'grid-cell']">Edit</button>
    <button v-on:click="del" style="width: 10%" v-bind:class="[workout.WorkoutSelected ? 'grid-row-selected' : '', 'grid-cell']">Delete</button>
    <button v-on:click="select" style="width: 10%" v-bind:class="[workout.WorkoutSelected ? 'grid-row-selected' : '', 'grid-cell']">Select</button>
  </div>
</template>

<script>

export default {
  name: "Workout",
  props: ["workout","exercises"],
  data() {
    return {
      editing: false
    }
  },
  methods: {
    edit: function(){
      this.editing = true;
      this.$parent.selectWorkout(this.workout);
    },
    submit: function(){
      this.$parent.editWorkout(this.workout);
      this.editing = false;
    },
    del: function(){
      this.$parent.deleteWorkout(this.workout);
    },
    select: function(){
      this.$parent.selectWorkout(this.workout);
    },
    dateFormat: require('dateformat')
  }
}
</script>

<style scoped>
.grid-cell {
  /* border: solid 1px white; */
  float: left;
  padding: 3px;
  color: darkslategray;
}
.grid-cell-edit {
  background: gray;
}
.grid-row-selected {
  background: gray;
}
button {
  background: transparent;
  color: darkslategray;
}
button:hover {
  background: gray;
}
input {
  background: transparent;
  color: darkslategray;
  float: left;
  text-align: center;
  border: none;
}
select {
  color: darkslategray;
  border: none;
  background: transparent;
}
</style>

