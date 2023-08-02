<script setup>
import { Link } from '@inertiajs/vue3';
defineProps(['paginator'])
</script>

<template>
    <nav class="inline-flex -space-x-px rounded-md shadow-sm" aria-label="Paginator">
        <Link :href="paginator.prev_page_url"
            class="relative inline-flex items-center rounded-l-md border border-gray-300 bg-white px-3">
        <span>Anterior</span>
        </Link>

        <template v-for="(link) in paginator.links " :key="link.label">
            <Link v-if="link.label != 'Anterior' && link.label != 'Proximo'" :href="link.url"
                :class="{ 'z-10 bg-slate-600 text-rose-500': link.active }"
                class="relative items-center border border-gray-300 bg-white px-4 py-2 text-gray-500 ">
            {{ link.label }}
            </Link>
        </template>
        <Link :href="paginator.next_page_url"
            class="relative inline-flex items-center rounded-r-md border border-gray-300 bg-white px-3">
        <span>Proximo</span>
        </Link>
    </nav>
</template>