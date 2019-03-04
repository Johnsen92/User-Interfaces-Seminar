<template>
  <div id="app">
    <section class="ftco-counter ftco-bg-dark img" v-bind:style="{ height: height + 'px' }" id="section-counter" data-stellar-background-ratio="0.5">
      <UserGrid v-bind:endpoint="endpoint" />
    </section>
    <section  class="ftco-counter img" style="height: 500px; padding-top: 0px" v-if="selectedUser">
      <WorkoutGrid v-bind:endpoint="endpoint" v-bind:user="selectedUser"/>
    </section>
  </div>
</template>

<script>
import UserGrid from './components/UserGrid.vue'
import WorkoutGrid from './components/WorkoutGrid.vue'

export default {
  name: 'app',
  components: {
    UserGrid,
    WorkoutGrid
  },
  methods: {
    selectUser: function(user) {
      this.selectedUser = user;
    },
    selectWorkout: function(workout) {
      this.selectedWorkout = workout;
    }
  },
  data() {
    return {
      endpoint: "http://localhost:50000",
      height: 500,
      selectedUser: null,
      selectedWorkout: null,
      selectedExercise: null
    }
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: lightgray;
  margin-top: 0px;
}
h1 {
  color: lightgray;;
}
</style>
