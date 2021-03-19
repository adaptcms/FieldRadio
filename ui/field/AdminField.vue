<template>
  <div class="mt-4" v-if="options.length">
    <div class="flex flex-wrap -mx-2">
      <div
        v-for="(val, index) in options"
        :key="`${field.column_name}-${index}`"
        class="w-auto px-2"
      >
        <input
          :id="`form-${field.column_name}-${val}`"
          type="radio"
          class="text-base py-3 px-3 shadow-sm inline-block mr-1"
          v-model="selected"
          :value="val"
          :class="{ 'border-red-500': errors[field.column_name].is, 'border-gray-300': !errors[field.column_name].is }"
        />

        <label>{{ val }}</label>
      </div>
    </div>
  </div>
</template>

<script>
import { get } from 'lodash'

export default {
  props: [
    'modelValue',
    'field',
    'errors',
    'formMeta',
    'model',
    'action'
  ],

  emits: [
    'update:modelValue'
  ],

  watch: {
    modelValue (newVal, oldVal) {
      if (newVal && newVal !== oldVal) {
        this.selected = newVal
      }
    },

    selected (newVal, oldVal) {
      if (newVal !== oldVal) {
        this.$emit('update:modelValue', newVal)
      }
    }
  },

  computed: {
    options () {
      let options = get(this.field, 'meta.options', null)

      if (options) {
        options = options.split(',')
      }

      return options
    }
  },

  data () {
    return {
      selected: null
    }
  },

  mounted () {
    if (this.modelValue) {
      this.selected = this.modelValue
    }
  }
}
</script>
