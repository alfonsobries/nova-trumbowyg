<template>
    <default-field :field="field">
        <template slot="field">
            <trumbowyg
                v-model="value"
                :id="field.name"
                :placeholder="field.name"
                :config="config"
                class="w-full form-control form-input form-input-bordered"
            />

            <p v-if="hasError" class="my-2 text-danger">
                {{ firstError }}
            </p>
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

// Import this component
import Trumbowyg from 'vue-trumbowyg';

// Import editor css
import 'trumbowyg/dist/ui/trumbowyg.css';

export default {
    components: {
      Trumbowyg
    },

    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    computed: {
      config() {
        return {
          ...this.field.options,
          ...{
            svgPath: '/nova-api/styles/nova-trumbowyg-icons'
          } 
        }
      }   
    },

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
          this.value = this.field.value || ''
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
          formData.append(this.field.attribute, this.value || '')
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
          this.value = value
        }
    }
}
</script>
