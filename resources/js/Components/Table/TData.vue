<script setup>
import { Ripple, Datepicker, Input, initTE, } from "tw-elements";
import { onMounted } from "vue";
const { position } = defineProps(['position'])

onMounted(() => {
    initTE({ Ripple, Datepicker, Input });
})

let textPosition = ''
position == 'right' ? textPosition = 'text-right' : textPosition = 'text-left'
const classes = `border-b transition duration-300 ease-in-out hover:bg-neutral-100 px-6 py-3 text-sm ${textPosition}`
</script>
<template>
    <td :class="classes">
        <slot />
    </td>
</template>