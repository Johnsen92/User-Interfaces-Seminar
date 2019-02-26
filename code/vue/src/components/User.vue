<template>
  <div>
    <input style="width: 30%" v-on:keyup.enter="submit" v-bind:disabled="!editing" class="grid-cell" v-model="user.UserName" />
    <input style="width: 40%" v-on:keyup.enter="submit" v-bind:disabled="!editing" class="grid-cell" v-model="user.UserMail" />
    <button v-if="editing" v-on:click="submit" style="width: 10%" class="grid-cell">Submit</button>
    <button v-else v-on:click="edit" style="width: 10%" class="grid-cell">Edit</button>
    <button v-on:click="del" style="width: 10%" class="grid-cell">Delete</button>
    <button v-on:click="select" style="width: 10%" class="grid-cell">Select</button>
  </div>
</template>

<script>
export default {
  name: "User",
  props: ["user"],
  data() {
    return {
      editing: false
    }
  },
  methods: {
    edit: function(){
      this.editing = true;
    },
    submit: function(){
      this.$parent.editUser(this.user);
      this.editing = false;
    },
    del: function(){
      this.$parent.deleteUser(this.user);
    },
    select: function(){
      this.$parent.selectUser(this.user);
    }
  }
}
</script>

<style scoped>
.grid-cell {
  border: solid 1px white;
  float: left;
  padding: 3px;
}
input {
  background: transparent;
  color: lightgray;
  float: left;
}
</style>

