<template>
  <div>
    <div class="grid-cell">{{user.UserName}}</div><div class="grid-cell">{{user.UserMail}}</div>
  </div>
</template>

<script>
export default {
  name: "User",
  props: ["user"]
}
</script>

<style scoped>
.grid-cell {
  width: 50%;
  border: solid 1px white;
  float: left;
}
</style>

