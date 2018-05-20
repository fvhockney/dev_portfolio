<template>
<div id="content-container">
  <b-container>
    <selector :items='this.sections' @itemUpdated="updateSelectedType" :selectedItem="this.selectedSection" class="mb-4 mb-md-5"></selector>
    <transition name="drop-in" mode="out-in">
      <component :is="currentComponent"></component>
    </transition>
  </b-container>
</div>
</template>

<script>
import Selector from './Selector';
import AboutBasic from './AboutBasic';
import AboutAdvanced from './AboutAdvanced';
import AboutExpert from './AboutExpert';

export default {
  name: 'About',
  components: {Selector, AboutBasic, AboutAdvanced, AboutExpert},
  data() {
    return {
      sections: [
        'Basic',
        'Advanced',
        'Expert'
      ],
      selectedSection: 'Basic',
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
