<template>
  <div>
    <h1>Users</h1>
    <div class="list-item-wrapper" v-bind:key="user.UserID" v-for="user in users">
      <User v-bind:user="user"/>
    </div>
    <div class="list-item-wrapper">
      <button v-on:click="postUser" style="margin-top: 3px; float:left">Add User</button>
    </div>
  </div>
</template>

<script>
import User from './User.vue'

function indexById(arr, id, key){
  var i;
  for(i = 0; i < arr.length; i++){
    if(arr[i][key] == id)
      return i;
  }
}

export default {
  name: 'UserGrid',
  props: ["endpoint"],
  components: {
    User
  },
  methods: {
    selectUser: function(user){
      alert(user.UserID);
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
        this.users = data;
      })
  },
  data() {
    return {
      height: 0,
      users: []
    }
  }
}
</script>

<style>
h1 {
  color: lightgray;;
}
.list-item-wrapper {
  width: 50%;
  margin: 0 auto;
}
</style>