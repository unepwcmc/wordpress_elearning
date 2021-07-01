<template>
  <div
    class="header-search"
    :class="{ 'header-search--bar-active': active }"
  >
    <button
      class="header-search__toggle"
      aria-label="Search Button"
      @click="handleClick"
    >
      <IconSearch />
    </button>
    <div class="header-search__bar">
      <form
        class="header-search__form"
        role="search"
        method="get"
        id="searchform"
        :action="formAction"
      >
        <label
          for="s"
          class="utility__screen-reader-only"
        >
          {{ $t('search.search_for') }}
        </label>

        <input
          type="text"
          name="s"
          id="s"
          class="header-search__input"
          :placeholder="$t('search.search_here')"
        >

        <input
          type="submit"
          :value="$t('search.search')"
          class="header-search__button"
        >
      </form>
    </div>
  </div>
</template>

<script>
import IconSearch from '../../icons/IconSearch.vue'

export default {
  name: 'HeaderSearch',

  components: {
    IconSearch
  },

  props: {
    formAction: {
      type: String,
      required: true
    }
  },

  data() {
    return {
      active: false
    }
  },

  methods: {
    handleClick() {
      this.active = !this.active
    }
  }
}
</script>
