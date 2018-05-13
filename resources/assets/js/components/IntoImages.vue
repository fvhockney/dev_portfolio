<template>
  <div>
  <template v-for="image in images">
    <div v-if="image.type==='text'" :key="image.id"
    :class="[image.show && showImages ? 'full-height d-flex align-items-center justify-content-center' : 'd-none']">
    <transition
    v-if="image.show && image.id===28"
    name="fade-out"
    @after-enter="changeChildClass"
    appear>
    <p class="display-1 text-center">{{ image.text }}</p>
  </transition>
  <p v-else class="display-1 text-center">{{ image.text }}</p>
  </div>
  <img v-else class="bg" :class="{'d-none' : !image.show}" v-bind:src="image.src" :key="image.id">
  </template>
</div>
</template>

<script>
export default {
  name: 'IntroImages',
  props: ['showImages'],
  data() {
    return {
      images: [ {
          id: 0,
          type: 'text',
          text: "Some People Live Here",
          show: false
        },
        {
          id: 1,
          type: 'image',
          src: '/imgs/alley-2995354_1280.jpg',
          show: false
        },
        {
          id: 2,
          type: 'image',
          src: '/imgs/alley-2995354_1280.jpg',
          show: false
        },
        {
          id: 3,
          type: 'image',
          src: '/imgs/architecture-3271049_1280.jpg',
          show: false
        },
        {
          id: 4,
          type: 'image',
          src: '/imgs/architecture-3320215_1280.jpg',
          show: false
        },
        {
          id: 5,
          type: 'image',
          src: '/imgs/architecture-3350150_1280.jpg',
          show: false
        },
        {
          id: 6,
          type: 'image',
          src: '/imgs/church-3024768_1280.jpg',
          show: false
        },
        {
          id: 7,
          type: 'image',
          src: '/imgs/city-3336723_1280.jpg',
          show: false
        },
        {
          id: 8,
          type: 'image',
          src: '/imgs/city-3349550_1280.jpg',
          show: false
        },
        {
          id: 9,
          type: 'image',
          src: '/imgs/cyprus-3375022_1280.jpg',
          show: false
        },
        {
          id: 10,
          type: 'image',
          src: '/imgs/grange-3375765_1280.jpg',
          show: false
        },
        {
          id: 11,
          type: 'image',
          src: '/imgs/grange-3375765_1280.jpg',
          show: false
        },
        {
          id: 12,
          type: 'image',
          src: '/imgs/house-3206687_1280.jpg',
          show: false
        },
        {
          id: 13,
          type: 'image',
          src: '/imgs/house-3280972_1280.jpg',
          show: false
        },
        {
          id: 14,
          type: 'image',
          src: '/imgs/house-3286172_1280.jpg',
          show: false
        },
        {
          id: 15,
          type: 'image',
          src: '/imgs/house-3377249_1280.jpg',
          show: false
        },
        {
          id: 16,
          type: 'image',
          src: '/imgs/hut-202035_1280.jpg',
          show: false
        },
        {
          id: 17,
          type: 'image',
          src: '/imgs/nature-1547302_1280.jpg',
          show: false
        },
        {
          id: 18,
          type: 'image',
          src: '/imgs/nature-3326745_1280.jpg',
          show: false
        },
        {
          id: 19,
          type: 'image',
          src: '/imgs/rock-island-123406_1280.jpg',
          show: false
        },
        {
          id: 20,
          type: 'image',
          src: '/imgs/street-3251006_1280.jpg',
          show: false
        },
        {
          id: 21,
          type: 'image',
          src: '/imgs/street-3361582_1280.jpg',
          show: false
        },
        {
          id: 22,
          type: 'image',
          src: '/imgs/tree-log-3352606_1280.jpg',
          show: false
        },
        {
          id: 23,
          type: 'image',
          src: '/imgs/water-3350488_1280.jpg',
          show: false
        },
        {
          id: 24,
          type: 'image',
          src: '/imgs/waters-3365494_1280.jpg',
          show: false
        },
        {
          id: 25,
          type: 'image',
          src: '/imgs/wood-3339857_1280.jpg',
          show: false
        },
        {
          id: 26,
          type: 'image',
          src: '/imgs/wood-fibre-boards-3362963_1280.jpg',
          show: false
        },
        {
          id: 27,
          type: 'image',
          src: '/imgs/wood-fibre-boards-3362971_1280.jpg',
          show: false
        },
        {
          id: 28,
          type: 'text',
          text: "Welcome To My Home ...",
          show: false
        },
      ],
      introInterval: 1500,
      imageCounter: 0,
    }
  },

  mounted: function() {
    this.gogoGadget()
  },

  methods: {
    gogoGadget: function() {
      if ( this.imageCounter < this.images.length ) {
        this.images[ this.imageCounter ].show = !this.images[ this.imageCounter ].show
        if ( this.imageCounter >= 1 ) {
          this.images[ this.imageCounter - 1 ].show = !this.images[ this.imageCounter - 1 ].show
        }
        this.imageCounter++
          this.introInterval = this.introInterval / 1.2
        setTimeout( this.gogoGadget, this.introInterval )
      }
    },

    changeChildClass: function( el ) {
      el.classList.remove( 'display-1' )
      el.classList.add( 'd-none' )
      this.$emit('hideImages')
    },
  },
}
</script>

<style lang="scss" scoped>
.fade-out-enter {
    opacity: 1;
}

.fade-out-enter-active {
    transition: all 3s;
    transition-delay: 2s;
}

.fade-out-enter-to {
    opacity: 0;
    transform: scale(4);
}

img.bg {
    /* Set rules to fill background */
    min-height: 100%;
    min-width: 1024px;

    /* Set up proportionate scaling */
    width: 100%;
    height: auto;

    /* Set up positioning */
    position: fixed;
    top: 0;
    left: 0;
}

@media screen and (max-width: 1024px) {
    /* Specific to this particular image */
    img.bg {
        left: 50%;
        margin-left: -512px;
        /* 50% */
    }
}
</style>
