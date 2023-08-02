<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Luz para os povos POA" />

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center sm:pt-0">

        <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
        Register</Link>
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-2">
            <div class="w-64 justify-center pt-8 sm:pt-0">
                <img src="images/logo-luz.png" alt="tag">
                <div class="bg-neutral-700 text-center rounded-md pt-3 pb-3 font-semibold border border-red-400">
                    <Link :href="route('login')" class="w-max text-lg text-red-500">Acessar Aplicação</Link>
                </div>

            </div>
        </div>
    </div>
</template>
