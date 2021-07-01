<template>
  <div class="drawers__overlay" @click="clickHandler"></div>
</template>

<script>
export default {
  name: 'DrawersOverlay',

  methods: {
    clickHandler () {
       this.$eventHub.$emit('drawerClosed');
    }
  }
}
</script>
