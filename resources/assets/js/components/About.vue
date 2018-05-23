<template>
<div class="container mt-5">
    <selector :items='this.sections' @itemUpdated="updateSelectedType" :selectedItem="this.selectedSection" class="mb-4 mb-md-5"></selector>
    <transition name="drop-in" mode="out-in">
      <component :is="currentComponent"></component>
    </transition>
</div>
</template>

<script>
import Selector from './Selector';
import AboutBasics from './AboutBasics';
import AboutPhilosophy from './AboutPhilosophy';
import AboutProficiencies from './AboutProficiencies';

export default {
  name: 'About',
  components: {Selector, AboutBasics, AboutPhilosophy, AboutProficiencies},
  data() {
    return {
      sections: [
        'Basics',
        'Philosophy',
        'Proficiencies'
      ],
      selectedSection: 'Basics',
    }
  },

  computed: {
    currentComponent: function() {
      return 'about-' + this.selectedSection.toLowerCase()
    }
  },

  methods: {
    updateSelectedType: function(event) {
      this.selectedSection = event
    }
  },
}
</script>

<style lang="scss" scoped>

.content-box {
  width: fit-content;
  border-radius   : 1em;
  padding         : 3em;
  background-color: #f4f4f4;
  box-shadow      : 7px 11px 18px black;
  >ul {
    padding: 0;
  }
}
</style>
