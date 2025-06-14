<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'; // O layout principal do Breeze
import { watch } from 'vue';
defineProps({
    user: Object, // Propriedade para o usuário autenticado
});
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <p>Seja bem vindo, {{ user.name }}!</p>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="text-2xl">
                            Bem-vindo ao seu Dashboard!
                        </div>

                        <p class="mt-3 text-gray-500 text-lg">
                            Esta é a área protegida onde você pode adicionar seus widgets e informações importantes.
                        </p>
                    </div>

                    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                        <div class="p-6 bg-white rounded-lg shadow-sm">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Usuários Online</h3>
                            <p class="text-gray-700">Visualize seus usuários ativos.</p>
                            <a href="#"
                                class="mt-4 inline-flex items-center text-indigo-500 hover:text-indigo-600 font-medium">
                                Ver mais
                                <svg class="ms-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                            </a>
                        </div>
                        <div class="p-6 bg-white rounded-lg shadow-sm">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Relatórios</h3>
                            <p class="text-gray-700">Acesse relatórios e estatísticas.</p>
                            <a href="#"
                                class="mt-4 inline-flex items-center text-indigo-500 hover:text-indigo-600 font-medium">
                                Gerar relatório
                                <svg class="ms-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>