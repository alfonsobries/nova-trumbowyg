<template>
    <panel-item :field="field">
        <template slot="value">
            <excerpt>
            	<div v-html="field.value" />
            </excerpt>
        </template>
    </panel-item>
</template>

<script>
import Excerpt from './Excerpt.vue'

export default {
		components: { Excerpt },

    props: ['resource', 'resourceName', 'resourceId', 'field'],
}
</script>
