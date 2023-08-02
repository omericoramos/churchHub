<script setup>
import { Ripple, Datepicker, Input, initTE, Select } from "tw-elements"
import DateInput from '@/Components/DateInput.vue'
import DefaultButton from '@/Components/DefaultButton.vue'
import CurrencyInput from '@/Components/CurrencyInput.vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import SectionGrid from '@/Layouts/SectionGrid.vue'
import { reactive, onMounted } from 'vue'
import DefaultInput from "@/Components/DefaultInput.vue"
import Dialog from "@/Components/Dialog.vue"
import axios from "axios"
import SelectComponets from '@/Components/Form/SelectComponents.vue'
defineProps(['offerCategory'])
const offerData = reactive({
    memberName: null,
    categoryOffer: null,
    value: null,
    description: null
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
    initTE({ Ripple, Datepicker, Input, Select });
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
            <!-- <div v-if="notification.notify">
                <div class="flex">
                    <Dialog v-model="notification.notify" :status="notification.status" :description="notification.message"
                        button="Ok!" />
                </div>
            </div> -->
            <div class="max-w-7xl sm:px-2 lg:px-2">
                <h2 class=" font-thin font-roboto pb-4 ml-4 text-base text-sky-700 leading-tight">Adicionar oferta</h2>
            </div>
            <div class=" max-w-xl mx-auto p-8">
                <div class="block max-w-1xl rounded-lg bg-white p-6">
                    <form @submit.prevent="submit()">
                        <div class="w-full flex my-2">
                            <div class="w-1/2 mr-3">
                                <!--categoria oferta-->
                                <SelectComponets v-model="offerData.categoryOffer" label="Selecione uma categoria">
                                    <option value="" selected disabled></option>
                                    <option v-for="category in offerCategory" v-bind:value="category.id">{{
                                        category.type_offer }}
                                    </option>
                                </SelectComponets>
                            </div>
                            <div class="w-1/2">
                                <!--data-->
                                <div class=" flex rounded bg-primary-600 hover:bg-primary-800 text-white py-2 px-2 cursor-pointer">
                                    <div class="mt-1">
                                        <svg fill="#FFFFFF" height="12px" width="12px" version="1.1" id="Capa_1"
                                            viewBox="0 0 60.364 60.364" xml:space="preserve">
                                            <g>
                                                <path
                                                    d="M54.454,23.18l-18.609-0.002L35.844,5.91C35.845,2.646,33.198,0,29.934,0c-3.263,0-5.909,2.646-5.909,5.91v17.269
		                                                L5.91,23.178C2.646,23.179,0,25.825,0,29.088c0.002,3.264,2.646,5.909,5.91,5.909h18.115v19.457c0,3.267,2.646,5.91,5.91,5.91
		                                                c3.264,0,5.909-2.646,5.91-5.908V34.997h18.611c3.262,0,5.908-2.645,5.908-5.907C60.367,25.824,57.718,23.178,54.454,23.18z" />
                                            </g>
                                        </svg>
                                    </div>
                                    <p class="ml-2 text-sm">adicionar nova categoria</p>
                                </div>
                            </div>
                        </div>
                        <!--Nome membro-->
                        <div>
                            <DefaultInput v-model="offerData.memberName" />
                        </div>
                        <div class="w-full flex">
                            <div class="w-1/2 mr-3">
                                <!--valor dízimo-->
                                <CurrencyInput v-model="offerData.value" label="Digite o valor" />
                            </div>
                            <div class="w-1/2">
                                <!--data-->
                                <DateInput id="datepicker-disable-future" v-model="offerData.date" label="Digite a data" />
                            </div>
                        </div>
                        <!--Submit button-->
                        <DefaultButton>Cadastrar Oferta</DefaultButton>
                    </form>
                </div>
            </div>
        </SectionGrid>
    </AuthenticatedLayout>
</template>