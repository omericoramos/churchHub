<script setup>
import { Ripple, Input, initTE, } from "tw-elements";
import { onMounted, ref } from "vue";

const props = defineProps(['modelValue', 'label'])
const label = ref('')
defineEmits('update:modelValue')

onMounted(() => {
    initTE({ Ripple, Input });
    props.label == '' ? label.value = 'Nome do membro'
        : label.value = props.label
})
</script>

<template>
    <div class="relative my-4 " data-te-input-wrapper-init>
        <input type="text" class="peer block min-h-[auto] w-full rounded px-3 py-[0.32rem] 
            leading-[1.6] transition-all duration-200 ease-linear 
            data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none 
            [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="filiação"
            :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" />
        <label for="filiação" class="text-slate-400 pointer-events-none bg-white absolute px-3 left-2 
            top-0 mb-5 max-w-[90%] origin-[0_0] text-base truncate pt-[0.37rem] leading-[1.6]
            transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.9]
            peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1rem] 
            peer-data-[te-input-state-active]:scale-[0.9] motion-reduce:transition-none">{{ label }}
        </label>
    </div>
</template>