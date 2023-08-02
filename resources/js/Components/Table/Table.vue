<script setup>
defineProps(['paginator'])
</script>

<template>
    <div class="-overflow-hidden">
        <table id="table" class="min-w-full text-left text-sm font-light">
            <thead class="border-b bg-white font-medium">
                <tr>
                    <slot name="headColumns" />
                </tr>
            </thead>
            <tbody>
                <slot name="tableRows" />
            </tbody>
        </table>
        <template v-if="paginator">
            <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
                <div class="flex flex-1 justify-between sm:hidden">
                    <a href=""
                        class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 "></a>
                    <a href=""
                        class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 "></a>
                </div>
                <div class="hidden sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Showing
                            <span class="font-medium"> {{ paginator.from }}</span>
                            <span class="font-medium"> {{ paginator.to }}</span>
                            <span class="font-medium"> {{ paginator.total }}</span>
                        </p>
                    </div>
                    <div>
                        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Paginator">
                            <a :href="paginator.prev_page_url"
                                class="relative inline-flex items-center rounded-l-md border border-gray-300 bg-white px-3">
                                <span class="sr-only">Previous</span>
                            </a>
                            <template v-for="(link, index) in paginator.links " :key="link.label">
                                <a v-if="link.label == index" :href="link.url"
                                    :class="{ 'z-10 bg-indigo-50 border-indigo-500 text-indigo-600': link.active }"
                                    class="relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-gray-600 ">
                                    {{ link.label }}
                                </a>
                            </template>
                            <a :href="paginator.next_page_url"
                                class="relative inline-flex items-center rounded-l-md border border-gray-300 bg-white px-3">
                                <span class="sr-only">Next</span>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </template>
    </div>
</template>