<template>
  <ul class="listing__items">
    <li
      v-for="(post, index) in posts"
      class="listing__item"
    >
      <ListingCard
        :id="index"
        :key="post.id"
        :config="post"
        :modal="modal"
        :post-type="postType"
      />
    </li>
  </ul>
</template>

<script>
  import ListingCard from './ListingCard.vue'

  export default {
    name: 'ListingCards',

    components: {
      ListingCard
    },

    props: {
      modal: {
        type: Boolean,
        default: false
      },
      posts: {
        type: Array,
        default: () => []
      },
      postType: {
        type: String,
        required: true
      }
    }
  }
</script>
