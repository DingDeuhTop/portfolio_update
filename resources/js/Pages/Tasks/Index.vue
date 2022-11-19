<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

const prop = defineProps({
    owners: Object,
})
// console.log(prop)

const showModal = ref(false)
function toggleModal() {
    this.showModal = !this.showModal
    // console.log('as', showModal)
}

function delModal(index) {
    this.showModal = !this.showModal
    console.log('delete task', index)
}
</script>

<template>

    <Head title="Owners" />

    <AuthenticatedLayout>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Owner
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link :href="route('tasks.create')"
                        class="px-4 py-2 bg-indigo hover:bg-indigo text-black rounded-md">New Owners</Link>
                </div>
                <div class="overflow-x-auto relative">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Id
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Owner
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Task
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in owners" :key="item"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ item.id }}
                                </th>
                                <td class="py-4 px-6">
                                    {{ item?.name }}
                                </td>
                                <td class="py-4 px-6">
                                    <ul v-for="item in item.tasks" :key="item">
                                        <li>
                                            {{ item?.title }}
                                        </li>
                                    </ul>
                                </td>
                                <td class="py-4 px-6">
                                    <ul class="grid grid-cols-2" v-for="(task, index) in item.tasks">
                                        <li>
                                            <Link :href="route('tasks.edit', task.id)"
                                                class="font-medium text-blue-500 hover:text-blue-700 mr-2">Edit</Link>
                                        </li>

                                        <li>
                                            <!-- {{route('tasks.destroy', {'task': task.id, 'owner_id': item.id})}} -->
                                            <Link
                                                :href="route('tasks.destroy', { 'task': task.id, 'owner_id': item.id })"
                                                method="delete"
                                                class="font-medium text-red-500 hover:text-red-700 mr-2">Delete</Link>
                                        </li>
                                        <!-- <button
                                            class="bg-transparent text-red-600 active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded  hover:shadow-lg hover:bg-gray-900 hover:text-red-500 outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                            type="button" @click="toggleModal(index)">
                                            Delete
                                        </button> -->
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <!-- <button
                        class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button" @click="toggleModal()">
                        click to open
                    </button> -->
                    <div v-if="showModal"
                        class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
                        <div class="relative w-auto my-6 mx-auto max-w-6xl">
                            <!--content-->
                            <div
                                class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none" >

                                <!--body-->
                                <div class="relative p-6 flex-auto">
                                    <p class="my-4 text-slate-500 text-lg leading-relaxed">
                                        Do you want to delete this task
                                    </p>
                                </div>
                                <!--footer-->
                                <div
                                    class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                                    <button
                                        class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none hover:bg-red-200 rounded focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        type="button" @click="delModal(index)">
                                        Yes
                                    </button>
                                    <button
                                        class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none hover:bg-red-200 rounded focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        type="button" @click="toggleModal()">
                                        No
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div v-if="showModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div> -->
                </div>


                <!-- {{owners}} -->
                <!-- <ul>
                <li v-for="item in owners" :key="item">
                    <p style="font-weight: bold;">
                        {{ item.id }}
                        {{ item.name }}
                    </p>
                <li v-for="task in item.tasks" :key="task">
                    {{ task.title }}
                    {{ task.image }}
                </li>
                </li>
            </ul> -->
            </div>
        </div>



    </AuthenticatedLayout>
</template>