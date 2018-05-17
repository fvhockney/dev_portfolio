<template>
<div id="content-container">
  <b-container>
    <div class="d-flex justify-content-around justify-content-md-end">
      <h5 v-for="type in this.types" class="text-light selector mx-md-4 mb-4 mb-md-0" :class="shouldBold(type)" @click="updateSelectedType(type)" :key="type">{{ type }}</h5>
    </div>
    <transition name="component-fade" mode="out-in">
      <project-cards :type="this.selectedType" :key="selectedType"></project-cards>
    </transition>
  </b-container>
</div>
</template>

<script>
import ProjectCards from './ProjectCards';

export default {
  name: 'Portfolio',
  components: {
    ProjectCards
  },
  data() {
    return {
      types: [
        'Web/Code',
        'Design',
        'Writing',
      ],
      selectedType: 'Web/Code',
    }
  },

  computed: {

  },

  methods: {
    shouldBold: function( type ) {
      return type === this.selectedType ? 'font-weight-bold' : null
    },
    updateSelectedType: function( type ) {
      this.selectedType = type
    }

  },
}
</script>

<style lang="scss" scoped>
.selector:hover {
    cursor: pointer;
}
.component-fade-enter-active,
.component-fade-leave-active {
    transition: opacity 0.5s;
}
.component-fade-enter,
.component-fade-leave-to {
    opacity: 0;
}

</style>
