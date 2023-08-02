<script setup>

const { label, position} = defineProps(['label','position'])
let textPosition = ''
position == 'right' ? textPosition = 'text-right' : textPosition = 'text-left'
const classes = `whitespace-nowrap px-6 py-4 text-sm ${textPosition}`
</script>
<template>
    <th scope="col" :class="classes">
        {{ label }}
    </th>
</template>