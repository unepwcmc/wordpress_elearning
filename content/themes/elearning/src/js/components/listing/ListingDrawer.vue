<template>
  <div class="listing-filter__drawer">
    <drawer
      :label="$t('common.filters')"
      name="filter"
      side="left"
    >
      <listing-filters
        :filters="filters"
      />
    </drawer>
    <drawer-trigger
      v-if="filters.length"
      controls="filter"
      drawer="filter"
      :label="$t('common.filter_toggle')"
      class="listing-filter__drawer-toggle"
    >
      {{ $t('common.filter') }}
      <span
        v-show="activeTermsCount"
        class="listing-filter__drawer-count"
      >
        {{ activeTermsCount }}
      </span>
    </drawer-trigger>
  </div>
</template>

<script>
  import Drawer from '../drawers/Drawer.vue'
  import DrawerTrigger from '../drawers/DrawerTrigger.vue'
  import IconToggle from '../../icons/IconToggle.vue'
  import ListingFilters from './ListingFilters.vue'

  export default {
    name: 'ListingDrawer',

    components: {
      Drawer,
      DrawerTrigger,
      IconToggle,
      ListingFilters
    },

    props: {
      activeTermsCount: {
        type: Number,
        default: undefined
      },
      filters: {
        type: Array,
        required: true
      }
    }
  }
</script>
