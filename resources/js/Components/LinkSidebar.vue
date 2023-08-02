<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps(['srcImg', 'link', 'tooltipText'])
</script>
<template>
    <div>
        <div class="relative h-20">
            <Link :href="props.link" class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem]
                text-gray-300 outline-none transition duration-300 ease-linear hover:bg-white/10 hover:outline-none
                 focus:bg-white/10 focus:outline-none active:bg-white/10 active:outline-none data-[te-sidenav-state-focus]:outline-none 
                 motion-reduce:transition-none" data-te-sidenav-link-ref>
            <div class="group cursor-pointer fixed inline-block w-2 text-center">
                <div class="w-10 mx-auto -ml-2 motion-reduce:transition-none [&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-gray-300 [&>svg]:transition
                    [&>svg]:duration-300 [&>svg]:ease-linear group-hover:[&>svg]:fill-white group-focus:[&>svg]:fill-white
                    group-active:[&>svg]:fill-white group-data-[te-sidenav-state-focus]:[&>svg]:fill-white">
                    <img :src="props.srcImg" class="w-7 hover:scale-125 hover:shadow-lg transition-transform duration-300">
                </div>
                <div class="opacity-0 bg-slate-800 text-white text-left text-xs rounded-sm py-2   
                        absolute z-10 group-hover:opacity-100 bottom-full ml-8 px-3 pointer-events-none">
                    <slot />
                </div>
            </div>
            </Link>
        </div>
    </div>
</template>