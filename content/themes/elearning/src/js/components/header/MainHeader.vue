<template>
  <div
    class="header"
    :class="{ 'header--scrolled': scrolled }"
  >
    <div class="header__inner">
      <div class="header__body">
        <slot />
      </div>
    </div>
  </div>
</template>

<script>
import { debounce } from 'throttle-debounce'

export default {
  name: "main-header",

  data() {
    return {
      distanceToTrigger: 1,
      scrolled: false
    }
  },

  created () {
    window.addEventListener('scroll', this.headerScroll);
  },

  destroyed () {
    window.removeEventListener('scroll', this.headerScroll);
  },

  methods: {
    headerScroll: debounce(250, function() {
      this.scrolled = document.documentElement.scrollTop > this.distanceToTrigger
    })
  }
}
</script>
