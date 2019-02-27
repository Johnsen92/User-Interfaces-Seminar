<template>
  <div>
    <input style="width: 30%" v-bind:class="[user.UserSelected ? 'grid-row-selected' : '', editing ? 'grid-cell-edit' : '', 'grid-cell']" v-on:keyup.enter="submit" v-bind:disabled="!editing" v-model="user.UserName" />
    <input style="width: 40%" v-bind:class="[user.UserSelected ? 'grid-row-selected' : '', editing ? 'grid-cell-edit' : '', 'grid-cell']" v-on:keyup.enter="submit" v-bind:disabled="!editing" v-model="user.UserMail" />
    <button v-if="editing" v-on:click="submit" style="width: 10%" v-bind:class="[user.UserSelected ? 'grid-row-selected' : '', 'grid-cell']">Submit</button>
    <button v-else v-on:click="edit" style="width: 10%" v-bind:class="[user.UserSelected ? 'grid-row-selected' : '', 'grid-cell']">Edit</button>
    <button v-on:click="del" style="width: 10%" v-bind:class="[user.UserSelected ? 'grid-row-selected' : '', 'grid-cell']">Delete</button>
    <button v-on:click="select" style="width: 10%" v-bind:class="[user.UserSelected ? 'grid-row-selected' : '', 'grid-cell']">Select</button>
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
      this.$parent.selectUser(this.user);
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
  /* border: solid 1px white; */
  float: left;
  padding: 3px;
}
.grid-cell-edit {
  background: darkslategray;
}
.grid-row-selected {
  background: darkslategray;
}
</style>

