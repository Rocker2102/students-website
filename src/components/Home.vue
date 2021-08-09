<template lang="pug">
div
  nav-bar
  main.container

</template>

<script>
import NavBar from "@/subcomponents/NavBar";

export default {
  name: "Home",
  components: {
    'nav-bar': NavBar
  }
}
</script>

<style scoped>

</style>
