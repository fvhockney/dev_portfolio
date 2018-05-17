<template>
<div>
  <h1 class="text-light mb-4 text-center text-md-left">{{ type }}</h1>

  <!-- Cards -->
  <div class="d-flex flex-wrap justify-content-around">

    <b-card v-for="project in this.typedProjects" :key='project.id' :title='project.title' :footer="project.languages" :img-src="project.image" img-alt="Cute Kittens" img-top style="max-width: 16rem;" class="mb-5 mx-4">
      <p class="card-text" v-html="project.descriptionShort">
      </p>
      <b-button v-b-modal="modalName(project)" variant="primary">Learn More</b-button>
      <b-button variant="success" @click="goToProject(project)">Visit Project</b-button>
    </b-card>

  </div>

  <!-- Modals -->
  <b-modal v-for="project in this.typedProjects" :key='project.id' :id="modalName(project)" :title="project.title" title-tag="h2" cancel-title="Close" ok-title="Visit Project" @ok.preventDefault="goToProject(project)">
    <p class="my-4">{{ project.descriptionLong }}</p>
  </b-modal>
</div>
</template>

<script>
import {
  projects
}
from '../json/projects.json';
export default {
  name: 'ProjectCards',
  props: [ 'type' ],
  data() {
    return {
      projects,
      currentImagePos: 0
    }
  },

  computed: {
    typedProjects: function() {
      return _.reject( this.projects, ( o ) => {
        return o.type !== this.type
      } )
    }
  },
  methods: {
    modalName: function( project ) {
      return "modal" + project.id
    },
    goToProject: function( project ) {
      window.location.href = project.url
    },
  },
}
</script>

<style lang="scss">
</style>
