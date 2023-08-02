<script setup>
import { Ripple, Datepicker, Input, initTE, } from "tw-elements";
import { onMounted, ref } from "vue";

defineProps(['modelValue'])
defineEmits('update:modelValue')

const input = ref(null)
onMounted(() => {
    initTE({ Ripple, Datepicker, Input });
})


</script>

<template>
    <div class="relative my-4 " data-te-input-wrapper-init>
        <input class="peer block min-h-[auto] w-full rounded px-3 py-[0.32rem] leading-[1.6] transition-all duration-200 
            ease-linear  data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none 
           [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="email" placeholder="Nome membro"
            :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" type="email" ref="input" />
        <label for="email" class="text-slate-400 pointer-events-none bg-white absolute px-3 left-2 
            top-0 mb-5 max-w-[90%] origin-[0_0] text-sm truncate pt-[0.37rem] leading-[1.6]
            transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.9]
            peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1rem] 
            peer-data-[te-input-state-active]:scale-[0.9] motion-reduce:transition-none">Email
        </label>
    </div>
</template>