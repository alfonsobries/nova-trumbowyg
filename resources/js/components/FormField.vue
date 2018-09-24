<template>
    <field-wrapper>
        <div class="w-1/5 px-8 py-6">
            <slot>
                <form-label :for="field.name">
                    {{ field.name }}
                </form-label>
            </slot>
        </div>
        <div class="w-4/5 px-8 py-6">
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
        </div>
    </field-wrapper>
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