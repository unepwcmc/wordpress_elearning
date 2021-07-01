<template>
  <div
    class="listing"
    :class="`listing--${postType}`"
  >
    <div class="listing__header">
      <p
        v-if="!isFetching"
        class="listing__text"
        v-html="$t('listing.count_text', {
          posts_length: posts.length,
          max_posts: maxPosts
        })"
      />

      <div class="listing__filters">
        <button
        v-if="activeTermsCount !== 0"
        class="listing_text-button"
        @click="clearActiveTerms"
        >
          {{ viewAllText }}
        </button>

        <listing-drawer
          v-if="filters.length"
          v-bind="{
            activeTermsCount,
            filters
          }"
          @filterSelected="onFilterSelected()"
        />
      </div>
    </div>

    <div class="listing__body">
      <div
        v-if="posts.length"
        class="listing__content"
      >
        <listing-cards
          :modal="this.modal"
          :posts="posts"
          :post-type="postSingular"
          @onCardClicked="updateActivePost"
        />

        <observer v-on:intersect="intersected" />
      </div>

      <div
        v-else
        class="listing__content listing__content--empty"
      >
        <p
          v-if="!isFetching"
          class="listing___empty-message"
        >
          {{ $t('common.no_results_found') }}
        </p>
      </div>

      <div
        v-if="isFetching"
        class="listing__loader"
      >
        <Loader />
      </div>

      <listing-modal
        v-if="modal"
        v-bind="{ post: activePost }"
      />
    </div>
  </div>

  <!-- <div
    v-else
    class="listing__loader listing__loader--padded"
  >
    <Loader />
  </div> -->
</template>

<script>
import ListingCards from './ListingCards.vue'
import ListingDrawer from './ListingDrawer.vue'
import ListingModal from '../listing/ListingModal.vue'
import Loader from '../../icons/IconLoader.vue'
import Observer from '../utilities/Observer.vue'

export default {
  name: 'ListingGrid',

  components: {
    ListingCards,
    ListingDrawer,
    ListingModal,
    Loader,
    Observer
  },

  props: {
    resourceStage: {
      type: String,
      default: undefined
    },
    resourceType: {
      type: String,
      default: undefined
    },
    postType: {
      type: String,
      required: true
    },
    termId: {
      type: String,
      default: undefined
    },
    termLabel: {
      type: String,
      default: undefined
    },
    modal: {
      type: Boolean,
      default: false
    }
  },

  created() {
    this.postSingular = this.postType === 'posts' ? 'post' : this.postType
  },

  mounted() {
    this.getFilters()

    if (this.termLabel) {
      this.$store.commit('updatePreselectedTerm', {
        filter: this.termLabel,
        term_id: this.termId
      })
      console.log('Sending terms');
    } else {
      this.getPosts()
    }

    this.$eventHub.$on('termsUpdated', (filter, checkedTerms) => {
      this.$set(this.activeTerms, filter, checkedTerms)
    })
  },

  data() {
    return {
      activePost: {},
      activeTerms: {},
      config: {
        postsBaseUrl: '/wp-json/wp/v2/',
        resourcesBaseUrl: '/wp-json/relevanssi/v1/search?_embed&s=',
        eventsBaseUrl: '/wp-json/wcmc-lms/v1/events?_embed',
        filtersBaseURL: '/wp-json/wcmc-lms/v1/list-filters'
      },
      filters: [],
      isLoading: true,
      isFetching: false,
      maxPosts: 1,
      page: 1,
      perPage: 8,
      posts: [],
      postSingular: ''
    }
  },

  computed: {
    activeTermsCount() {
      let amount = 0
      for (const term in this.activeTerms) {
        amount += this.activeTerms[term].length
      }
      return amount
    },

    filtersURL() {
      let requestURL = this.config.filtersBaseURL + '?post_type=' + this.postSingular

      return encodeURI(requestURL)
    },

    postsParams() {
      let params = {
        'page': this.page,
        'per_page': this.perPage
      }

      if (this.resourceStage) {
        params['resource_stage'] = this.resourceStage
      }

      if (this.resourceType) {
        params['resource_type'] = this.resourceType
      }

      Object.keys(this.activeTerms).forEach(term => {
        if (this.activeTerms[term].length > 0) {
          params[term] = this.activeTerms[term].join()
        } else {
          delete params[term]
        }
      });

      return params
    },

    viewAllText () {
      const pluralPostName = this.postType === 'posts'
        ? 'news'
        : this.postSingular + 's'
      return `${this.$t('common.view_all')} ${this.$t('post_types')[pluralPostName]}`
    }
  },

  watch: {
    activeTerms: {
      handler() {
        this.posts = []
        this.maxPosts = 1
        this.page = 1;
        this.getPosts()
      },
      deep: true
    }
  },

  methods: {
    clearActiveTerms() {
      window.history.replaceState({}, document.location.origin, document.location.pathname);
      this.activeTerms = {}
      this.$eventHub.$emit('clearCheckedTerms')
    },

    getFilters() {
      axios.get(this.filtersURL)
      .then((response) => {
        const newFilters = this.updateFiltersTaxonomyName(response.data.filters, 'category', 'categories')
        this.filters = this.getFiltersWithTerms(newFilters).sort(function(a, b) {
          return a.label.toLowerCase().localeCompare(b.label.toLowerCase())
        })
      })
      .catch((error) => {
        console.error(error)
      })
    },

    getFiltersWithTerms(filters) {
      return filters.filter(filter => {
        // check if filter has any terms
        if (filter.terms.length) {
          // Loop through all terms
          const newTerms = filter.terms.filter(term => {
            // Return if term is assigned to at least 1 post
            return term.count
          })

          // If filter has more than 1 term
          if (newTerms.length) {
            // Create copy of term
            const newFilter = filter
            // Update terms with emptys removed
            newFilter.terms = newTerms
            // Return new filter
            return newFilter
          }
        }
      })
    },

    getPosts() {
      if (!this.isFetching && ((this.posts.length < this.maxPosts) || this.isLoading)) {
        this.isFetching = true

        axios.get(this.getPostsURL(), { params: this.postsParams })
        .then((response) => {
          this.maxPosts = parseInt(response.headers['x-wp-total'])
          this.totalPostCount = this.maxPosts
          this.page += 1
          this.posts.push(...response.data)
          this.activePost = this.posts[0]
          this.isFetching = false
          this.isLoading = false
        })
        .catch((error) => {
          console.error(error)
          this.isFetching = false
          this.isLoading = false
        })
      }
    },

    getPostsURL() {
      let requestURL = ''

      // TODO make in to a switch statement
      if (this.postType == 'resource') {
        requestURL = this.config.resourcesBaseUrl
      } else {
        requestURL = this.postType == 'event'
        ? this.config.eventsBaseUrl
        : this.config.postsBaseUrl + this.postType + '?_embed'
      }

      return encodeURI(requestURL)
    },

    intersected() {
      this.getPosts()
    },

    updateActivePost(id) {
      this.activePost = this.posts[id]
    },

    updateFiltersTaxonomyName(filters, currentName, newName) {
      return filters.map(filter => {
        filter.taxonomy = filter.taxonomy === currentName ? newName : filter.taxonomy
        return filter
      })
    }
  }
}
</script>
