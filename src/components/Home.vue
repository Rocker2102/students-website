<template lang="pug">
  div
    nav-bar
    b-container-fluid(align-v="center")
      b-jumbotron(header="Looking for Notes, Past Papers?", lead="Find everything here.")
        b-input-group
          b-form-input#search-box.align-self-center
        p#search-btn
          b-button(variant="outline-success") Search
    page-footer
</template>

<script>
import NavBar from "@/subcomponents/NavBar";
import Footer from "@/subcomponents/Footer";

export default {
  name: "Home",
  components: {
    'nav-bar': NavBar,
    'page-footer': Footer
  }
}
</script>

<style scoped>

#search-box {
  margin-left: 30%;
  margin-right: 30%;
}

#search-btn {
  margin-top: 1em;
}

</style>
