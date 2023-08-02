<script setup>
import { Ripple, Datepicker, Input, initTE, } from "tw-elements";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SectionGrid from '@/Layouts/SectionGrid.vue'
import { onMounted, reactive, watch } from "vue";
import DefaultInput from "@/Components/DefaultInput.vue";
import EmailInput from "@/Components/EmailInput.vue";
import DateInput from "@/Components/DateInput.vue";
import PhoneInput from "@/Components/PhoneInput.vue";
import DefaultButton from "@/Components/DefaultButton.vue"
import Dialog from "@/Components/Dialog.vue";
import axios from "axios";

defineProps(['flash'])
// options datePicker
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
    const affiliation = document.getElementById('datepicker-affiliation');
    new Datepicker(affiliation, options);
})
const notification = reactive({
    message: null,
    status: '',
    notify: false
})

watch(notification.notify, () => {
    console.log(notification.notify);
    notification.status = null
})
const form = reactive({
    name: '',
    email: '',
    phone: '',
    birthDate: '',
    affiliationDate: ''
})

const submit = () => {

    const register = async () => {
        const response = await axios.post(route('member.store'), form)
        return response.data
    }

    register().then((data) => {
        notification.message = data.message
        notification.status = data.status
        notification.notify = true
        clearFields()
    }).catch((errors) => {
        notification.message = JSON.parse(errors.request.response)
        notification.notify = true
        notification.status = null
    })
}
const clearFields = () => {
    form.name = null
    form.email = null
    form.phone = null
    form.birthDate = null
    form.affiliationDate = null
}
</script>

<template>
    <AuthenticatedLayout>
        <!-- notificação cadastro-->
        <div v-if="notification.notify">
            <div class="flex">
                <Dialog v-model="notification.notify" :status="notification.status" :description="notification.message"
                    button="Ok!" />
            </div>
        </div>
        <SectionGrid id="table-analyze-payroll" class="py-4 my-8 rounded-md">
            <div class="max-w-7xl sm:px-2 lg:px-2">
                <h2 class=" font-thin font-roboto pb-4 ml-4 text-base text-sky-700 leading-tight">Cadastrar novo membro</h2>
            </div>
            <div class=" max-w-xl mx-auto p-8">
                <div class="block max-w-1xl rounded-lg bg-white p-6">
                    <form @submit.prevent="submit">
                        <!--Nome membro-->
                        <DefaultInput v-model="form.name" />
                        <!--Email-->
                        <EmailInput v-model="form.email" />
                        <div class="w-full flex">
                            <div class="w-1/2 mr-3">
                                <!--data nascimento-->
                                <DateInput id="datepicker-disable-future" v-model="form.birthDate"
                                    label="Digite a data de nascimento" />
                            </div>
                            <div class="w-1/2">
                                <!--data nascimento-->
                                <DateInput id="datepicker-affiliation" v-model="form.affiliationDate"
                                    label="Digite a data filiação" />
                            </div>
                        </div>


                        <!--data filiação-->

                        <!--telefone-->
                        <PhoneInput v-model="form.phone" />
                        <!--Submit button-->
                        <DefaultButton>Cadastrar membro</DefaultButton>
                    </form>
                </div>
            </div>
        </SectionGrid>
    </AuthenticatedLayout>
</template>