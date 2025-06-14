<script setup>
import { useForm, Head } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import { Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import { watch } from 'vue';
import { useToast } from 'vue-toastification'; 

const toast = useToast();
const page = usePage();

watch(() => page.props.flash.status, (message) => {
    if (message) {
        toast.success(message);
        page.props.flash.status = null;
    }
});

watch(() => page.props.flash.error, (message) => {
    if (message) {
        toast.error(message);
        page.props.flash.error = null;
    }
});


// Define o formulário com os campos que serão enviados
const form = useForm({
    email: '',
    password: '',
    remember: false, // Para a funcionalidade "Lembrar-me"
});

const submit = () => {

    form.post(route('login'), { // Assume que você tem uma rota nomeada 'login'
        onSuccess: () => {

        }, onError: () => {

        }, onFinish: () => form.reset('password'), // Limpa o campo de senha após a submissão
    });
};
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div v-if="form.errors.email" class="mb-4 font-medium text-sm text-red-600">
                {{ form.errors.email }}
            </div>

            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="email" value="Email" />
                    <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus
                        autocomplete="username" />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Senha" />
                    <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                        autocomplete="current-password" />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="block mt-4">
                    <label class="flex items-center">
                        <Checkbox name="remember" v-model:checked="form.remember" />
                        <span class="ms-2 text-sm text-gray-600">Lembrar-me</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">

                    <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Log in
                    </PrimaryButton>
                </div>
            </form>
            <Link target="_blank" :href="route('register')"
                class="underline text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Criar uma conta</Link>
        </div>
    </div>

</template>