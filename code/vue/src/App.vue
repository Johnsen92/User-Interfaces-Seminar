<template>
  <div id="app">
    <section class="ftco-counter ftco-bg-dark img" v-bind:style="{ height: appHeight + 'px' }" id="section-counter" data-stellar-background-ratio="0.5">
      <h1>Users</h1>
      <div class="list-item-wrapper" v-on:click="selectUser(user)" v-bind:key="user.UserID" v-for="user in users">
        <User v-bind:user="user"/>
      </div>
      <div class="list-item-wrapper">
        <button v-on:click="postUser" style="margin-top: 3px; float:left">Add User</button>
      </div>
    </section>
  </div>
</template>

<script>
import User from './components/User.vue'
import { GridPlugin } from '@syncfusion/ej2-vue-grids';

Vue.use(GridPlugin);

function indexById(arr, id, key){
  var i;
  for(i = 0; i < arr.length; i++){
    if(arr[i][key] == id)
      return i;
  }
}

export default {
  name: 'app',
  components: {
    User
  },
  methods: {
    selectUser: function(user){
      
    },
    editUser: function(user){
      fetch(this.endpoint + "/Users", { 
          body: JSON.stringify(user),
          method: "PUT",
          headers: {
            "Content-Type" : "application/json"
          }
        })
        .then((res) => {
          if(res.status == 200)
            this.users[indexById(this.users,user.UserID,"UserID")] = user;
          else
            alert("Error editing user " + user.UserName);
        });
    },
    deleteUser: function(user){
      fetch(this.endpoint + "/Users/" + user.UserID, { method: "DELETE" })
        .then((res) => {
          if(res.status == 200)
            this.users.splice(indexById(this.users,user.UserID,"UserID"),1);
          else
            alert("Error deleting user " + user.UserName);
        });
      
    },
    postUser: function(){
      fetch(this.endpoint + "/Users", { 
          body: JSON.stringify({
            "UserName" : "default",
            "UserMail" : "default",
            "UserPassword" : "default",
            "UserSalt" : "default"
          }),
          method: "POST",
          headers: {
            "Content-Type" : "application/json"
          }
        })
        .then(res => res.json())
        .then((user) => {
          this.users.push(user);
        });
    }
  },
  mounted() {
    fetch(this.endpoint + "/Users")
      .then(response => response.json())
      .then((data) => {
        this.appHeight = data.length*30 + 310;
        this.users = data;
      })
  },
  data() {
    return {
      endpoint: "http://localhost:50000",
      appHeight: 400,
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
  color: lightgray;
  margin-top: 60px;
}
h1 {
  color: lightgray;;
}
.list-item-wrapper {
  width: 50%;
  margin: 0 auto;
}
</style>
