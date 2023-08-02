<script setup>
import SearchButton from './SearchButton.vue';
defineProps(['form'])
</script>

<template>
    <div class="my-2">
        <div class="flex w-full flex-wrap items-stretch">
            <input type="search" name="search" class="m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 
                      bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 
                       focus:text-neutral-700 placeholder:text-neutral-200 focus:border-primary-100"
                placeholder="Digite sua busca" aria-label="Search" aria-describedby="button-addon1" v-model="form.search" />

            <!--Search button-->
            <SearchButton/>
        </div>
    </div>
</template>