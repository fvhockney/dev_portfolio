<template>
<div id="content-container">
  <b-container>

    <div v-for="type in this.types">
      <h1 class="text-light">{{ type }}</h1>
      <project-cards :type="type"></project-cards>
    </div>
    </b-container>
</div>
</template>

<script>

import ProjectCards from './ProjectCards';

export default {
  name: 'Portfolio',
  components: {ProjectCards},
  data() {
    return {
      types: [
        'Web/Code',
        'Design',
        'Writing',
      ],
    }
  },


  methods: {


  },
}
</script>

<style lang="scss">
</style>
