<script setup>
import { Ripple, Datepicker, Input, initTE, Select, Modal } from "tw-elements"
import DateInput from '@/Components/DateInput.vue'
import DefaultButton from '@/Components/DefaultButton.vue'
import CurrencyInput from '@/Components/CurrencyInput.vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import SectionGrid from '@/Layouts/SectionGrid.vue'
import { reactive, onMounted, ref } from 'vue'
import Dialog from "@/Components/Dialog.vue"
import axios from "axios"
import SelectComponets from '@/Components/Form/SelectComponents.vue'
import { PlusIcon } from "@heroicons/vue/24/solid"
import DefaultInput from "@/Components/DefaultInput.vue"

const offerCategory = ref('')
const membersData = ref('')
const categoryName = ref('')
const offerData = reactive({
    memberName: null,
    memberId: null,
    categoryOffer: 1,
    value: null,
    date: null
})

const listOfferCategory = () => {
    const list = async () => {
        const response = await axios.get(route('offerCategory.index'))
        return response.data
    }
    list().then((data) => {
        offerData.categoryOffer = data[0].id
        offerCategory.value = data
    })
}
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
    initTE({ Ripple, Datepicker, Input, Select, Modal });
    const datepickerDisableFuture = document.getElementById('datepicker-disable-future');
    new Datepicker(datepickerDisableFuture, options);
    listOfferCategory()
})

const searchMember = () => {

    if (offerData.memberName.length > 1) {

        const memberList = async () => {
            const response = await axios.get(route('member.search'), {
                params: {
                    member: offerData.memberName
                }
            })

            return response.data
        }

        memberList().then((memberList) => {
            document.getElementById('search_result').innerHTML = ''
            memberList.data[0] != null ? membersData.value = memberList.data
                : membersData.value = [{ "name": "Não encontrado" }]
        })
    }
}

const getMemberData = (member) => {
    offerData.memberId = member.id
    offerData.memberName = member.name
    membersData.value = null
}

const notification = reactive({
    message: null,
    status: null,
    notify: false
})

const submit = () => {

    const offerStore = async () => {
        const response = await axios.post(route('offer.store'), offerData)
        return response.data
    }

    offerStore().then((data) => {
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
    offerData.date = null
    offerData.value = null
    categoryName.value = null
}

const registerCategory = () => {
    const categoryStore = async () => {
        const response = await axios.post(route('offerCategory.store'), {
            categoryStore: categoryName.value
        })
        return response.data
    }

    categoryStore().then((data) => {
        notification.message = data.message
        notification.status = data.status
        notification.notify = true
        clearFields()
        listOfferCategory()
    }).catch((errors) => {
        notification.message = JSON.parse(errors.request.response)
        notification.notify = true
    })
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
                <h2 class=" font-thin font-roboto pb-4 ml-4 text-base text-sky-700 leading-tight">Adicionar oferta</h2>
            </div>
            <div class=" max-w-xl mx-auto p-8">
                <div class="block max-w-1xl rounded-lg bg-white p-6">
                    <form @submit.prevent="submit">
                        <div class="w-full flex my-4">
                            <div class="w-1/2 mr-3">
                                <!--categoria oferta-->
                                <SelectComponets v-model="offerData.categoryOffer">
                                    <option v-for="category in offerCategory" v-bind:value="category.id">
                                        {{ category.type_offer }}
                                    </option>
                                </SelectComponets>
                            </div>
                            <div class="w-1/2">
                                <!--data-->
                                <div class=" flex rounded bg-primary-600 hover:bg-primary-800 text-white py-2 px-1 cursor-pointer"
                                    data-te-toggle="modal" data-te-target="#staticBackdrop" data-te-ripple-init
                                    data-te-ripple-color="light">
                                    <div class="mt-1">
                                        <PlusIcon class="h-4 w-4 text-white" aria-hidden="true" />
                                    </div>
                                    <p class="ml-2 text-sm">adicionar nova categoria</p>
                                </div>
                            </div>
                        </div>
                        <!--Nome membro-->
                        <div class="relative mb-4" data-te-input-wrapper-init>
                            <input type="text" v-model="offerData.memberName" @keyup="searchMember" class="peer block min-h-[auto] w-full 
                            rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 
                            ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100
                             motion-reduce:transition-none" id="membro" />
                            <label for="membro" class="text-slate-400 pointer-events-none bg-white absolute px-3 left-2 
                                top-0 mb-5 max-w-[90%] origin-[0_0] text-sm truncate pt-[0.37rem] leading-[1.6]
                                transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.9]
                                peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1rem] 
                                peer-data-[te-input-state-active]:scale-[0.9] motion-reduce:transition-none">
                                Nome do membro
                            </label>
                        </div>
                        <div>
                            <span id="search_result"></span>
                            <ul class="w-96 z-40 absolute bg-white shadow-sm overflow-auto max-h-48">
                                <li v-for="member in membersData" @click="getMemberData(member)"
                                    class="cursor-pointer px-2 border-white hover:bg-slate-100 py-3">
                                    {{ member.name }}
                                </li>
                            </ul>
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
                        <DefaultButton @click="notification.status = false">Cadastrar Oferta</DefaultButton>
                    </form>
                </div>
            </div>
        </SectionGrid>
        <!-- Modal -->
        <div data-te-modal-init
            class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
            id="staticBackdrop" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div data-te-modal-dialog-ref class="pointer-events-none relative w-auto translate-y-[-50px] 
                opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7
                min-[576px]:max-w-[500px]">
                <div class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full
                 flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 
                    border-opacity-100 p-4">
                        <!--Modal title-->
                        <h5 class="text-base font-medium leading-normal text-sky-700" id="staticBackdropLabel">
                            Cadastrar Categoria oferta
                        </h5>
                        <!--Close button-->
                        <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75
                         focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss
                            aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <form @submit.prevent="registerCategory">
                        <!--Modal body-->
                        <div data-te-modal-body-ref class="relative p-4">
                            <!--Nome categoria-->
                            <DefaultInput v-model="categoryName" label="Categoria" />
                        </div>

                        <!--Modal footer-->
                        <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 
                        border-opacity-100 p-4">
                            <button type="button" class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs 
                            font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out 
                            hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 
                            active:bg-primary-accent-200" data-te-modal-dismiss data-te-ripple-init
                                data-te-ripple-color="light">
                                Fechar
                            </button>
                            <div class="w-28 ml-4">
                                <DefaultButton data-te-modal-dismiss data-te-ripple-init
                                    @click="notification.status = false">
                                    Cadastrar
                                </DefaultButton>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>