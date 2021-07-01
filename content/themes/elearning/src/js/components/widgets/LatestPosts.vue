<template>
  <listing-cards
    :posts="posts"
    :post-type="postSingular"
  />
</template>

<script>
  import ListingCards from '../listing/ListingCards.vue'

  export default {
    name: 'LatestPosts',

    components: {
      ListingCards
    },

    props: {
      postType: {
        type: String,
        required: true
      },
      postUrl: {
        type: String,
        required: true
      }
    },

    data() {
      return {
        config: {
          postsBaseUrl: '/wp-json/wp/v2/'
        },
        posts: [],
        postSingular: ''
      }
    },

    created() {
      this.postSingular = this.postType === 'posts' ? 'post' : this.postType
    },

    mounted() {
      this.getPosts()
    },

    computed: {
      postsURL() {
        let requestURL = this.config.postsBaseUrl + this.postType + '?_embed'

        return encodeURI(requestURL)
      },

      postsParams() {
        let params = {
          'page': 1,
          'per_page': 3
        }

        return params
      }
    },

    methods: {
      getPosts() {
        axios.get(this.postsURL, { params: this.postsParams })
        .then((response) => {
          this.posts.push(...response.data)
        })
        .catch((error) => {
          console.error(error)
        })
      }
    }
  }
</script>
