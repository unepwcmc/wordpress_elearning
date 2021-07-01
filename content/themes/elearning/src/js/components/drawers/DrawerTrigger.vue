<template>
  <button
    :class="className"
    :aria-controls="controls"
    :data-drawer-toggle="drawer"
    :aria-label="label"
    aria-expanded="false"
    @click="emitMethod"
  >
    <slot />
  </button>
</template>

<script>
  export default {
    name: 'DrawerTrigger',

    props: {
      className: {
        type: String,
        default: ''
      },
      controls: {
        type: String,
        default: ''
      },
      drawer: {
        type: String,
        default: ''
      },
      label: {
        type: String,
        default: ''
      }
    },

    methods: {
      emitMethod () {
        console.log('emit');
         this.$eventHub.$emit('drawerOpened', this.drawer);
      }
    }
  }
</script>
