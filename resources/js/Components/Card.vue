<script setup>
import { Link } from '@inertiajs/vue3';
const props = defineProps(['src', 'href']);
</script>

<template>
    <div class="card px-4 py-8 flex justify-center items-center text-sm text-slate-800 font-normal text-center 
    transform hover:scale-110 hover:shadow-lg transition-transform duration-200">

        <Link :href="href">
        <div class="text-primary w-12 mx-auto mt-5 leading-none flex justify-center items-center">
            <img :src="props.src" class="align-baseline text-center">
        </div>
        <p class="mt-2">
            <slot />
        </p>
        </Link>
    </div>
</template>
