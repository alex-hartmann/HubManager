<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { router } from '@inertiajs/vue3';
import TaskModal from '@/Components/TaskModal.vue';
import { ref } from 'vue';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import Checkbox from '@/Components/Checkbox.vue';


const showTaskModal = ref(false);
const taskBeingEdited = ref(null);

const showCreateModal = () => {
    taskBeingEdited.value = null;
    showTaskModal.value = true;
};

const editTask = (task) => {
    showTaskModal.value = true;
    taskBeingEdited.value = task;
};

const closeTaskModal = () => {
    showTaskModal.value = false;
    taskBeingEdited.value = null;
};

const updateTaskStatus = ($taskId, $status) => {
    const newStatus = $status ? 'completed' : 'pending';
    router.put(route('tasks.updateStatus', $taskId), { status: newStatus }, {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            console.log('Task status updated successfully', newStatus);
        },
        onError: () => {
            console.error('Error updating task status:', form.errors);
        },
    });
};



const deleteTask = ($taskId) => {
    if (confirm('Are you sure you want to delete this task?')) {
        router.delete(route('tasks.destroy', $taskId), {
            onSuccess: () => {
                console.log('Task deleted successfully');
            },
            onError: () => {
                console.error('Error deleting task:', form.errors);
            },
        });
    }
}

const reopenTask = ($taskid) => {
    router.put(route('tasks.reopen', $taskid), {
        onSuccess: () => {

        }, onError: () => {

        }
    });
}

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
                    <button @click="showCreateModal"
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
                                    <span class="font-bold text-[#18181b] text-lg">Pendings Tasks</span>
                                </div>
                                <span class="text-xs bg-[#e0e7ff] text-[#6366f1] px-3 py-1 rounded-full font-semibold">
                                    {{ $page.props.totalPending }}
                                    Pending</span>
                            </div>
                            <ul class="space-y-4">
                                
                                <li v-for="task in $page.props.tasks" :key="task.id">
                                    <div class="flex flex-col gap-4">
                                        <div class="flex items-center gap-4 justify-between">
                                            <div class="flex items-center gap-4">

                                                <Checkbox
                                                    :style="{ borderColor: '#' + task.color, color: '#' + task.color }"
                                                    class="focus:ring-gray-400 focus:ring-opacity-50"
                                                    v-model="task.is_completed" :checked="task.is_completed"
                                                    @change="updateTaskStatus(task.id, task.is_completed)" />

                                                <span v-if="task.status" class="font-medium text-[#18181b]"
                                                    :class="{ 'line-through': task.status === 'completed' }">{{
                                                        task.title
                                                    }}</span>
                                                <span class="ml-2 text-xs bg-[#f59e42]/20 rounded px-2 py-0.5 font-bold"
                                                    :style="{ color: '#' + task.color }">{{
                                                        task.priority }}</span>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <button @click="editTask(task)"
                                                    class="rounded-md p-2 hover:bg-[#f6f9fc]">
                                                    <font-awesome-icon icon="pen-to-square" class="text-[#78716c]" />
                                                </button>
                                                <form @submit.prevent="deleteTask(task.id)"><button
                                                        class="rounded-md p-2 hover:bg-[#f87171]/20">
                                                        <font-awesome-icon icon="trash-can" class="text-[#f87171]" />
                                                    </button></form>

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

                                <i class="text-[#10b981]" data-fa-i2svg=""><svg class="svg-inline--fa fa-calendar-check"
                                        aria-hidden="true" focusable="false" data-prefix="fas"
                                        data-icon="calendar-check" role="img" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zM329 305c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-95 95-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L329 305z">
                                        </path>
                                    </svg></i>


                                <span class="font-bold text-[#18181b] text-lg">Completed This Week</span>
                            </div>
                            <div class="flex flex-col gap-2 pl-6 text-[#78716c]">
                                <ul class="space-y-4">
                                    <li v-for="task in $page.props.tasksCompletedWeek" :key="task.id">
                                        <div>{{ task.completed_day }}: <span class="text-[#10b981]"><i
                                                    data-fa-i2svg=""><svg class="svg-inline--fa fa-circle-check"
                                                        aria-hidden="true" focusable="false" data-prefix="fas"
                                                        data-icon="circle-check" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z">
                                                        </path>
                                                    </svg></i></span> {{ task.title }}
                                            <button @click="reopenTask(task.id)"
                                                class="rounded-md ml-5 hover:bg-[#f6f9fc]">
                                                <font-awesome-icon icon="rotate-left" class="text-[#78716c]" />
                                            </button>
                                        </div>

                                    </li>
                                </ul>

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
                                <span class="font-bold text-[#18181b] text-lg">All Tasks</span>
                            </div>
                            <ul class="space-y-4">
                                <li v-for="task in $page.props.alltasks" :key="task.id">
                                    <div>
                                        <div class="flex justify-between mb-1">
                                            <span v-if="task.status" class="font-medium text-[#18181b]"
                                                    :class="{ 'line-through': task.status === 'completed' }">{{
                                                        task.title
                                                    }}</span>
                                            <span class="text-xs text-[#6366f1] font-bold">{{ task.completed_at_formatted }}</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
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
                                    <div class="h-24 w-4 bg-[#818cf8] rounded-t-lg">
                                        <div class="bg-[#6366f1] rounded-t-lg"
                                            :style="{ height: `${$page.props.total}%` }"></div>
                                    </div>
                                    <span class="text-xs font-bold mt-2 text-[#6366f1]">{{ $page.props.totalCompleted }}
                                        Tasks </span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
        </section>
    </AppLayout>
    <TaskModal :show="showTaskModal" :task-data="taskBeingEdited" @close="closeTaskModal" />
</template>