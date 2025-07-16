<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
</script>
<template>
    <AppLayout title="Finances" :breadcrumbs="[{ name: 'Finances' }]">
        <section id="finance-screen" class="bg-white rounded-2xl shadow-lg px-10 py-8 flex flex-col gap-8">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-[2rem] font-black text-[#10b981] tracking-tight leading-[1.1]">Financial Management
                    </h2>
                    <p class="text-[#78716c] text-lg font-medium mt-1">Gain control over your finances and reach your
                        goals.</p>
                </div>
                <button
                    class="bg-[#10b981] text-white rounded-lg px-6 py-2 font-semibold flex items-center gap-2 shadow-lg hover:bg-[#059669] transition">
                    <i data-fa-i2svg=""><svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false"
                            data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                            </path>
                        </svg></i>
                    New Account
                </button>
            </div>
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Accounts, Expenses, Financial goals -->
                <div id="finance-main-block" class="flex-1 flex flex-col gap-6">
                    <!-- Register Accounts -->
                    <div id="accounts-card" class="bg-[#f1f5f9] rounded-xl p-6 flex flex-col gap-4 shadow-sm">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-2">
                                <i class="text-[#10b981]" data-fa-i2svg=""><svg class="svg-inline--fa fa-wallet"
                                        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="wallet"
                                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V192c0-35.3-28.7-64-64-64H80c-8.8 0-16-7.2-16-16s7.2-16 16-16H448c17.7 0 32-14.3 32-32s-14.3-32-32-32H64zM416 272a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                        </path>
                                    </svg></i>
                                <span class="font-bold text-[#18181b] text-lg">Accounts</span>
                            </div>
                            <span class="text-xs bg-[#d1fae5] text-[#10b981] px-3 py-1 rounded-full font-semibold">3
                                Registered</span>
                        </div>
                        <div class="flex flex-col gap-3">
                            <div class="flex items-center gap-4 justify-between">
                                <div class="flex items-center gap-4">
                                    <i class="text-[#10b981]" data-fa-i2svg=""><svg
                                            class="svg-inline--fa fa-money-bill-wave" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="money-bill-wave" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M0 112.5V422.3c0 18 10.1 35 27 41.3c87 32.5 174 10.3 261-11.9c79.8-20.3 159.6-40.7 239.3-18.9c23 6.3 48.7-9.5 48.7-33.4V89.7c0-18-10.1-35-27-41.3C462 15.9 375 38.1 288 60.3C208.2 80.6 128.4 100.9 48.7 79.1C25.6 72.8 0 88.6 0 112.5zM288 352c-44.2 0-80-43-80-96s35.8-96 80-96s80 43 80 96s-35.8 96-80 96zM64 352c35.3 0 64 28.7 64 64H64V352zm64-208c0 35.3-28.7 64-64 64V144h64zM512 304v64H448c0-35.3 28.7-64 64-64zM448 96h64v64c-35.3 0-64-28.7-64-64z">
                                            </path>
                                        </svg></i>
                                    <span class="font-medium text-[#18181b]">Salary</span>
                                </div>
                                <span class="text-sm font-bold text-[#10b981]">$3,000</span>
                            </div>
                            <div class="flex items-center gap-4 justify-between">
                                <div class="flex items-center gap-4">
                                    <i class="text-[#6366f1]" data-fa-i2svg=""><svg
                                            class="svg-inline--fa fa-building-columns" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="building-columns" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M243.4 2.6l-224 96c-14 6-21.8 21-18.7 35.8S16.8 160 32 160v8c0 13.3 10.7 24 24 24H456c13.3 0 24-10.7 24-24v-8c15.2 0 28.3-10.7 31.3-25.6s-4.8-29.9-18.7-35.8l-224-96c-8-3.4-17.2-3.4-25.2 0zM128 224H64V420.3c-.6 .3-1.2 .7-1.8 1.1l-48 32c-11.7 7.8-17 22.4-12.9 35.9S17.9 512 32 512H480c14.1 0 26.5-9.2 30.6-22.7s-1.1-28.1-12.9-35.9l-48-32c-.6-.4-1.2-.7-1.8-1.1V224H384V416H344V224H280V416H232V224H168V416H128V224zM256 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                            </path>
                                        </svg></i>
                                    <span class="font-medium text-[#18181b]">Fixed Expenses</span>
                                </div>
                                <span class="text-sm font-bold text-[#6366f1]">-$1,200</span>
                            </div>
                            <div class="flex items-center gap-4 justify-between">
                                <div class="flex items-center gap-4">
                                    <i class="text-[#f59e42]" data-fa-i2svg=""><svg class="svg-inline--fa fa-seedling"
                                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="seedling"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M512 32c0 113.6-84.6 207.5-194.2 222c-7.1-53.4-30.6-101.6-65.3-139.3C290.8 46.3 364 0 448 0h32c17.7 0 32 14.3 32 32zM0 96C0 78.3 14.3 64 32 64H64c123.7 0 224 100.3 224 224v32V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V320C100.3 320 0 219.7 0 96z">
                                            </path>
                                        </svg></i>
                                    <span class="font-medium text-[#18181b]">Investments</span>
                                </div>
                                <span class="text-sm font-bold text-[#f59e42]">+$400</span>
                            </div>
                        </div>
                    </div>
                    <!-- Daily Expenses -->
                    <div id="expenses-card" class="bg-[#f1f5f9] rounded-xl p-6 flex flex-col gap-4 shadow-sm">
                        <div class="flex items-center gap-2 mb-2">
                            <i class="text-[#6366f1]" data-fa-i2svg=""><svg class="svg-inline--fa fa-receipt"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="receipt"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M14 2.2C22.5-1.7 32.5-.3 39.6 5.8L80 40.4 120.4 5.8c9-7.7 22.3-7.7 31.2 0L192 40.4 232.4 5.8c9-7.7 22.3-7.7 31.2 0L304 40.4 344.4 5.8c7.1-6.1 17.1-7.5 25.6-3.6s14 12.4 14 21.8V488c0 9.4-5.5 17.9-14 21.8s-18.5 2.5-25.6-3.6L304 471.6l-40.4 34.6c-9 7.7-22.3 7.7-31.2 0L192 471.6l-40.4 34.6c-9 7.7-22.3 7.7-31.2 0L80 471.6 39.6 506.2c-7.1 6.1-17.1 7.5-25.6 3.6S0 497.4 0 488V24C0 14.6 5.5 6.1 14 2.2zM96 144c-8.8 0-16 7.2-16 16s7.2 16 16 16H288c8.8 0 16-7.2 16-16s-7.2-16-16-16H96zM80 352c0 8.8 7.2 16 16 16H288c8.8 0 16-7.2 16-16s-7.2-16-16-16H96c-8.8 0-16 7.2-16 16zM96 240c-8.8 0-16 7.2-16 16s7.2 16 16 16H288c8.8 0 16-7.2 16-16s-7.2-16-16-16H96z">
                                    </path>
                                </svg></i>
                            <span class="font-bold text-[#18181b] text-lg">Daily Expenses</span>
                        </div>
                        <div class="flex flex-col gap-3">
                            <div class="flex items-center gap-3 justify-between">
                                <div class="flex items-center gap-2">
                                    <i class="text-[#f59e42]" data-fa-i2svg=""><svg class="svg-inline--fa fa-utensils"
                                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="utensils"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z">
                                            </path>
                                        </svg></i>
                                    <span class="font-medium text-[#18181b]">Food</span>
                                </div>
                                <span class="text-sm font-bold text-[#f59e42]">-$18</span>
                            </div>
                            <div class="flex items-center gap-3 justify-between">
                                <div class="flex items-center gap-2">
                                    <i class="text-[#10b981]" data-fa-i2svg=""><svg class="svg-inline--fa fa-bus"
                                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bus"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M288 0C422.4 0 512 35.2 512 80V96l0 32c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32l0 160c0 17.7-14.3 32-32 32v32c0 17.7-14.3 32-32 32H416c-17.7 0-32-14.3-32-32V448H192v32c0 17.7-14.3 32-32 32H128c-17.7 0-32-14.3-32-32l0-32c-17.7 0-32-14.3-32-32l0-160c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h0V96h0V80C64 35.2 153.6 0 288 0zM128 160v96c0 17.7 14.3 32 32 32H272V128H160c-17.7 0-32 14.3-32 32zM304 288H416c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32H304V288zM144 400a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm288 0a32 32 0 1 0 0-64 32 32 0 1 0 0 64zM384 80c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16s7.2 16 16 16H368c8.8 0 16-7.2 16-16z">
                                            </path>
                                        </svg></i>
                                    <span class="font-medium text-[#18181b]">Transport</span>
                                </div>
                                <span class="text-sm font-bold text-[#10b981]">-$8</span>
                            </div>
                            <div class="flex items-center gap-3 justify-between">
                                <div class="flex items-center gap-2">
                                    <i class="text-[#6366f1]" data-fa-i2svg=""><svg class="svg-inline--fa fa-film"
                                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="film"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM48 368v32c0 8.8 7.2 16 16 16H96c8.8 0 16-7.2 16-16V368c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16zm368-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V368c0-8.8-7.2-16-16-16H416zM48 240v32c0 8.8 7.2 16 16 16H96c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16zm368-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H416zM48 112v32c0 8.8 7.2 16 16 16H96c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16zM416 96c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H416zM160 128v64c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32V128c0-17.7-14.3-32-32-32H192c-17.7 0-32 14.3-32 32zm32 160c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32V320c0-17.7-14.3-32-32-32H192z">
                                            </path>
                                        </svg></i>
                                    <span class="font-medium text-[#18181b]">Entertainment</span>
                                </div>
                                <span class="text-sm font-bold text-[#6366f1]">-$10</span>
                            </div>
                        </div>
                    </div>
                    <!-- Financial Goals -->
                    <div id="financial-goals-card" class="bg-[#f1f5f9] rounded-xl p-6 flex flex-col gap-4 shadow-sm">
                        <div class="flex items-center gap-2 mb-2">
                            <i class="text-[#f59e42]" data-fa-i2svg=""><svg class="svg-inline--fa fa-bullseye"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bullseye"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M448 256A192 192 0 1 0 64 256a192 192 0 1 0 384 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 80a80 80 0 1 0 0-160 80 80 0 1 0 0 160zm0-224a144 144 0 1 1 0 288 144 144 0 1 1 0-288zM224 256a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z">
                                    </path>
                                </svg></i>
                            <span class="font-bold text-[#18181b] text-lg">Financial Goals</span>
                        </div>
                        <div class="flex items-center gap-6">
                            <div class="flex-1">
                                <span class="block mb-1 text-sm text-[#6366f1] font-semibold">Save $500/month</span>
                                <div class="w-full h-3 bg-[#fde68a] rounded-lg overflow-hidden">
                                    <div class="h-3 bg-[#f59e42] rounded-lg w-[60%] transition-all"></div>
                                </div>
                                <span class="text-xs text-[#f59e42] font-medium mt-1 inline-block">Current: $300</span>
                            </div>
                            <button
                                class="bg-[#6366f1] text-white px-4 py-2 rounded-lg font-bold shadow hover:bg-[#4f46e5] transition"><i
                                    data-fa-i2svg=""><svg class="svg-inline--fa fa-arrow-up-right-dots"
                                        aria-hidden="true" focusable="false" data-prefix="fas"
                                        data-icon="arrow-up-right-dots" role="img" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M160 0c-17.7 0-32 14.3-32 32s14.3 32 32 32h50.7L9.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L256 109.3V160c0 17.7 14.3 32 32 32s32-14.3 32-32V32c0-17.7-14.3-32-32-32H160zM576 80a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM448 208a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM400 384a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm48 80a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm128 0a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM272 384a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm48 80a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM144 512a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM576 336a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm-48-80a48 48 0 1 0 0-96 48 48 0 1 0 0 96z">
                                        </path>
                                    </svg></i></button>
                        </div>
                    </div>
                </div>
                <!-- Reports, Insights, and Tips -->
                <div id="finance-stats-tips-block" class="flex flex-col gap-6 w-full lg:w-[370px]">
                    <!-- Savings vs. Spending Reports -->
                    <div id="report-card" class="bg-[#f1f5f9] rounded-xl p-6 shadow-sm">
                        <div class="flex items-center gap-2 mb-3">
                            <i class="text-[#6366f1]" data-fa-i2svg=""><svg class="svg-inline--fa fa-chart-column"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chart-column"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M32 32c17.7 0 32 14.3 32 32V400c0 8.8 7.2 16 16 16H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H80c-44.2 0-80-35.8-80-80V64C0 46.3 14.3 32 32 32zM160 224c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32s-32-14.3-32-32V256c0-17.7 14.3-32 32-32zm128-64V320c0 17.7-14.3 32-32 32s-32-14.3-32-32V160c0-17.7 14.3-32 32-32s32 14.3 32 32zm64 32c17.7 0 32 14.3 32 32v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V224c0-17.7 14.3-32 32-32zM480 96V320c0 17.7-14.3 32-32 32s-32-14.3-32-32V96c0-17.7 14.3-32 32-32s32 14.3 32 32z">
                                    </path>
                                </svg></i>
                            <span class="font-bold text-[#18181b] text-lg">Weekly Report</span>
                        </div>
                        <div class="flex flex-col gap-1 mb-4">
                            <span class="text-sm text-[#18181b]">Savings: <span
                                    class="text-[#10b981] font-bold">$1,100</span></span>
                            <span class="text-sm text-[#18181b]">Spending: <span
                                    class="text-[#f59e42] font-bold">$600</span></span>
                        </div>
                        <div class="flex gap-2">
                            <button
                                class="bg-[#6366f1] text-white px-4 py-2 rounded-lg font-semibold text-xs shadow hover:bg-[#4f46e5] transition"><i
                                    data-fa-i2svg=""><svg class="svg-inline--fa fa-file-arrow-down" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="file-arrow-down" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM216 232V334.1l31-31c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-72 72c-9.4 9.4-24.6 9.4-33.9 0l-72-72c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l31 31V232c0-13.3 10.7-24 24-24s24 10.7 24 24z">
                                        </path>
                                    </svg></i> PDF</button>
                            <button
                                class="bg-[#6366f1]/20 text-[#6366f1] px-4 py-2 rounded-lg font-semibold text-xs shadow hover:bg-[#6366f1]/40 transition"><i
                                    data-fa-i2svg=""><svg class="svg-inline--fa fa-file-excel" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="file-excel" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM155.7 250.2L192 302.1l36.3-51.9c7.6-10.9 22.6-13.5 33.4-5.9s13.5 22.6 5.9 33.4L221.3 344l46.4 66.2c7.6 10.9 5 25.8-5.9 33.4s-25.8 5-33.4-5.9L192 385.8l-36.3 51.9c-7.6 10.9-22.6 13.5-33.4 5.9s-13.5-22.6-5.9-33.4L162.7 344l-46.4-66.2c-7.6-10.9-5-25.8 5.9-33.4s25.8-5 33.4 5.9z">
                                        </path>
                                    </svg></i> Excel</button>
                        </div>
                    </div>
                    <!-- Alerts for bills & recurring expenses -->
                    <div id="alerts-card" class="bg-[#f1f5f9] rounded-xl p-6 shadow-sm flex flex-col gap-3">
                        <div class="flex items-center gap-2 mb-2">
                            <i class="text-[#f43f5e]" data-fa-i2svg=""><svg class="svg-inline--fa fa-bell-exclamation"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bell-exclamation"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <g class="missing">
                                        <path fill="currentColor"
                                            d="M156.5,447.7l-12.6,29.5c-18.7-9.5-35.9-21.2-51.5-34.9l22.7-22.7C127.6,430.5,141.5,440,156.5,447.7z M40.6,272H8.5 c1.4,21.2,5.4,41.7,11.7,61.1L50,321.2C45.1,305.5,41.8,289,40.6,272z M40.6,240c1.4-18.8,5.2-37,11.1-54.1l-29.5-12.6 C14.7,194.3,10,216.7,8.5,240H40.6z M64.3,156.5c7.8-14.9,17.2-28.8,28.1-41.5L69.7,92.3c-13.7,15.6-25.5,32.8-34.9,51.5 L64.3,156.5z M397,419.6c-13.9,12-29.4,22.3-46.1,30.4l11.9,29.8c20.7-9.9,39.8-22.6,56.9-37.6L397,419.6z M115,92.4 c13.9-12,29.4-22.3,46.1-30.4l-11.9-29.8c-20.7,9.9-39.8,22.6-56.8,37.6L115,92.4z M447.7,355.5c-7.8,14.9-17.2,28.8-28.1,41.5 l22.7,22.7c13.7-15.6,25.5-32.9,34.9-51.5L447.7,355.5z M471.4,272c-1.4,18.8-5.2,37-11.1,54.1l29.5,12.6 c7.5-21.1,12.2-43.5,13.6-66.8H471.4z M321.2,462c-15.7,5-32.2,8.2-49.2,9.4v32.1c21.2-1.4,41.7-5.4,61.1-11.7L321.2,462z M240,471.4c-18.8-1.4-37-5.2-54.1-11.1l-12.6,29.5c21.1,7.5,43.5,12.2,66.8,13.6V471.4z M462,190.8c5,15.7,8.2,32.2,9.4,49.2h32.1 c-1.4-21.2-5.4-41.7-11.7-61.1L462,190.8z M92.4,397c-12-13.9-22.3-29.4-30.4-46.1l-29.8,11.9c9.9,20.7,22.6,39.8,37.6,56.9 L92.4,397z M272,40.6c18.8,1.4,36.9,5.2,54.1,11.1l12.6-29.5C317.7,14.7,295.3,10,272,8.5V40.6z M190.8,50 c15.7-5,32.2-8.2,49.2-9.4V8.5c-21.2,1.4-41.7,5.4-61.1,11.7L190.8,50z M442.3,92.3L419.6,115c12,13.9,22.3,29.4,30.5,46.1 l29.8-11.9C470,128.5,457.3,109.4,442.3,92.3z M397,92.4l22.7-22.7c-15.6-13.7-32.8-25.5-51.5-34.9l-12.6,29.5 C370.4,72.1,384.4,81.5,397,92.4z">
                                        </path>
                                        <circle fill="currentColor" cx="256" cy="364" r="28">
                                            <animate attributeType="XML" repeatCount="indefinite" dur="2s"
                                                attributeName="r" values="28;14;28;28;14;28;"></animate>
                                            <animate attributeType="XML" repeatCount="indefinite" dur="2s"
                                                attributeName="opacity" values="1;0;1;1;0;1;"></animate>
                                        </circle>
                                        <path fill="currentColor" opacity="1"
                                            d="M263.7,312h-16c-6.6,0-12-5.4-12-12c0-71,77.4-63.9,77.4-107.8c0-20-17.8-40.2-57.4-40.2c-29.1,0-44.3,9.6-59.2,28.7 c-3.9,5-11.1,6-16.2,2.4l-13.1-9.2c-5.6-3.9-6.9-11.8-2.6-17.2c21.2-27.2,46.4-44.7,91.2-44.7c52.3,0,97.4,29.8,97.4,80.2 c0,67.6-77.4,63.5-77.4,107.8C275.7,306.6,270.3,312,263.7,312z">
                                            <animate attributeType="XML" repeatCount="indefinite" dur="2s"
                                                attributeName="opacity" values="1;0;0;0;0;1;"></animate>
                                        </path>
                                        <path fill="currentColor" opacity="0"
                                            d="M232.5,134.5l7,168c0.3,6.4,5.6,11.5,12,11.5h9c6.4,0,11.7-5.1,12-11.5l7-168c0.3-6.8-5.2-12.5-12-12.5h-23 C237.7,122,232.2,127.7,232.5,134.5z">
                                            <animate attributeType="XML" repeatCount="indefinite" dur="2s"
                                                attributeName="opacity" values="0;0;1;1;0;0;"></animate>
                                        </path>
                                    </g>
                                </svg></i>
                            <span class="font-bold text-[#18181b] text-lg">Alerts</span>
                        </div>
                        <div class="text-sm text-[#f43f5e] flex items-center gap-2">
                            <i data-fa-i2svg=""><svg class="svg-inline--fa fa-triangle-exclamation" aria-hidden="true"
                                    focusable="false" data-prefix="fas" data-icon="triangle-exclamation" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z">
                                    </path>
                                </svg></i> Due bill: Internet $35 - <span class="font-bold">Tomorrow</span>
                        </div>
                        <div class="text-sm text-[#f59e42] flex items-center gap-2">
                            <i data-fa-i2svg=""><svg class="svg-inline--fa fa-arrow-rotate-left" aria-hidden="true"
                                    focusable="false" data-prefix="fas" data-icon="arrow-rotate-left" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M125.7 160H176c17.7 0 32 14.3 32 32s-14.3 32-32 32H48c-17.7 0-32-14.3-32-32V64c0-17.7 14.3-32 32-32s32 14.3 32 32v51.2L97.6 97.6c87.5-87.5 229.3-87.5 316.8 0s87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3s-163.8-62.5-226.3 0L125.7 160z">
                                    </path>
                                </svg></i> Recurring: Spotify $10 - <span class="font-bold">3 days left</span>
                        </div>
                    </div>
                    <!-- AI Savings Tips -->
                    <div id="ai-tips-card" class="bg-[#e0f2fe] rounded-xl p-6 shadow-sm flex flex-col gap-3">
                        <div class="flex items-center gap-2 mb-2">
                            <i class="text-[#0ea5e9]" data-fa-i2svg=""><svg class="svg-inline--fa fa-robot"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="robot" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M320 0c17.7 0 32 14.3 32 32V96H472c39.8 0 72 32.2 72 72V440c0 39.8-32.2 72-72 72H168c-39.8 0-72-32.2-72-72V168c0-39.8 32.2-72 72-72H288V32c0-17.7 14.3-32 32-32zM208 384c-8.8 0-16 7.2-16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s-7.2-16-16-16H208zm96 0c-8.8 0-16 7.2-16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s-7.2-16-16-16H304zm96 0c-8.8 0-16 7.2-16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s-7.2-16-16-16H400zM264 256a40 40 0 1 0 -80 0 40 40 0 1 0 80 0zm152 40a40 40 0 1 0 0-80 40 40 0 1 0 0 80zM48 224H64V416H48c-26.5 0-48-21.5-48-48V272c0-26.5 21.5-48 48-48zm544 0c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H576V224h16z">
                                    </path>
                                </svg></i>
                            <span class="font-bold text-[#0ea5e9] text-lg">Smart Finance Tips</span>
                        </div>
                        <span class="text-sm text-[#18181b]">Try reducing entertainment spending by 15% this month!
                            Consider meal prepping for extra savings.</span>
                    </div>
                </div>
            </div>
            <div id="financial-categories-section"
                class="bg-white rounded-2xl shadow-sm p-7 mb-10 card-hover anim anim-scale fade">
                <div class="flex items-center gap-2 mb-6">
                    <i class="text-xl text-blue-600" data-fa-i2svg=""><svg class="svg-inline--fa fa-layer-group"
                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="layer-group" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M264.5 5.2c14.9-6.9 32.1-6.9 47 0l218.6 101c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 149.8C37.4 145.8 32 137.3 32 128s5.4-17.9 13.9-21.8L264.5 5.2zM476.9 209.6l53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 277.8C37.4 273.8 32 265.3 32 256s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0l152-70.2zm-152 198.2l152-70.2 53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 405.8C37.4 401.8 32 393.3 32 384s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0z">
                            </path>
                        </svg></i>
                    <h2 class="font-semibold text-xl">Financial Categories</h2>
                </div>
                <div class="flex flex-wrap gap-6">
                    <div class="flex items-center gap-2 px-5 py-3 bg-blue-50 rounded-lg text-blue-800 font-medium">
                        <i data-fa-i2svg=""><svg class="svg-inline--fa fa-bolt" aria-hidden="true" focusable="false"
                                data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288H175.5L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7H272.5L349.4 44.6z">
                                </path>
                            </svg></i> Utilities
                    </div>
                    <div
                        class="flex items-center gap-2 px-5 py-3 bg-emerald-50 rounded-lg text-emerald-800 font-medium">
                        <i data-fa-i2svg=""><svg class="svg-inline--fa fa-basket-shopping" aria-hidden="true"
                                focusable="false" data-prefix="fas" data-icon="basket-shopping" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M253.3 35.1c6.1-11.8 1.5-26.3-10.2-32.4s-26.3-1.5-32.4 10.2L117.6 192H32c-17.7 0-32 14.3-32 32s14.3 32 32 32L83.9 463.5C91 492 116.6 512 146 512H430c29.4 0 55-20 62.1-48.5L544 256c17.7 0 32-14.3 32-32s-14.3-32-32-32H458.4L365.3 12.9C359.2 1.2 344.7-3.4 332.9 2.7s-16.3 20.6-10.2 32.4L404.3 192H171.7L253.3 35.1zM192 304v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V304c0-8.8 7.2-16 16-16s16 7.2 16 16zm96-16c8.8 0 16 7.2 16 16v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V304c0-8.8 7.2-16 16-16zm128 16v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V304c0-8.8 7.2-16 16-16s16 7.2 16 16z">
                                </path>
                            </svg></i> Groceries
                    </div>
                    <div
                        class="flex items-center gap-2 px-5 py-3 bg-neutral-100 rounded-lg text-neutral-800 font-medium">
                        <i data-fa-i2svg=""><svg class="svg-inline--fa fa-house" aria-hidden="true" focusable="false"
                                data-prefix="fas" data-icon="house" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z">
                                </path>
                            </svg></i> Rent/Mortgage
                    </div>
                    <div class="flex items-center gap-2 px-5 py-3 bg-amber-50 rounded-lg text-amber-800 font-medium">
                        <i data-fa-i2svg=""><svg class="svg-inline--fa fa-coins" aria-hidden="true" focusable="false"
                                data-prefix="fas" data-icon="coins" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M512 80c0 18-14.3 34.6-38.4 48c-29.1 16.1-72.5 27.5-122.3 30.9c-3.7-1.8-7.4-3.5-11.3-5C300.6 137.4 248.2 128 192 128c-8.3 0-16.4 .2-24.5 .6l-1.1-.6C142.3 114.6 128 98 128 80c0-44.2 86-80 192-80S512 35.8 512 80zM160.7 161.1c10.2-.7 20.7-1.1 31.3-1.1c62.2 0 117.4 12.3 152.5 31.4C369.3 204.9 384 221.7 384 240c0 4-.7 7.9-2.1 11.7c-4.6 13.2-17 25.3-35 35.5c0 0 0 0 0 0c-.1 .1-.3 .1-.4 .2l0 0 0 0c-.3 .2-.6 .3-.9 .5c-35 19.4-90.8 32-153.6 32c-59.6 0-112.9-11.3-148.2-29.1c-1.9-.9-3.7-1.9-5.5-2.9C14.3 274.6 0 258 0 240c0-34.8 53.4-64.5 128-75.4c10.5-1.5 21.4-2.7 32.7-3.5zM416 240c0-21.9-10.6-39.9-24.1-53.4c28.3-4.4 54.2-11.4 76.2-20.5c16.3-6.8 31.5-15.2 43.9-25.5V176c0 19.3-16.5 37.1-43.8 50.9c-14.6 7.4-32.4 13.7-52.4 18.5c.1-1.8 .2-3.5 .2-5.3zm-32 96c0 18-14.3 34.6-38.4 48c-1.8 1-3.6 1.9-5.5 2.9C304.9 404.7 251.6 416 192 416c-62.8 0-118.6-12.6-153.6-32C14.3 370.6 0 354 0 336V300.6c12.5 10.3 27.6 18.7 43.9 25.5C83.4 342.6 135.8 352 192 352s108.6-9.4 148.1-25.9c7.8-3.2 15.3-6.9 22.4-10.9c6.1-3.4 11.8-7.2 17.2-11.2c1.5-1.1 2.9-2.3 4.3-3.4V304v5.7V336zm32 0V304 278.1c19-4.2 36.5-9.5 52.1-16c16.3-6.8 31.5-15.2 43.9-25.5V272c0 10.5-5 21-14.9 30.9c-16.3 16.3-45 29.7-81.3 38.4c.1-1.7 .2-3.5 .2-5.3zM192 448c56.2 0 108.6-9.4 148.1-25.9c16.3-6.8 31.5-15.2 43.9-25.5V432c0 44.2-86 80-192 80S0 476.2 0 432V396.6c12.5 10.3 27.6 18.7 43.9 25.5C83.4 438.6 135.8 448 192 448z">
                                </path>
                            </svg></i> Salary
                    </div>
                    <div class="flex items-center gap-2 px-5 py-3 bg-purple-50 rounded-lg text-purple-800 font-medium">
                        <i data-fa-i2svg=""><svg class="svg-inline--fa fa-briefcase" aria-hidden="true"
                                focusable="false" data-prefix="fas" data-icon="briefcase" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z">
                                </path>
                            </svg></i> Freelance
                    </div>
                    <div class="flex items-center gap-2 px-5 py-3 bg-pink-50 rounded-lg text-pink-800 font-medium">
                        <i data-fa-i2svg=""><svg class="svg-inline--fa fa-heart-pulse" aria-hidden="true"
                                focusable="false" data-prefix="fas" data-icon="heart-pulse" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z">
                                </path>
                            </svg></i> Healthcare
                    </div>
                    <div class="flex items-center gap-2 px-5 py-3 bg-sky-50 rounded-lg text-sky-800 font-medium">
                        <i data-fa-i2svg=""><svg class="svg-inline--fa fa-film" aria-hidden="true" focusable="false"
                                data-prefix="fas" data-icon="film" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM48 368v32c0 8.8 7.2 16 16 16H96c8.8 0 16-7.2 16-16V368c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16zm368-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V368c0-8.8-7.2-16-16-16H416zM48 240v32c0 8.8 7.2 16 16 16H96c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16zm368-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H416zM48 112v32c0 8.8 7.2 16 16 16H96c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16zM416 96c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H416zM160 128v64c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32V128c0-17.7-14.3-32-32-32H192c-17.7 0-32 14.3-32 32zm32 160c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32V320c0-17.7-14.3-32-32-32H192z">
                                </path>
                            </svg></i> Entertainment
                    </div>
                    <div class="flex items-center gap-2 px-5 py-3 bg-green-50 rounded-lg text-green-800 font-medium">
                        <i data-fa-i2svg=""><svg class="svg-inline--fa fa-piggy-bank" aria-hidden="true"
                                focusable="false" data-prefix="fas" data-icon="piggy-bank" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M400 96l0 .7c-5.3-.4-10.6-.7-16-.7H256c-16.5 0-32.5 2.1-47.8 6c-.1-2-.2-4-.2-6c0-53 43-96 96-96s96 43 96 96zm-16 32c3.5 0 7 .1 10.4 .3c4.2 .3 8.4 .7 12.6 1.3C424.6 109.1 450.8 96 480 96h11.5c10.4 0 18 9.8 15.5 19.9l-13.8 55.2c15.8 14.8 28.7 32.8 37.5 52.9H544c17.7 0 32 14.3 32 32v96c0 17.7-14.3 32-32 32H512c-9.1 12.1-19.9 22.9-32 32v64c0 17.7-14.3 32-32 32H416c-17.7 0-32-14.3-32-32V448H256v32c0 17.7-14.3 32-32 32H192c-17.7 0-32-14.3-32-32V416c-34.9-26.2-58.7-66.3-63.2-112H68c-37.6 0-68-30.4-68-68s30.4-68 68-68h4c13.3 0 24 10.7 24 24s-10.7 24-24 24H68c-11 0-20 9-20 20s9 20 20 20H99.2c12.1-59.8 57.7-107.5 116.3-122.8c12.9-3.4 26.5-5.2 40.5-5.2H384zm64 136a24 24 0 1 0 -48 0 24 24 0 1 0 48 0z">
                                </path>
                            </svg></i> Savings
                    </div>
                    <div
                        class="flex items-center gap-2 px-5 py-3 bg-neutral-200 rounded-lg text-neutral-800 font-medium">
                        <i data-fa-i2svg=""><svg class="svg-inline--fa fa-ellipsis" aria-hidden="true" focusable="false"
                                data-prefix="fas" data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                </path>
                            </svg></i> Other
                    </div>
                </div>
            </div>
            <div id="accounts-table-card"
                class="col-span-2 bg-white rounded-2xl shadow-sm p-7 card-hover anim anim-scale fade">
                <div class="flex items-center gap-2 mb-6">
                    <i class="text-xl text-blue-600" data-fa-i2svg=""><svg class="svg-inline--fa fa-table-list"
                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="table-list" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm64 0v64h64V96H64zm384 0H192v64H448V96zM64 224v64h64V224H64zm384 0H192v64H448V224zM64 352v64h64V352H64zm384 0H192v64H448V352z">
                            </path>
                        </svg></i>
                    <h2 class="font-semibold text-xl">Accounts Status</h2>
                </div>
                <div class="overflow-x-auto min-w-full">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="text-neutral-600 border-b border-neutral-100">
                                <th class="py-2 px-3 text-left font-medium">Date</th>
                                <th class="py-2 px-3 text-left font-medium">Type</th>
                                <th class="py-2 px-3 text-left font-medium">Category</th>
                                <th class="py-2 px-3 text-right font-medium">Amount</th>
                                <th class="py-2 px-3 text-center font-medium">Status</th>
                                <th class="py-2 px-3 text-center font-medium">Recurrence</th>
                                <th class="py-2 px-3 text-center font-medium">Action</th>
                            </tr>
                        </thead>
                        <tbody id="accounts-table-body">
                            <tr class="border-b border-neutral-50 hover:bg-blue-50/30 transition">
                                <td class="py-2 px-3">2025-05-31</td>
                                <td class="py-2 px-3">
                                    <span
                                        class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-xs font-medium bg-red-50 text-red-700">
                                        <font-awesome-icon icon="arrow-trend-down" /> Expense
                                    </span>
                                </td>
                                <td class="py-2 px-3">Utilities</td>
                                <td class="py-2 px-3 text-right text-red-600 font-semibold">-$120.00</td>
                                <td class="py-2 px-3 text-center">
                                    <span
                                        class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-yellow-100 text-yellow-800 font-medium text-xs">
                                        <i data-fa-i2svg=""><svg class="svg-inline--fa fa-clock" aria-hidden="true"
                                                focusable="false" data-prefix="fas" data-icon="clock" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z">
                                                </path>
                                            </svg></i> Upcoming
                                    </span>
                                </td>
                                <td class="py-2 px-3 text-center">Monthly</td>
                                <td class="py-2 px-3 text-center">
                                    <button class="text-blue-600 hover:text-blue-800 anim" title="Mark as Paid">
                                        <i data-fa-i2svg=""><svg class="svg-inline--fa fa-circle-check"
                                                aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="circle-check" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z">
                                                </path>
                                            </svg></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-b border-neutral-50 hover:bg-blue-50/30 transition">
                                <td class="py-2 px-3">2025-05-28</td>
                                <td class="py-2 px-3">
                                    <span
                                        class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-xs font-medium bg-emerald-50 text-emerald-700">
                                        <i data-fa-i2svg=""><svg class="svg-inline--fa fa-arrow-trend-up"
                                                aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="arrow-trend-up" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M384 160c-17.7 0-32-14.3-32-32s14.3-32 32-32H544c17.7 0 32 14.3 32 32V288c0 17.7-14.3 32-32 32s-32-14.3-32-32V205.3L342.6 374.6c-12.5 12.5-32.8 12.5-45.3 0L192 269.3 54.6 406.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160c12.5-12.5 32.8-12.5 45.3 0L320 306.7 466.7 160H384z">
                                                </path>
                                            </svg></i> Income
                                    </span>
                                </td>
                                <td class="py-2 px-3">Salary</td>
                                <td class="py-2 px-3 text-right text-emerald-600 font-semibold">+$2,800.00</td>
                                <td class="py-2 px-3 text-center">
                                    <span
                                        class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-emerald-100 text-emerald-800 font-medium text-xs">
                                        <i data-fa-i2svg=""><svg class="svg-inline--fa fa-circle-check"
                                                aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="circle-check" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z">
                                                </path>
                                            </svg></i> Paid
                                    </span>
                                </td>
                                <td class="py-2 px-3 text-center">Monthly</td>
                                <td class="py-2 px-3 text-center">
                                    <button class="text-neutral-400 hover:text-red-500 anim" title="Remove">
                                        <i data-fa-i2svg=""><svg class="svg-inline--fa fa-trash" aria-hidden="true"
                                                focusable="false" data-prefix="fas" data-icon="trash" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                                </path>
                                            </svg></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-b border-neutral-50 hover:bg-blue-50/30 transition">
                                <td class="py-2 px-3">2025-05-21</td>
                                <td class="py-2 px-3">
                                    <span
                                        class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-xs font-medium bg-red-50 text-red-700">
                                        <i data-fa-i2svg=""><svg class="svg-inline--fa fa-arrow-trend-down"
                                                aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="arrow-trend-down" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M384 352c-17.7 0-32 14.3-32 32s14.3 32 32 32H544c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32s-32 14.3-32 32v82.7L342.6 137.4c-12.5-12.5-32.8-12.5-45.3 0L192 242.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0L320 205.3 466.7 352H384z">
                                                </path>
                                            </svg></i> Expense
                                    </span>
                                </td>
                                <td class="py-2 px-3">Groceries</td>
                                <td class="py-2 px-3 text-right text-red-600 font-semibold">-$220.50</td>
                                <td class="py-2 px-3 text-center">
                                    <span
                                        class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-neutral-100 text-neutral-700 font-medium text-xs">
                                        <i data-fa-i2svg=""><svg class="svg-inline--fa fa-clock" aria-hidden="true"
                                                focusable="false" data-prefix="fas" data-icon="clock" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z">
                                                </path>
                                            </svg></i> Pending
                                    </span>
                                </td>
                                <td class="py-2 px-3 text-center">None</td>
                                <td class="py-2 px-3 text-center">
                                    <button class="text-blue-600 hover:text-blue-800 anim" title="Mark as Paid">
                                        <i data-fa-i2svg=""><svg class="svg-inline--fa fa-circle-check"
                                                aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="circle-check" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z">
                                                </path>
                                            </svg></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-b border-neutral-50 hover:bg-blue-50/30 transition">
                                <td class="py-2 px-3">2025-05-10</td>
                                <td class="py-2 px-3">
                                    <span
                                        class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-xs font-medium bg-emerald-50 text-emerald-700">
                                        <i data-fa-i2svg=""><svg class="svg-inline--fa fa-arrow-trend-up"
                                                aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="arrow-trend-up" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M384 160c-17.7 0-32-14.3-32-32s14.3-32 32-32H544c17.7 0 32 14.3 32 32V288c0 17.7-14.3 32-32 32s-32-14.3-32-32V205.3L342.6 374.6c-12.5 12.5-32.8 12.5-45.3 0L192 269.3 54.6 406.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160c12.5-12.5 32.8-12.5 45.3 0L320 306.7 466.7 160H384z">
                                                </path>
                                            </svg></i> Income
                                    </span>
                                </td>
                                <td class="py-2 px-3">Freelance</td>
                                <td class="py-2 px-3 text-right text-emerald-600 font-semibold">+$450.00</td>
                                <td class="py-2 px-3 text-center">
                                    <span
                                        class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-emerald-100 text-emerald-800 font-medium text-xs">
                                        <i data-fa-i2svg=""><svg class="svg-inline--fa fa-circle-check"
                                                aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="circle-check" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z">
                                                </path>
                                            </svg></i> Paid
                                    </span>
                                </td>
                                <td class="py-2 px-3 text-center">None</td>
                                <td class="py-2 px-3 text-center">
                                    <button class="text-neutral-400 hover:text-red-500 anim" title="Remove">
                                        <i data-fa-i2svg=""><svg class="svg-inline--fa fa-trash" aria-hidden="true"
                                                focusable="false" data-prefix="fas" data-icon="trash" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                                </path>
                                            </svg></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </AppLayout>
</template>