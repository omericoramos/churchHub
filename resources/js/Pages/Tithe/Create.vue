<script setup>
import { Ripple, Datepicker, Input, initTE, } from "tw-elements"
import DateInput from '@/Components/DateInput.vue'
import DefaultButton from '@/Components/DefaultButton.vue'
import CurrencyInput from '@/Components/CurrencyInput.vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import SectionGrid from '@/Layouts/SectionGrid.vue'
import { reactive, onMounted } from 'vue'
import InputError from "@/Components/InputError.vue"
import Dialog from "@/Components/Dialog.vue"
import axios from "axios"

const { member } = defineProps(['member', 'errors'])

const form = reactive({
    value: null,
    date: null,
    memberId: member.id
})

const options = reactive({
    disableFuture: true,
    title: "Selecione a data",
    monthsFull: [
        "Janeiro",
        "Fevereiro",
        "Março",
        "Abril",
        "Maio",
        "Junho",
        "Julho",
        "Agosto",
        "Setembro",
        "Outubro",
        "Novembro",
        "Dezembro",
    ],
    monthsShort: [
        "Jan",
        "Fev",
        "Mar",
        "Abr",
        "Maio",
        "Jun",
        "Jul",
        "Ago",
        "Set",
        "Out",
        "Nov",
        "Dez",
    ],
    weekdaysFull: [
        "Domingo",
        "Segunda",
        "Terça",
        "Quarta",
        "Quinta",
        "Sexta",
        "Sabado",
    ],
    weekdaysShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"],
    weekdaysNarrow: ["D", "S", "T", "Q", "Q", "S", "S"],
    okBtnText: "Ok",
    clearBtnText: "Limpar",
    cancelBtnText: "Cancelar",
})

onMounted(() => {
    initTE({ Ripple, Datepicker, Input });
    const datepickerDisableFuture = document.getElementById('datepicker-disable-future');
    new Datepicker(datepickerDisableFuture, options);
})

const notification = reactive({
    message: null,
    status: null,
    notify: false
})

const submit = () => {

    const titheStore = async () => {
        const response = await axios.post(route('tithe.store'), {
            value: form.value,
            date: form.date,
            memberId: form.memberId
        })
        return response.data
    }

    titheStore().then((data) => {
        notification.message = data.message
        notification.status = data.status
        notification.notify = true
        clearFields()
    }).catch((errors) => {
        notification.message = JSON.parse(errors.request.response)
        notification.notify = true
    })

}
const clearFields = () => {
    form.date = null
    form.value = null
}
</script>
<template>
    <AuthenticatedLayout>
        <SectionGrid id="table-analyze-payroll" class="py-4 my-8 rounded-md">
            <!-- notificação cadastro-->
            <div v-if="notification.notify">
                <div class="flex">
                    <Dialog v-model="notification.notify" :status="notification.status" :description="notification.message"
                        button="Ok!" />
                </div>
            </div>
            <div class="max-w-7xl sm:px-2 lg:px-2">
                <h2 class=" font-thin font-roboto pb-4 ml-4 text-base text-sky-700 leading-tight">Adicionar dizímo</h2>
            </div>
            <div class=" max-w-xl mx-auto p-8">
                <div class="block max-w-1xl rounded-lg bg-white p-6">
                    <form @submit.prevent="submit()">
                        <!--Nome membro-->
                        <input class="w-full rounded bg-slate-100 mb-5" type="text" v-model="member.name" disabled>

                        <div class="w-full flex">
                            <div class="w-1/2 mr-3">
                                <!--valor dízimo-->
                                <CurrencyInput v-model="form.value" label="Digite o valor" />
                                <InputError class="mb-4" :message="errors.value" />
                            </div>
                            <div class="w-1/2">
                                <!--data-->
                                <DateInput id="datepicker-disable-future" v-model="form.date" label="Digite a data" />
                                <!-- <InputError class="mb-2" :message="errosResponse.date" /> -->
                            </div>
                        </div>
                        <!--Submit button-->
                        <DefaultButton>Cadastrar dízimo</DefaultButton>
                    </form>
                </div>
            </div>
        </SectionGrid>
    </AuthenticatedLayout>
</template>