<template>
  <div class="d-flex justify-content-around justify-content-md-end">
    <h5 v-for="item in this.items" class="text-light selector mx-md-4 mb-4 mb-md-0" :class="shouldBold(item)" @click="$emit('itemUpdated', item)" :key="item">{{ item }}</h5>
  </div>
</template>

<script>
export default {
  name:'Selector',
  props: ['items', 'selectedItem'],

  methods: {
    shouldBold: function( item ) {
      return item === this.selectedItem ? 'font-weight-bold' : null
    },
  },
}
</script>

<style lang="scss">
.selector:hover {
    cursor: pointer;
}
</style>
