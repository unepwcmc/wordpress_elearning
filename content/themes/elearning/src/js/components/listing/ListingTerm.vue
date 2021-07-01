<template>
  <li class="listing-filter__term">
    <input
      :checked="checked"
      @change="onChange($event.target.checked)"
      type="checkbox"
      :value="value"
      class="listing-filter__checkbox"
    />
    <label
      v-html="label"
      class="listing-filter__label"
    />
  </li>
</template>

<script>
  export default {
    name: 'ListingTerm',

    model: {
      prop: 'checked',
      event: 'change'
    },

    props: {
      checked: {
        type: Boolean,
        default: false
      },
      label: {
        type: String,
        default: ''
      },
      value: {
        type: Number,
        default: 0
      }
    },

    methods: {
      onChange(value) {
        this.$emit('change', value)
      }
    }
  }
</script>
