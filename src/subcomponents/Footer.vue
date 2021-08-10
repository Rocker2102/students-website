<template lang="pug">
  footer.d-flex.flex-wrap.justify-content-between.align-items-center.py-3.my-4.border-top
    .col-md-4.d-flex.align-items-center
    ul.nav.col-md-4.justify-content-end.list-unstyled.d-flex
      li.container-fluid Created with <3 on
        img(src="@/assets/github.svg", alt="GitHub", height=30, width=30)

</template>

<script>
export default {
  name: "Footer"
}
</script>

<style scoped>
li img {
  margin-left: 5px;
}
</style>
