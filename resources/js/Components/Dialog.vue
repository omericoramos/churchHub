<script setup>
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { ref, reactive, onMounted } from 'vue'
const { description, status } = defineProps(['modelValue', 'status', 'description', 'button'])
const emit = defineEmits(['update:modelValue'])

const classes = reactive({
    button: '',
    message: '',
    title: ''
})

const notification = reactive({
    message: null,
})

const updateValue = () => {
    emit('update:modelValue', false)
}

onMounted(() => {
    if (description != null && description.errors) {
        let message = Object.values(description.errors);
        for (let index = 0; index < message.length; index++) {
            notification.message = notification.message ? notification.message + `<li class='my-2'>${message[index][0]}</li>`
                : `<li class='my-2'>${message[index][0]}</li>`
        }
    } else {
        notification.message = `<li class='my-2'>${description}</li>`
    }
})

const title = ref(null)
if (status == 'success') {
    classes.title = 'text-lg mb-5 font-medium leading-6 text-green-900'
    classes.message = 'text-sm text-green-600 font-medium'
    classes.button = 'bg-green-200 text-green-900 hover:bg-green-400'
    title.value = 'Sucesso!'
} else {
    classes.title = 'text-lg mb-5 font-medium leading-6 text-red-900'
    classes.message = 'text-sm text-red-600 font-medium'
    classes.button = 'bg-red-200 text-red-900 shadow-sm hover:bg-red-400'
    title.value = 'Erro no cadastro'
}

</script>
<template>
    <TransitionRoot as="template" :show="modelValue">
        <Dialog as="div" class="relative z-[1034]">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100"
                leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </TransitionChild>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <TransitionChild as="template" enter="ease-out duration-300"
                        enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200"
                        leave-from="opacity-100 translate-y-0 sm:scale-100"
                        leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <DialogPanel class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left
                         shadow-xl transition-all sm:mb-20 sm:w-full sm:max-w-sm sm:p-6">
                            <div>
                                <div class="my-2 text-center sm:mt-2">
                                    <DialogTitle as="h3" :class="classes.title">
                                        {{ title }}
                                    </DialogTitle>
                                    <div class="mt-2 overflow-auto">
                                        <ul :class="classes.message" v-html="notification.message"></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 sm:mt-6 flex items-center">
                                <button type="button" :class="classes.button" class=" m-auto inline-flex w-36 justify-center rounded-md border 
                                border-transparent px-4 py-2 text-base font-medium  sm:text-sm" @click=updateValue>
                                    {{ button }}
                                </button>

                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>