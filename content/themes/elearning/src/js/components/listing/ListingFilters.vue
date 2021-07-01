<template>
  <ul class="listing-filter__items">
    <listing-filter
      v-for="filter in filters"
      :config="filter"
      :key="filter.id"
      v-if="filter.terms.length"
    />
  </ul>
</template>

<script>
  import ListingFilter from './ListingFilter.vue'

  export default {
    name: 'ListingFilters',

    components: {
      ListingFilter
    },

    props: {
      filters: {
        type: Array,
        default: () => []
      }
    }
  }
</script>
