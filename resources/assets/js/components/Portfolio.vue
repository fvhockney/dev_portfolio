<template>
<div id="content-container">
  <b-container>
    <div class="d-flex flex-wrap justify-content-around">
      <b-card v-for="project in this.projects" :key='project.id' :title='project.title' :footer="project.languages" :img-src="project.image" img-alt="Cute Kittens" img-top style="max-width: 16rem;" class="mb-5 mx-4">
        <p class="card-text" v-html="project.descriptionShort">
        </p>
        <b-button v-b-modal="modalName(project)" variant="primary">Learn More</b-button>
        <b-button variant="success" @click="goToProject">Visit Project</b-button>
      </b-card>
    </div>
  </b-container>

  <!-- Modals -->
  <b-modal v-for="project in this.projects" :key='project.id' :id="modalName(project)" :title="project.title" title-tag="h2" cancel-title="Close" ok-title="Visit Project" @ok.preventDefault="goToProject">
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
  name: 'Portfolio',
  data() {
    return {
      projects
    }
  },
  methods: {
    goToProject: function( e ) {
      alert( 'Going to site' )
    },
    modalName: function( project ) {
      return "modal" + project.id
    }
  },
}
</script>

<style lang="scss">
</style>
