<template>
    <default-field :field="field" :errors="errors" :full-width-content="true">
        <template slot="field">
            <select
                :id="field.attribute"
                v-model="template"
                class="w-full form-control form-select mb-3"
            >
                <option value="" selected disabled>
                    {{__('Choose a template')}}
                </option>

                <option
                    v-for="template in field.templates"
                    :value="template.label"
                >
                    {{ template.label }}
                </option>
            </select>
            <textarea
                class="w-full form-control form-input form-input-bordered py-3 h-auto"
                :id="field.attribute"
                v-model="value"
                v-bind="extraAttributes"
            />
        </template>
    </default-field>
</template>

<script>
import _ from 'lodash'
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: {
        resourceName: { type: String },
        field: {
            type: Object,
            required: true,
        },
    },

    data: () => ({
        template: ''
    }),

    watch: {
        template(template) {
            if(template) {
                this.value = _.find(this.field.templates, {'label': template}).value
                this.template = ''
            }
        }
    },

    computed: {
        defaultAttributes() {
            return {
                rows: this.field.rows,
                class: this.errorClasses,
            }
        },

        extraAttributes() {
            const attrs = this.field.extraAttributes

            return {
                ...this.defaultAttributes,
                ...attrs,
            }
        },
    },
}
</script>
