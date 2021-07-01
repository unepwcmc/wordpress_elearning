<template>
  <div
    class="drawer"
    :class="[drawerSideClass, { 'drawer--active' : isActive }]"
    :data-drawer="name"
  >
    <div class="drawer__inner">
      <div class="drawer__header">
        <button
          class="drawer__close"
          aria-label="Close"
          @click="closeDrawer"
        >
         <IconClose />
       </button>
       <h3 class="drawer__title" v-if="label">{{ label }}</h3>
     </div>
     <div class="drawer__body">
       <slot />
     </div>
   </div>
  </div>
</template>

<script>
  import IconClose from '../../icons/IconClose.vue'

  export default {
    name: 'Drawer',

    components: {
      IconClose
    },

    props: {
      name: {
        type: String,
        default: ''
      },
      label: {
        type: String,
        default: ''
      },
      side: {
        type: String,
        default: 'right'
      }
    },

    mounted () {
      this.$eventHub.$on('drawerOpened', value => {
        if (this.name == value) {
          this.openDrawer()
        }
      })
      this.$eventHub.$on('drawerClosed', value => {
        this.closeDrawer()
      })
    },

    data() {
      return {
        isActive: false
      }
    },

    computed: {
      drawerSideClass() {
        return 'drawer--' + this.side;
      }
    },

    methods: {
      closeDrawer() {
        this.isActive = false
        document.body.classList.remove('utility__drawer-active')
      },
      openDrawer() {
        this.isActive = true
        document.body.classList.add('utility__drawer-active')
      }
    }
  }
</script>
