<template lang="pug">
  b-navbar(toggleable='lg', type='dark', variant='dark')
    b-navbar-brand(href='#') Resources
    b-navbar-toggle(target='nav-collapse')
    b-collapse#nav-collapse(is-nav=true)
      b-navbar-nav
        b-nav-item(href='#') Link
        b-nav-item(href='#', disabled='') Disabled
      b-navbar-nav.ml-auto
        b-nav-form
          b-form-input.mr-sm-2(size='sm', placeholder='Search')
          b-button.my-2.my-sm-0(size='sm', type='submit') Search
        b-nav-item-dropdown(text='Lang', right='')
          b-dropdown-item(href='#') EN
          b-dropdown-item(href='#') ES
          b-dropdown-item(href='#') RU
          b-dropdown-item(href='#') FA
        b-nav-item-dropdown(right='')
          template(#button-content='')
          b-dropdown-item(href='#') Profile
          b-dropdown-item(href='#') Sign Out
</template>

<script>
export default {
  name: "NavBar"
}
</script>

<style scoped></style>
