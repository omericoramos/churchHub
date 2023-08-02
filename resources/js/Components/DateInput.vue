<script setup>
import { Ripple, Datepicker, Input, initTE, } from "tw-elements";
import { onMounted} from "vue";
import { vMaska } from "maska"

const props = defineProps(['modelValue','label'])
defineEmits('update:modelValue')

onMounted(() => {
    initTE({ Ripple, Datepicker, Input });
})


</script>
<template>
    <div class="relative mb-6" data-te-input-wrapper-init>
        <input v-maska data-maska="99/99/####" data-maska-tokens="9:[0-9]:repeated" type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] 
            leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 
            peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none 
            [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
            placeholder="Selecione a data nascimento"
            :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" />
        <label for="floatingInput" class="text-primary-400 pointer-events-none bg-white absolute px-3 left-2 
            top-0 mb-5 max-w-[90%] origin-[0_0] text-sm truncate pt-[0.37rem] leading-[1.6]
            transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.9]
            peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1rem] 
            peer-data-[te-input-state-active]:scale-[0.9] motion-reduce:transition-none">{{ label }}
        </label>
    </div>
</template>