<script setup>
import { Link } from '@inertiajs/vue3';
import { Sidenav, Ripple, initTE, } from "tw-elements";
import { onMounted } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import LinkSidebar from '@/Components/LinkSidebar.vue'

onMounted(() => {
    initTE({ Sidenav, Ripple });
})

</script>
<template>
    <nav id="full-screen-example" class="fixed left-0 top-0 z-[105] h-screen w-[60px] overflow-hidden
    bg-slate-800 shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] 
    data-[te-sidenav-hidden='false']:translate-x-0" data-te-sidenav-init data-te-sidenav-color="light"
        data-te-sidenav-backdrop="false" data-te-sidenav-slim="true" data-te-sidenav-expandable="false"
        data-te-sidenav-slim-collapsed="true" data-te-sidenav-slim-width="60" data-te-sidenav-content="#content">
        <div class="mb-6 mt-1 mx-auto text-center">
            <div class="shrink-0 flex items-center">
                <Link :href="route('dashboard')">
                <ApplicationLogo class="block h-12 w-12 ml-1 fill-current text-white" />
                </Link>
            </div>
        </div>

        <div class="relative m-0 list-none" data-te-sidenav-menu-ref>
            <LinkSidebar :srcImg="'/images/home.svg'" :link="route('dashboard')">
                pagina inicial
            </LinkSidebar>

            <LinkSidebar :srcImg="'/images/tithe-sidebar.svg'" :link="route('dashboard')">
                Dizimos
            </LinkSidebar>
        </div>
    </nav>
    <!-- Sidenav -->
</template>