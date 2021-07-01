<template>
  <div
    class="modal"
    :class="{ 'modal--active': active }"
  >
    <div class="modal__inner">

      <div class="modal__body">
        <div
          v-on:click="closeModal"
          class="modal__close"
        >
          <span class="modal__close-span"></span>
          <span class="modal__close-span"></span>
        </div>

        <div class="modal__content">
          <slot />
        </div>
      </div>
    </div>

    <div
      class="modal__overlay"
      v-on:click="closeModal"
    />
  </div>
</template>

<script>
  export default {
    name: 'Modal',

    props: {
      config: {
        type: Object,
        default: () => {}
      }
    },

    data () {
      return {
        active: false,
        scrollbarWidth: 0,
        scrollTop: 0
      }
    },

    mounted() {
      this.$eventHub.$on('modal-open', this.openModal)
    },

    methods: {
      closeModal() {
        this.active = false
        this.toggleBodyClass('removeClass', 'layout__body--modal-active');
      },

      openModal() {
        this.active = true
        this.toggleBodyClass('addClass', 'layout__body--modal-active');
      },

      toggleBodyClass(addRemoveClass, className) {
        const body = document.body;

        if (addRemoveClass === 'addClass') {
          // When the modal is shown, we want a fixed body
          this.scrollTop = window.scrollY;
          this.scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
          body.classList.add(className);
          body.style.top = `-${this.scrollTop}px`;
          body.style.paddingRight = `${this.scrollbarWidth}px`;
        } else {
          // When the modal is hidden we want to go back to where we had scrolled
          body.classList.remove(className);
          body.style.top = 0;
          body.style.paddingRight = 0;
          window.scrollTo(0, parseInt(`-${this.scrollTop}px` || '0') * -1);
        }
      }
    }
  }
</script>
