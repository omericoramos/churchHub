<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: true,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>

        <Head title="Entrar" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <div class="hidden bg-[length:500px_400px] bg-no-repeat bg-slate-800 bg-center lg:block lg:w-3/5"
         style="background-image: url('images/Logo-fundo-branco.png')">
            
        </div>
        <!-- Formulario login -->
        <div class="flex items-center w-full px-6 mx-auto lg:w-2/6">
            <div class="flex-1">
                <div class="text-center">
                    <img class="w-56 mx-auto" src="images/Logo-fundo-branco.png">
                    <p class="text-gray-800 ">Faça login para acessar sua conta</p>
                </div>

                <div class="mt-2">
                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="email" value="Email" />

                            <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                                autofocus autocomplete="username" />

                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="password" value="Senha" />

                            <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password"
                                required autocomplete="current-password" />

                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>
                        <div class="block mt-4">
                            <label class="flex items-center">
                                <Checkbox name="remember" v-model:checked="form.remember" />
                                <span class="ml-2 text-sm text-gray-600">Lembrar me</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <Link v-if="canResetPassword" :href="route('password.request')"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Esqueceu sua senha?
                            </Link>

                            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">
                                Entrar
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
