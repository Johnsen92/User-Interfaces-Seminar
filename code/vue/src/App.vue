<template>
  <div id="app">
    <section class="ftco-counter ftco-bg-dark img" v-bind:style="{ height: height + 'px' }" id="section-counter" data-stellar-background-ratio="0.5">
      <UserGrid v-bind:endpoint="endpoint" />
    </section>
  </div>
</template>

<script>
import UserGrid from './components/UserGrid.vue'

export default {
  name: 'app',
  components: {
    UserGrid
  },
  methods: {

  },
  data() {
    return {
      endpoint: "http://localhost:50000",
      height: 500,
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
