<template>
  <div v-if="options.length">
    <div class="flex flex-wrap -mx-2">
      <div
        v-for="(value, index) in options"
        :key="`${field.column_name}-${index}`"
        class="w-auto px-2"
      >
        <input
          :id="`form-${field.column_name}-${value}`"
          type="radio"
          class="text-base py-3 px-3 shadow-sm inline-block"
          v-model="selected"
          :value="value"
          :class="{ 'border-red-500': errors[field.column_name].is, 'border-gray-300': !errors[field.column_name].is }"
        />

        <label>{{ value }}</label>
      </div>
    </div>
  </div>
</template>

<script>
import { get } from 'lodash'

export default {
  props: [
    'value',
    'field',
    'errors',
    'formMeta',
    'model',
    'action'
  ],

  watch: {
    value (newVal, oldVal) {
      if (newVal !== oldVal) {
        this.selected = newVal
      }
    },

    selected (newVal, oldVal) {
      if (newVal !== oldVal) {
        this.$emit('input', newVal)
      }
    }
  },

  computed: {
    options () {
      return get(this.field, 'meta.options', [])
    }
  },

  data () {
    return {
      selected: null
    }
  },

  mounted () {
    if (this.value) {
      this.selected = this.value
    }
  }
}
</script>
