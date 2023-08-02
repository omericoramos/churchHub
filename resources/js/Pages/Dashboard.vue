<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Register from '@/Components/Register.vue'
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
         <section class="py-4">
                <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-2">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white grid grid-cols-5 shadow-sm sm:rounded-lg">
                            <h2 class="font-semibold p-6 text-xl text-gray-800 leading-tight">Dashboardw</h2>
                        </div>
                    </div>
                </div>
            </section>
            <Register/>
    </AuthenticatedLayout>
</template>
