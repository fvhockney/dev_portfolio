<template>
<div id="main-container" :class="classObject">
  <div class="background-container">
    <img class="bg rotate" src="/imgs/personal_logo.svg" alt="">
  </div>
  <links></links>
  <transition name="drop-in" mode="out-in">
    <router-view :key="$route.path"></router-view>
  </transition>
</div>
</template>

<script>
import Links from './components/Links.vue';
export default {
  name: 'Container',
  components: {
    Links
  },
  data() {
    return {
      display: true, // TODO: Change to false before deployment
    }
  },

  computed: {
    isFullpage: function() {
      return this.$route.name === 'home' ? true : false
    },

    classObject: function() {
      return {
        'home-grid': this.display,
        'd-none': !this.display
      }
    }
  },

  methods: {
    introDone: function() {
      this.display = true;
      document.getElementsByTagName( 'body' )[ 0 ].style.backgroundColor = "#262626"
    }
  },
}
</script>

<style lang="scss" scoped>


#main-container {
    overflow-x: hidden;
}

.home-grid {
    min-height: 100vh;
    display: grid;
    grid-template-columns: [start] 1fr [end];
    grid-template-rows: [rstart] 65px [rline2] 1fr [rend];
    grid-column-gap: 10px;
    grid-row-gap: 10px;
}

.background-container {
    position: fixed;
    z-index: -100;
    min-height: 100vh;
    width: 100%;
    transform: rotateZ(7deg);
}

img.bg {
    /* Set rules to fill background */
    min-height: 100%;
    min-width: 100%;

    /* Set up proportionate scaling */
    width: 100%;
    height: auto;

    /* Set up positioning */
    position: fixed;
    top: 0;
    left: 0;
}

@media screen and (max-width: 1023px) {
    /* Specific to this particular image */
    img.bg {
        left: 50%;
        margin-left: -50%;
        /* 50% */
    }
    .background-container {
        transform: rotateZ(25deg) scale(1.2);
    }
}
</style>
