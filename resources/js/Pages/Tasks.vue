<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import { computed, ref, setTransitionHooks, watch } from 'vue';
import Modal from '@/Components/Modal.vue';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

const showModal = ref(false);

const form = useForm({
    title: '',
    description: '',
    notes: '',
    priority: 'medium',
    due_date: '',
});

const submitForm = () => {
    form.post(route('tasks.store'), {
        onSuccess: () => {
            form.reset();
            showModal.value = false;
        },
        onError: () => {
            console.error('Error submitting form:', form.errors);
        },
    });
};

</script>
<template>
    <AppLayout title="Tasks" :breadcrumbs="[{ name: 'Tasks' }]">
        <section id="productifin-main-screens" class="flex-1 flex flex-col gap-12">

            <!-- TASK MANAGEMENT SCREEN -->
            <section id="task-screen" class="bg-white rounded-2xl shadow-lg px-10 py-8 flex flex-col gap-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-[2rem] font-black text-[#6366f1] tracking-tight leading-[1.1]">Task Management
                        </h2>
                        <p class="text-[#78716c] text-lg font-medium mt-1">Organize, track, and celebrate your daily
                            achievements.</p>
                    </div>
                    <button @click="showModal = true"
                        class="bg-[#6366f1] text-white rounded-lg px-6 py-2 font-semibold flex items-center gap-2 shadow-lg hover:bg-[#4f46e5] transition">
                        <i data-fa-i2svg=""><svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false"
                                data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                </path>
                            </svg></i>
                        New Task
                    </button>
                </div>

                <!-- TASKS LIST & STATS -->
                <div class="flex flex-col xl:flex-row gap-8">
                    <!-- TASKS -->
                    <div id="tasks-list-block" class="flex-1 flex flex-col gap-6">
                        <!-- Pending tasks -->
                        <div id="pending-tasks-card" class="bg-[#f1f5f9] rounded-xl p-6 flex flex-col gap-4 shadow-sm">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-2">
                                    <i class="text-[#6366f1]" data-fa-i2svg=""><svg
                                            class="svg-inline--fa fa-hourglass-half" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="hourglass-half" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M32 0C14.3 0 0 14.3 0 32S14.3 64 32 64V75c0 42.4 16.9 83.1 46.9 113.1L146.7 256 78.9 323.9C48.9 353.9 32 394.6 32 437v11c-17.7 0-32 14.3-32 32s14.3 32 32 32H64 320h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V437c0-42.4-16.9-83.1-46.9-113.1L237.3 256l67.9-67.9c30-30 46.9-70.7 46.9-113.1V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H320 64 32zM96 75V64H288V75c0 19-5.6 37.4-16 53H112c-10.3-15.6-16-34-16-53zm16 309c3.5-5.3 7.6-10.3 12.1-14.9L192 301.3l67.9 67.9c4.6 4.6 8.6 9.6 12.1 14.9H112z">
                                            </path>
                                        </svg></i>
                                    <span class="font-bold text-[#18181b] text-lg">Today's Tasks</span>
                                </div>
                                <span class="text-xs bg-[#e0e7ff] text-[#6366f1] px-3 py-1 rounded-full font-semibold">{{ $page.props.total}}
                                    Pending</span>
                            </div>
                            <ul class="space-y-4">

                                <li v-for="task in $page.props.tasks" :key="task.id">
                                    <div class="flex flex-col gap-4">
                                        <div class="flex items-center gap-4 justify-between">
                                            <div class="flex items-center gap-4">
                                                <button
                                                    class="h-6 w-6 rounded-full border-2 flex items-center justify-center hover:bg-[#000]/20 transition"
                                                    :style="{borderColor: '#' + task.color, color: '#' + task.color}">
                                                <font-awesome-icon icon="check" /></button>
                                                <span class="font-medium text-[#18181b]">{{ task.title }}</span>
                                                <span class="ml-2 text-xs bg-[#f59e42]/20 rounded px-2 py-0.5 font-bold"
                                                    :style="{color: '#' + task.color}">{{
                                                    task.priority }}</span>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <button class="rounded-md p-2 hover:bg-[#f6f9fc]">
                                                        <font-awesome-icon icon="pen-to-square"
                                                            class="text-[#78716c]"/>
                                                    </button>
                                                <button class="rounded-md p-2 hover:bg-[#f87171]/20">
                                                        <font-awesome-icon icon="trash-can"
                                                            class="text-[#f87171]"/>
                                                   </button>
                                            </div>
                                        </div>

                                    </div>

                                </li>
                            </ul>

       
                            
                        </div>
                        <!-- Completed Tasks by Day -->
                        <div id="completed-tasks-day-block"
                            class="bg-[#f1f5f9] rounded-xl p-6 flex flex-col gap-3 shadow-sm">
                            <div class="flex items-center gap-2 mb-2">

                                ✅
                                <span class="font-bold text-[#18181b] text-lg">Completed This Week</span>
                            </div>
                            <div class="flex flex-col gap-2 pl-6 text-[#78716c]">
                                <div>Monday: <span class="text-[#10b981]">✅</span> Study Laravel</div>
                                <div>Tuesday: <span class="text-[#10b981]">✅</span> Read finance blog</div>
                                <div>Wednesday: <span class="text-[#10b981]">✅</span> Walk 30 min</div>
                            </div>
                        </div>
                    </div>

                    <!-- TASK STATS & REWARDS -->
                    <div id="task-stats-rewards-block" class="flex flex-col gap-6 w-full xl:w-[370px]">
                        <!-- Progress per task -->
                        <div id="task-progress-card" class="bg-[#f1f5f9] rounded-xl p-6 shadow-sm">
                            <div class="flex items-center gap-2 mb-4">
                                <i class="text-[#6366f1]" data-fa-i2svg=""><svg class="svg-inline--fa fa-chart-simple"
                                        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chart-simple"
                                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                        data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M160 80c0-26.5 21.5-48 48-48h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H208c-26.5 0-48-21.5-48-48V80zM0 272c0-26.5 21.5-48 48-48H80c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V272zM368 96h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H368c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48z">
                                        </path>
                                    </svg></i>
                                <span class="font-bold text-[#18181b] text-lg">Progress</span>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="font-medium text-[#18181b]">Study Laravel</span>
                                        <span class="text-xs text-[#6366f1] font-bold">75% this month</span>
                                    </div>
                                    <div class="w-full h-3 bg-[#e0e7ff] rounded-lg overflow-hidden">
                                        <div class="h-3 bg-[#6366f1] rounded-lg w-[75%] transition-all"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="font-medium text-[#18181b]">Read finance blog</span>
                                        <span class="text-xs text-[#6366f1] font-bold">50% this month</span>
                                    </div>
                                    <div class="w-full h-3 bg-[#e0e7ff] rounded-lg overflow-hidden">
                                        <div class="h-3 bg-[#6366f1] rounded-lg w-[50%] transition-all"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="font-medium text-[#18181b]">Walk 30 min</span>
                                        <span class="text-xs text-[#6366f1] font-bold">60% this month</span>
                                    </div>
                                    <div class="w-full h-3 bg-[#e0e7ff] rounded-lg overflow-hidden">
                                        <div class="h-3 bg-[#6366f1] rounded-lg w-[60%] transition-all"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Monthly progress summary -->
                        <div id="monthly-progress-block" class="bg-[#f1f5f9] rounded-xl p-6 shadow-sm">
                            <div class="flex items-center gap-2 mb-2">
                                <i class="text-[#6366f1]" data-fa-i2svg=""><svg class="svg-inline--fa fa-calendar-days"
                                        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-days"
                                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                        data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z">
                                        </path>
                                    </svg></i>
                                <span class="font-bold text-[#18181b] text-lg">Monthly Achievements</span>
                            </div>
                            <div class="flex items-end gap-4 mt-4 px-1">
                                <div class="flex flex-col items-center">
                                    <div class="h-20 w-4 bg-[#6366f1] rounded-t-lg"></div>
                                    <span class="text-xs font-bold mt-2 text-[#6366f1]">15 Tasks</span>
                                </div>
                                <div class="flex flex-col items-center">
                                    <div class="h-12 w-4 bg-[#a5b4fc] rounded-t-lg"></div>
                                    <span class="text-xs font-bold mt-2 text-[#a5b4fc]">12 Days</span>
                                </div>
                                <div class="flex flex-col items-center">
                                    <div class="h-8 w-4 bg-[#818cf8] rounded-t-lg"></div>
                                    <span class="text-xs font-bold mt-2 text-[#818cf8]">3 Rewards</span>
                                </div>
                            </div>
                        </div>
                        <!-- Reward system -->
                        <div id="rewards-block"
                            class="bg-[#f1f5f9] rounded-xl p-6 shadow-sm flex flex-col items-center justify-center gap-2">
                            <i class="text-3xl text-[#f59e42] mb-2" data-fa-i2svg=""><svg
                                    class="svg-inline--fa fa-trophy" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="trophy" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M400 0H176c-26.5 0-48.1 21.8-47.1 48.2c.2 5.3 .4 10.6 .7 15.8H24C10.7 64 0 74.7 0 88c0 92.6 33.5 157 78.5 200.7c44.3 43.1 98.3 64.8 138.1 75.8c23.4 6.5 39.4 26 39.4 45.6c0 20.9-17 37.9-37.9 37.9H192c-17.7 0-32 14.3-32 32s14.3 32 32 32H384c17.7 0 32-14.3 32-32s-14.3-32-32-32H357.9C337 448 320 431 320 410.1c0-19.6 15.9-39.2 39.4-45.6c39.9-11 93.9-32.7 138.2-75.8C542.5 245 576 180.6 576 88c0-13.3-10.7-24-24-24H446.4c.3-5.2 .5-10.4 .7-15.8C448.1 21.8 426.5 0 400 0zM48.9 112h84.4c9.1 90.1 29.2 150.3 51.9 190.6c-24.9-11-50.8-26.5-73.2-48.3c-32-31.1-58-76-63-142.3zM464.1 254.3c-22.4 21.8-48.3 37.3-73.2 48.3c22.7-40.3 42.8-100.5 51.9-190.6h84.4c-5.1 66.3-31.1 111.2-63 142.3z">
                                    </path>
                                </svg></i>
                            <span class="font-bold text-[#18181b] text-lg">Reward System</span>
                            <span class="text-sm text-[#6366f1] font-semibold">Complete 20 tasks and earn an
                                incentive!</span>
                            <div class="w-full h-3 bg-[#fde68a] rounded-lg overflow-hidden mt-2">
                                <div class="h-3 bg-[#f59e42] rounded-lg w-[65%] transition-all"></div>
                            </div>
                            <span class="text-xs text-[#f59e42] mt-1 font-medium">13/20 tasks completed</span>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </AppLayout>


    <Modal :show="showModal" @close="showModal = false">
        <template #header>
            <h2 class="text-lg font-semibold">Create Habit</h2>
        </template>
        <div class="p-6 bg-opacity-20">
            <p>Cadastre seu novo hábito</p>
            <form @submit.prevent="submitForm" class="mt-4">
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
                        Save Task
                    </button>
                </div>
            </form>
        </div>
    </Modal>
</template>