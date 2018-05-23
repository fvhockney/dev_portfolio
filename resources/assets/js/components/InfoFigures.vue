<template>
<div class="d-flex flex-wrap justify-content-around mb-4">
  <figure v-for="item in this.currentCategory" :key="item.name" class="d-inline-flex flex-column align-items-center m-3">
    <img :src="item.img" :alt="item.alt" :height="item.height" :width="item.width" :title="item.title" class="mb-2">
    <figcaption class="figure-caption text-center">{{item.name}}</figcaption>
    <div v-if="item.level" class="d-flex">
      <div v-for="i in 3" class="pill" :class="{'bg-gradient-primary' : isFilled(i, item.level)}"></div>
    </div>
  </figure>
</div>
</template>

<script>
import {
  techs
}
from '../json/projects.json';
export default {
  name: "InfoFigures",
  props: [ 'category' ],
  data() {
    return {
      techs,
    }
  },
  computed: {
    currentCategory: function() {
      return _.reject( this.techs, ( o ) => {
        return o.type !== this.category
      } )
    }
  },

  methods: {
    isFilled: function( value, level ) {
      return value <= level
    },

  },

}
</script>

<style lang="scss" scoped>
.pill {
    content: '';
    margin-right: 0.25em;
    &:last-child {
        margin-right: 0;
    }
    border: 1px solid #cacaca;
    border-radius: 7px;
    width: 25px;
    height: 10px;
    box-shadow: 1px 2px 4px #c5c5c5;
}
</style>
