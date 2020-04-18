<template>
<div>
  <h1 class="text-light mb-4 text-center text-md-left">{{ type }}</h1>

  <!-- Cards -->
  <div class="d-flex flex-wrap justify-content-around">

    <b-card
      v-for="project in this.typedProjects"
      :key='project.id'
      :title='project.title'
      :footer="project.languages"
      :img-src="project.image"
      img-alt="Cute Kittens"
      img-top style="max-width: 16rem;"
      class="mb-5 mx-4 text-center"
    >
      <p class="card-text" v-html="project.descriptionShort">
      </p>
      <div class="v-button-group">
        <b-button v-b-modal="modalName(project)" variant="primary">Learn More</b-button>
        <b-button
         variant="success"
         :disabled="isDisabled(project)"
         @click="goToProject(project)"
      >
          Visit Project
      </b-button>
      </div>
    </b-card>

  </div>

  <!-- Modals -->
  <b-modal
    v-for="project in this.typedProjects"
    :key='project.id'
    :id="modalName(project)"
    :title="project.title"
    title-tag="h2"
    cancel-title="Close"
    ok-title="Visit Project"
    @ok.preventDefault="goToProject(project)"
  >
    <p class="my-4" v-html="project.descriptionLong"></p>
  </b-modal>
</div>
</template>

<script>
import {
  projects,
}
  from '../../assets/projects.json';

export default {
  name: 'ProjectCards',
  props: {
    type: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      projects,
    };
  },

  computed: {
    typedProjects: function () {
      return this.projects.filter((o) => o.type === this.type);
    },
  },
  methods: {
    modalName: function (project) {
      return 'modal' + project.id;
    },
    goToProject: function (project) {
      window.open(project.url);
    },
    isDisabled: function (project) {
      return !project.url;
    }
  },
};
</script>

<style lang="scss" scoped>
.v-button-group > button:first-of-type {
  margin-bottom: .5em;
}

@media screen and (min-width: 330px) {
  .v-button-group > button:first-of-type {
    margin-bottom: 0;
  }

  .v-button-group {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
  }
}
</style>
