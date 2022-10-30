<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    skills: Array,
    projects: Array,
    owner: Object
})

const form = useForm({
    name: props.owner?.name,
    skill_id: props.owner?.skill_id,
    project_id: props.owner?.project_id
})

const submit = () => {
    Inertia.post(`/owners/${props.owner.id}`, {
        _method: "patch",
        name: form.name,
        skill_id: form.skill_id,
        project_id: form.project_id
    })
}
</script>

<template>

    <Head title="Edit Projects" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Project
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="name" value="Name" />
                        <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required
                            autofocus autocomplete="username" />
                        <InputError class="mt-2" :message="$page.props.errors.name" />
                    </div>
                    <div>
                        <InputLabel for="skill_id" value="Skill" />
                        <select v-model="form.skill_id" name="skill_id" id="skill_id"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-5 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option v-for="skill in skills" :key="skill.id" :value="skill.id">{{ skill.name }}</option>
                        </select>
                    </div>
                    <div>
                        <InputLabel for="project_id" value="Project" />
                        <select v-model="form.project_id" name="project_id" id="project_id"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-5 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option v-for="project in projects" :key="project.id" :value="project.id">{{ project.name }}
                            </option>
                        </select>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">
                            Update
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>