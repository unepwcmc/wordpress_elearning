<template>
  <div @click="handleClick">
    <slot />
  </div>
</template>

<script>
  export default {
    'name': 'AddClassOnClick',

    props: {
      className: {
        type: String,
        required: true
      },
      element: {
        type: String,
        required: true
      },
    },

    methods: {
      handleClick(e) {
        if (e.target.matches(this.element)) {
          e.target.classList.toggle(this.className)
        }
      }
    }
  }
</script>
