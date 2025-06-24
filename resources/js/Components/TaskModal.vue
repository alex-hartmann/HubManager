<script setup>
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import { computed, ref, setTransitionHooks, watch } from 'vue';
import Modal from '@/Components/Modal.vue';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

const props = defineProps({
    show: Boolean,
    taskData: {
        type: Object,
        default: null,
    },
});

const form = useForm({
    id: null,
    title: '',
    description: '',
    notes: '',
    priority: 'medium',
    due_date: '',
});

const emit = defineEmits(['close']);


watch(() => props.taskData, (newData) => {
    if (newData) {
        form.id = newData.id;
        form.title = newData.title;
        form.description = newData.description;
        form.notes = newData.notes;
        form.priority = newData.priority;
        form.due_date = newData.due_date;
    } else {
        form.reset();
        form.id = null;
    }
}, { immediate: true });

const submitForm = () => {
    if (form.id) {
        form.put(route('tasks.update', form.id), {
            onSuccess: () => {
                emit('close');
                form.reset();
            },
            onError: {

            }
        });
    } else {
        form.post(route('tasks.store'), {
            onSuccess: () => {
                emit('close');
                form.reset();
            },
            onError: {
                // Handle error, e.g., show an error message
            }
        });
    }
}

const close = () => {
    emit('close');
    form.clearErrors();
};


</script>
<template>
    <Modal :show="show" @close="close">
        <template #header>
            <h2 class="text-lg font-semibold">Create Task {{ form.id }}</h2>
        </template>
        <div class="p-6 bg-opacity-20">
            <p>{{ form.id ? 'Editar Tarefa:' : 'Cadastrar tarefa' }}</p>
            <form @submit.prevent="submitForm" class="mt-4">
                <input type="hidden" v-if="form.id" v-model="form.id" />
                <div class="mb-4">
                    <InputLabel for="title" value="Title" />
                    <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" required
                        autofocus />
                    <InputError :message="form.errors.title" class="mt-2" />
                </div>
                <div class="mb-4">
                    <InputLabel for="description" value="Description" />
                    <textarea id="description"
                        class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        v-model="form.description" rows="3" placeholder="Describe your task" required></textarea>
                    <InputError :message="form.errors.description" class="mt-2" />
                </div>
                <div class="mb-4">
                    <InputLabel for="notes" value="Notes" />
                    <textarea id="notes"
                        class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        v-model="form.notes" rows="3" placeholder="Additional notes (optional)"></textarea>
                    <InputError :message="form.errors.notes" class="mt-2" />
                </div>
                <div class="gap-4 flex">
                    <div class="mb-4 flex-1">
                        <InputLabel for="priority" value="Priority" />
                        <select id="priority"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            v-model="form.priority" required>
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                        <InputError :message="form.errors.frequency" class="mt-2" />
                    </div>
                    <div class="mb-4 flex-1">
                        <InputLabel for="due_date" value="Due Date" />
                        <TextInput id="due_date" type="date" class="mt-1 block w-full" v-model="form.due_date"
                            placeholder="dd/mm/yy" required />
                        <InputError :message="form.errors.due_date" class="mt-2" />
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-[#6366f1] text-white rounded-lg px-6 py-2 font-semibold flex items-center gap-2 shadow-lg hover:bg-[#4f46e5] transition">
                        <i data-fa-i2svg=""><svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false"
                                data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                </path>
                            </svg></i>
                        {{ form.id ? 'Update Task' : 'Create Task' }}
                    </button>
                </div>
            </form>
        </div>
    </Modal>
</template>