<template>
  <modal>
    <h3 class="listing-modal__title">
      {{ title }}
    </h3>
    <h4
      class="listing-modal__heading"
      v-if="partnerType"
    >
      {{ partnerType }}
    </h4>
    <div class="listing-modal__columns">
      <div
        v-if="imageUrl"
        class="listing-modal__column listing-modal__column--small"
      >
        <div
          v-if="imageUrl"
          class="listing-modal__image-wrap"
        >
          <img
            class="listing-modal__image"
            :src="imageUrl"
            :alt="title"
          >
        </div>
      </div>
      <div class="listing-modal__column listing-modal__column--large">
        <div
          v-if="content"
          v-html="content"
          class="listing-modal__content richtext"
        />
      </div>
    </div>
  </modal>
</template>

<script>
  import { decodeString } from '../../helpers/application-helpers.js'
  import Modal from '../modal/Modal.vue'

  export default {
    name: 'ListingModal',

    components: {
      Modal
    },

    props: {
      post: {
        type: Object,
        default: () => {}
      }
    },

    computed: {
      content() {
        return this.post.content ? this.post.content.rendered : ''
      },

      imageUrl() {
        return this.post._embedded && this.post._embedded['wp:featuredmedia'] ? this.post._embedded['wp:featuredmedia'][0].source_url : ''
      },

      partnerType() {
        return this.post._embedded && this.post._embedded['wp:term'] ? this.post._embedded['wp:term'][0].find(term => term.taxonomy === 'partner_type').name : ''
      },

      title() {
        return this.post.title ? decodeString(this.post.title.rendered) : ''
      }
    }
  }
</script>
