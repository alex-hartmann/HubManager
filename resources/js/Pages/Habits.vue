<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm, Head, usePage } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import { Link } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import Modal from '@/Components/Modal.vue';
import { useToast } from 'vue-toastification';

const form = useForm({
    title: '',
    description: '',
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

const submitForm = () => {
    form.post(route('habits.store'), {
        onSuccess: () => {
            showModal.value = false;
            form.reset();
        },
        onError: () => {
            toast.error('Failed to create habit. Please check the form for errors.');
            console.log("Erros de validação:", form.errors);
            page.props.flash.error = null;

        }

    })
}

const showModal = ref(false);

</script>
<template>

    <AppLayout title="Habits" :breadcrumbs="[{ name: 'Habits' }]">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="m-1">
                    <h3 class="text-lg font-semibold mb-2">Habit Tracker</h3>
                    <p class="text-gray-600">Build discipline and track your habits effectively.</p>
                </div>
                <div class="flex items-center justify-center">
                    <button @click="showModal = true"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Create Habit
                    </button>
                </div>
            </div>
        </div>
    </AppLayout>


    <Modal :show="showModal" @close="showModal = false">
        <template #header>
            <h2 class="text-lg font-semibold">Create Habit</h2>
        </template>
        <div class="p-6">
            <p>Cadastre seu novo hábito</p>
            <form @submit.prevent="submitForm" class="mt-4">
                <div class="mb-4">
                    <InputLabel for="name" value="Name" />
                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.title" required
                        autofocus />
                    <InputError :message="form.errors.name" class="mt-2" />
                </div>
                <div class="mb-4">
                    <InputLabel for="description" value="Description" />
                    <textarea id="description"
                        class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        v-model="form.description"></textarea>
                    <InputError :message="form.errors.description" class="mt-2" />
                </div>
                <div class="flex justify-end">
                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Save Habit
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </Modal>
</template>