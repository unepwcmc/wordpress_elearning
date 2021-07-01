import Vue from 'vue'
import store from './store'

import objectFitImages from 'object-fit-images'
import VueProgressiveImage from 'vue-progressive-image'

import AddClassOnClick from './helpers/AddClassOnClick.vue'
import Drawer from './components/drawers/Drawer.vue'
import DrawerTrigger from './components/drawers/DrawerTrigger.vue'
import DrawersOverlay from './components/drawers/DrawersOverlay.vue'
import LatestPosts from './components/widgets/LatestPosts.vue'
import ListingGrid from './components/listing/ListingGrid.vue'
import HeaderSearch from './components/header/HeaderSearch.vue'
import MainHeader from './components/header/MainHeader.vue'

window.axios = require('axios')

import translate from './helpers/translation-helper.js'

Vue.use(VueProgressiveImage)

Vue.config.productionTip = false

Vue.prototype.$t = translate

window.addEventListener("DOMContentLoaded", () => {
  document.body.classList.add('loaded')
  objectFitImages()

  if(document.getElementById('v-app')) {

    // TODO: Change to $root, delete the below line
    Vue.prototype.$eventHub = new Vue()

    new Vue({
      el: '#v-app',

      store,

      components: {
        AddClassOnClick,
        Drawer,
        DrawerTrigger,
        DrawersOverlay,
        HeaderSearch,
        LatestPosts,
        ListingGrid,
        MainHeader
      },

      data () {
        return {
          translations: undefined
        }
      },

      created () {
        this.translations = window.vue_translations
      },

      mounted() {
        document.querySelector('body').classList.add('layout__body--loaded')
      }
    })

  }
})
