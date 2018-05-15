<template>
<nav>
  <b-navbar toggleable="md" type="dark" variant="faded" fixed="top">
    <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>
    <b-navbar-brand :to="{name: 'home'}">B</b-navbar-brand>

    <b-collapse is-nav id="nav_collapse">
      <b-navbar-nav class="ml-auto">
        <b-nav-item :to="{ name: 'home'}" exact>Home</b-nav-item>
        <b-nav-item :to="{ name: 'about'}">About</b-nav-item>
        <b-nav-item :to="{ name: 'contact'}">Contact</b-nav-item>
        <b-nav-item :to="{ name: 'portfolio'}">Portfolio</b-nav-item>
      </b-navbar-nav>
    </b-collapse>

  </b-navbar>
</nav>
</template>

<script>
export default {
  name: 'Links'
}
</script>

<style lang="scss">

</style>
