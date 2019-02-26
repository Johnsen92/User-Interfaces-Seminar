<template>
  <div id="app">
    <section class="ftco-counter ftco-bg-dark img" id="section-counter" data-stellar-background-ratio="0.5">
      <h1>Users</h1>
      <div class="list-item-wrapper" v-on:click="selectUser(user.UserID)" v-bind:key="user.UserID" v-for="user in users">
        <User v-bind:user="user"/>
      </div>
    </section>
  </div>
</template>

<script>
import User from './components/User.vue'


export default {
  name: 'app',
  components: {
    User
  },
  methods: {
    selectUser: function(id){
      alert(id);
    }
  },
  mounted() {
    fetch(this.endpoint + "/Users")
      .then(response => response.json())
      .then((data) => {
        this.users = data;
      })
  },
  data() {
    return {
      endpoint: "http://localhost:50000",
      users: []
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
  color: #ffffff;
  margin-top: 60px;
}
h1 {
  color: white;
}
.list-item-wrapper {
  width: 50%;
  margin: 0 auto;
}
</style>
