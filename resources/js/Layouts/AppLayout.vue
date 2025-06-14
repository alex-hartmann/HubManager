<script setup>
import { Head, usePage, Link } from '@inertiajs/vue3';
import { defineProps, watch } from 'vue';
import { useToast } from 'vue-toastification';
import axios from 'axios';
// Define as propriedades que este componente pode receber
defineProps({
    title: String, // Propriedade para o título da página
});

const page = usePage();
const toast = useToast();

watch(() => page.props.flash.success, (message) => {
    if (message) {
        toast.success(message);
        page.props.flash.success = null;
    }
});

watch(() => page.props.flash.error, (message) => {
    if (message) {
        toast.error(message);
        page.props.flash.error = null;
    }
});

const logout = () => {
    axios.post('/logout')
        .then(() => {
            window.location.href = '/'; // Redireciona para a página inicial após logout
        })
        .catch(error => {
            console.error('Erro ao fazer logout:', error);
        });
};

</script>

<template>
    <div>
        <Head :title="title" />

        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100 shadow">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="#" class="text-xl font-bold text-gray-800">Meu App</a>
                    </div>

                    <div class="flex items-center space-x-4">
                        <Link :href="route('dashboard')" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Dashboard</Link>
                        <Link :href="route('habits.index')" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Habits</Link>
                        <form method="POST" @submit.prevent="logout">
                            <button type="submit" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Sair</button>
                        </form>
                    </div>
                </div>
            </nav>

            <header v-if="$slots.header" class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <slot />
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="bg-white border-t border-gray-200 py-4 text-center text-sm text-gray-500">
                &copy; {{ new Date().getFullYear() }} Meu App. Todos os direitos reservados.
            </footer>
        </div>
    </div>
</template>