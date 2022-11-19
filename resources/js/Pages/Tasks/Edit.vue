<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    owners: Array,
    task: Object
})
// console.log(props);
const form = useForm({
    owners: props.task.owners,
    title: props?.task?.title,
    image: props?.task?.image
})
console.log(form.owners);

const submit = () => {
    Inertia.post(`/tasks/${props.task.id}`, {
        _method: "patch",
        owners: form.owners,
        title: form.title,
        image: form.image
    })
}

function addOwner() {
    var selectedValue = owner_id.options[owner_id.selectedIndex].value;
    console.log(selectedValue)
    form.owners.push(JSON.parse(selectedValue));
}

function delOwner(owner_id) {
    form.owners = form.owners.filter((owner) => owner.id != owner_id)
}

</script>

<template>

    <Head title="Owner" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Task
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="title" value="Title" />
                        <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" required
                            autofocus autocomplete="title" />
                        <InputError class="mt-2" :message="$page.props.errors.title" />
                    </div>

                    <div>
                        <InputLabel for="image" value="Image" />
                        <TextInput id="image" type="file" class="mt-1 block w-full"
                            @input="form.image = $event.target.files[0]" />
                        <InputError class="mt-2" :message="$page.props.errors.image" />
                    </div>


                    <div>
                        <InputLabel for="name" value="Owner" />
                        <select name="owner_id" id="owner_id"
                            class="mt-1 block w-full pl-3 pr-10 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                            @click="addOwner()">
                            <option v-for="item in owners" :key="item.id" :value="JSON.stringify(item)">{{ item.name }}
                            </option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.owner_id" />
                        <ul>
                            <div class="overflow-x-auto mt-3 relative shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="py-3 px-6">
                                                Owner
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                                            v-for="owner in form.owners">

                                            <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                                {{ owner.name }}
                                            </td>
                                            <td class="py-4 px-6">
                                                <button type="button"
                                                    class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center mt-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900"
                                                    @click="delOwner(owner.id)">Delete</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <!-- <li v-for="owner in form.owners">
                                {{ owner.name }}
                                <button type="button"
                                    class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center mt-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900"
                                    @click="delOwner(owner.id)">Delete</button>
                            </li> -->
                        </ul>

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