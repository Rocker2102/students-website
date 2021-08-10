<template lang="pug">
  b-navbar(toggleable='lg', type='dark', variant='dark')
    b-navbar-brand(href='#') Resources
    b-navbar-toggle(target='nav-collapse')
    b-collapse#nav-collapse(is-nav=true)
      b-navbar-nav
        b-nav-item(href='#') Link
        b-nav-item(href='#', disabled=true) Disabled

</template>

<script>
export default {
  name: "NavBar"
}
</script>

<style scoped></style>
