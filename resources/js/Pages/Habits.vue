<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm, Head, usePage } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import { Link } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';
import Modal from '@/Components/Modal.vue';

const form = useForm({
    title: '',
    frequency: 'daily',
    goal: 1
});

const goalModel = computed({
    get() {
        return form.goal !== null ? String(form.goal) : '';
    },
    set(value) {
        let parsedValue = Number(value);
        if (value === '' || isNaN(parsedValue) || parsedValue < 1) {
            form.goal = 1;
        } else {
            form.goal = Number(value);
        }
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
        }

    })
}

const deleteHabit = (habitId) => {
    if (confirm('Are you sure you want to delete this habit?')) {
        form.delete(route('habits.destroy', habitId), {
            onSuccess: () => {

            },
            onError: () => {

            }
        });
    }
}

const updateHabitProgress = (habit) => {
    const formForUpdate = useForm({
        completed: habit.is_completed_today,
    });

    formForUpdate.put(route('habits.update', habit.id), {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
        },
        onError: () => {
        }
    });
}

const modalTest = ref(false);

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

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div id="habit-list-card" class="col-span-1 bg-white rounded-2xl shadow p-6 transition-bg">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-semibold text-gray-900 ">Your Habits</h2>
                        <button id="suggested-habits-btn"
                            class="text-blue-600 text-sm font-medium hover:underline transition">Suggestions</button>
                    </div>
                    <ul id="active-habits-list" class="space-y-5">
                        <li v-for="habit in $page.props.habits" :key="habit.id" id="habit-card-1"
                            class="flex items-center gap-4 p-3 rounded-xl hover:bg-gray-100 transition">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                <i class="text-blue-700" data-fa-i2svg=""><svg class="svg-inline--fa fa-book-open"
                                        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="book-open"
                                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                        data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M249.6 471.5c10.8 3.8 22.4-4.1 22.4-15.5V78.6c0-4.2-1.6-8.4-5-11C247.4 52 202.4 32 144 32C93.5 32 46.3 45.3 18.1 56.1C6.8 60.5 0 71.7 0 83.8V454.1c0 11.9 12.8 20.2 24.1 16.5C55.6 460.1 105.5 448 144 448c33.9 0 79 14 105.6 23.5zm76.8 0C353 462 398.1 448 432 448c38.5 0 88.4 12.1 119.9 22.6c11.3 3.8 24.1-4.6 24.1-16.5V83.8c0-12.1-6.8-23.3-18.1-27.6C529.7 45.3 482.5 32 432 32c-58.4 0-103.4 20-123 35.6c-3.3 2.6-5 6.8-5 11V456c0 11.4 11.7 19.3 22.4 15.5z">
                                        </path>
                                    </svg></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="text-md font-medium text-gray-900">{{ habit.title }}</span>
                                    <span class="px-2 py-0.5 text-xs rounded bg-blue-50 text-blue-700 ">{{
                                        habit.frequency }}</span>
                                </div>
                                <div class="flex items-center gap-2 text-sm text-gray-500 ">
                                    <i class="text-orange-500" data-fa-i2svg=""><svg class="svg-inline--fa fa-fire"
                                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="fire"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            data-fa-i2svg="">
                                        </svg></i>
                                    <span>Streak: 🔥<b class="text-gray-800">{{ habit.streak_today }}</b> days</span>
                                </div>
                            </div>
                            <div class="flex flex-col items-end">
                                <Checkbox v-model="habit.is_completed_today" class="mr-2"
                                    @change="updateHabitProgress(habit)" :checked="habit.is_completed_today" />
                                <button @click="deleteHabit(habit.id)"
                                    class="text-red-600 hover:text-red-800 transition pr-1">
                                    ⛔
                                </button>
                            </div>
                        </li>
                    </ul>

                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <h4 class="text-lg font-semibold mb-4">Your Habits</h4>
                    <ul class="list-disc pl-5">
                        <li v-for="habit in $page.props.habits" :key="habit.id" class="mb-2">
                            <div class="flex items-center">
                                <Checkbox v-model="habit.is_completed_today" class="mr-2"
                                    @change="updateHabitProgress(habit)" :checked="habit.is_completed_today" />
                                <span class="font-medium">{{ habit.title }} - {{ habit.streak_today }}</span>

                                <button @click="deleteHabit(habit.id)"
                                    class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                                    x
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AppLayout>

    <Modal :show="showModal" @close="showModal = false">
        <template #header>
            <h2 class="text-lg font-semibold">Create Habit</h2>
        </template>
        <div class="p-6 bg-opacity-20">
            <p>Cadastre seu novo hábito</p>
            <form @submit.prevent="submitForm" class="mt-4">
                <div class="mb-4">
                    <InputLabel for="name" value="Name" />
                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.title" required
                        autofocus />
                    <InputError :message="form.errors.name" class="mt-2" />
                </div>
                <div class="gap-4 flex">
                    <div class="mb-4 flex-1">
                        <InputLabel for="frequency" value="Frequency" />
                        <select id="frequency"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            v-model="form.frequency" required>
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                        </select>
                        <InputError :message="form.errors.frequency" class="mt-2" />
                    </div>
                    <div class="mb-4 flex-1">
                        <InputLabel for="goal" value="Goal" />
                        <TextInput id="goal" type="number" class="mt-1 block w-full" v-model="goalModel"
                            placeholder="Times/week or month" min="1" max="31" required />
                        <InputError :message="form.errors.goal" class="mt-2" />
                    </div>
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
