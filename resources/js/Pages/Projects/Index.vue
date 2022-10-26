<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';


defineProps({
    projects: Object
})
</script>

<template>

    <Head title="Projects" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Project
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link :href="route('projects.create')"
                        class="px-4 py-2 bg-indigo hover:bg-indigo text-black rounded-md">New Project</Link>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="overflow-x-auto relative">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            Id
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Name
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Skill
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Image
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="project in projects.data" :key="project.id"
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ project.id }}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{ project.name }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ project.skill.name }}
                                        </td>
                                        <td class="py-4 px-6">
                                            <img :src="project.image" alt="project.image">
                                        </td>
                                        <td class="py-4 px-6">
                                            <Link :href="route('projects.edit', project.id)"
                                                class="font-medium text-blue-500 hover:text-blue-700 mr-2">Edit</Link>
                                            <Link :href="route('projects.destroy', project.id)" method="delete"
                                                class="font-medium text-red-500 hover:text-red-700 mr-2">Delete</Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
