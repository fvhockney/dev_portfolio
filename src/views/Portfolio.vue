<template>
  <div id="content-container">
    <b-container>
      <selector
       :items='this.types'
       @itemUpdated="updateSelectedType"
       :selectedItem="this.selectedType"
      />
      <transition name="component-fade" mode="out-in">
        <project-cards
          :type="this.selectedType"
          :key="selectedType"
         />
      </transition>
    </b-container>
  </div>
</template>

<script>
import ProjectCards from '../components/Portfolio/ProjectCards.vue';
import Selector from '../components/Selector.vue';

export default {
  name: 'Portfolio',
  components: {
    ProjectCards,
    Selector,
  },
  data() {
    return {
      types: [
        'Web/Code',
        'Design',
        'Writing',
      ],
      selectedType: 'Web/Code',
    };
  },

  computed: {

  },

  methods: {
    updateSelectedType: function (event) {
      this.selectedType = event;
    },

  },
};
</script>

<style lang="scss" scoped>

.component-fade-enter-active,
.component-fade-leave-active {
    transition: opacity 0.5s;
}
.component-fade-enter,
.component-fade-leave-to {
    opacity: 0;
}

</style>
