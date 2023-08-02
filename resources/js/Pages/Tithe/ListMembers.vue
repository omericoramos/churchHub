<script setup>
import { Ripple, Datepicker, Input, initTE, } from "tw-elements"
import { onMounted } from "vue"
import Table from '@/Components/Table/Table.vue'
import THead from '@/Components/Table/THead.vue'
import TData from '@/Components/Table/TData.vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import SectionGrid from '@/Layouts/SectionGrid.vue'
import { useForm } from "@inertiajs/vue3"
import InputSearch from "@/Components/InputSearch.vue"
import Paginator from '@/Components/Paginatior.vue'

defineProps(['members'])
onMounted(() => {
    initTE({ Ripple, Datepicker, Input })
})
const form = useForm({
    memberId: 0,
    search: ''
})

const click = (memberId) => {
    form.memberId = memberId
    form.get(route('tithe.create'))
}
const submit = () => {
    form.get(route('tithe.list'), form.search);
}

</script>

<template>
    <AuthenticatedLayout>
        <SectionGrid class="rounded-md">
            <div class=" flex w-full px-6 justify-between pt-2">
                <div class=" mt-4 sm:px-2 lg:px-2">
                    <h2 class=" font-thin font-roboto pb-4 text-base text-sky-700 leading-tight">Selecione um membro</h2>
                </div>
                <div class="w-96">
                    <form @submit.prevent="submit">
                        <InputSearch :form="form" />
                    </form>
                </div>
            </div>
            <Table class="my-6 h-96">
                <template #headColumns>
                    <THead label="Membro" />
                    <THead position="left" label="Telefone" />
                    <THead position="right" label="Email" />
                </template>
                <template #tableRows>
                    <tr @click="click(member.id)" v-for="member in members.data" :key="member.id"
                        class="border-b transition duration-300 ease-in-out cursor-pointer hover:bg-neutral-100">
                        <TData>{{ member.name }}</TData>
                        <TData>{{ member.phone }}</TData>
                        <TData position="right">{{ member.email }}</TData>
                    </tr>
                </template>
            </Table>
            <Paginator :paginator="members" v-if="members.links.length >= 4" :class="hidden" />
        </SectionGrid>
    </AuthenticatedLayout>
</template>