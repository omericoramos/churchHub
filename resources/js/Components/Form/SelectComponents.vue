<script setup>
import { Input, Select, initTE, } from "tw-elements"
import { onMounted } from 'vue'

defineProps(['modelValue', 'label'])
defineEmits(['update:modelValue']);

onMounted(() => {
    initTE({ Input, Select })
})

</script>

<template>
    <select data-te-select-init data-te-select-filter="true" @change="$emit('update:modelValue', $event.target.value)">
        <slot />
    </select>
    <label class="text-primary-400 pointer-events-none bg-white absolute mb-5 max-w-[100%] px-3 left-1
            origin-[0_0] text-sm truncate leading-[1.6] transition-all duration-200 ease-out 
            peer-focus:-translate-y-[1.3rem] peer-focus:scale-[1]
          peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1rem] 
                            peer-data-[te-input-state-active]:scale-[0.9]" data-te-select-label-ref>{{ label }}</label>
</template>