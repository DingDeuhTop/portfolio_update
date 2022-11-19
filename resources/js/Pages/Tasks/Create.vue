<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const prop = defineProps({
    owners: Array,
    tasks: Array,
})

const form = useForm({
    owner_id: '',
    task_id: ''
})
console.log(form)

const submit = () => {
    form.post(route('tasks.store'))
}
// console.log(prop)
</script>

<template>

    <Head title="Owner" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Owners
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form @submit.prevent="submit">

                    <div>
                        <InputLabel for="name" value="Owner" />
                        <select v-model="form.owner_id" name="owner_id" id="owner_id"
                            class="mt-1 block w-full pl-3 pr-10 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option v-for="item in owners" :key="item.id" :value="item.id">{{ item.name }}
                            </option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.owner_id" />
                    </div>

                    <!-- <div>
                        <InputLabel for="title" value="Task" />
                        <TextInput id="task_id" type="text" class="mt-1 block w-full" v-model="form.task_id" required
                            autofocus autocomplete="username" />
                        <InputError class="mt-2" :message="form.errors.task_id" />
                    </div> -->

                    <div>
                        <InputLabel for="title" value="Task" />
                        <select v-model="form.task_id" name="task_id" id="task_id"
                            class="mt-1 block w-full pl-3 pr-10 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option v-for="item in tasks" :key="item.id" :value="item.id">{{ item.title }}
                            </option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.task_id" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">
                            Store
                        </PrimaryButton>
                    </div>

                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>