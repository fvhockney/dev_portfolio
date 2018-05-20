<template>
<div class="content-box mx-auto">
  <h1 class="text-center">Expert</h1>
  <p>
    When all you have is a hammer, everything looks like a nail. This is an apt description of people who only work in one area. By utilizing and learning a variety of technologies I can leverage the appropriate tool for the job. Additionally, this makes
    me a versitile worker and minimizes the social cost when starting a project which is already underway.
  </p>
  <p>
    Below you will find a selection of languages, frameworks, and technologies which I use or have some familiarity with.
  </p>
  <div v-for="(cat, key) in this.categories" :key="key">
    <h4>{{cat}}</h4>
    <info-figures :category="key"></info-figures>
  </div>
</div>
</template>

<script>
import InfoFigures from './InfoFigures';


export default {
  name: 'AboutExpert',
  components: {
    InfoFigures
  },
  data() {
    return {
      categories: {
        language: "Languages",
        program: "Programs",
        os: "Operating Systems",
        stack: "My Personal Stack"
      }
    }
  },
}
</script>

<style lang="scss" scoped>

</style>
