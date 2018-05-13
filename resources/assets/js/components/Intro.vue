<template>
  <div :class="[displayed ? 'full-height d-block' : 'd-none']">
    <intro-images :showImages="this.showImages" @hideImages="hideImages"></intro-images>
    <intro-terminal :showTerminal="this.showTerminal" @completed="finished"></intro-terminal>
  </div>
</template>

<script>
import IntroTerminal from './IntroTerminal';
import IntroImages from './IntoImages';
import { Bus } from './EventBus';

export default {
  name: 'Intro',
  components:{IntroTerminal, IntroImages},
  data() {
    return {
      showTerminal: false,
      showImages: true,
      displayed: true,
    }
  },

  methods: {
    hideImages: function() {
      this.showImages = false
      this.showTerminal = true
    },

    finished: function() {
      this.displayed = false
      Bus.$emit('introDone')
    }
  },

}
</script>

<style lang="scss" scoped>
</style>
