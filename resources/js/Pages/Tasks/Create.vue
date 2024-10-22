<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps(['users', 'clients', 'projects']);

const form = useForm({
    title: '',
    description: '',
    deadline_at: '',
    user_id: '',
    client_id: '',
    project_id: '',
    status: '',
});

const submit = () => {
    form.post(route('tasks.store'));
};
</script>

<template>

    <Head title="Create Task" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Create Task
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                    <form @submit.prevent="submit">

                        <div>
                            <InputLabel for="title" value="Name" />

                            <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" required
                                autofocus autocomplete="text" />

                            <InputError class="mt-2" :message="form.errors.title" />
                        </div>

                        <div>
                            <InputLabel for="description" value="Description" />

                            <TextArea id="description" type="text" class="mt-1 block w-full" v-model="form.description"
                                required autocomplete="text" />

                            <InputError class="mt-2" :message="form.errors.description" />
                        </div>

                        <div>
                            <InputLabel for="deadline_at" value="Deadline" />

                            <TextInput id="deadline_at" type="date" class="mt-1 block w-full" v-model="form.deadline_at"
                                autofocus autocomplete="date" />

                            <InputError class="mt-2" :message="form.errors.deadline_at" />
                        </div>

                        <div>
                            <InputLabel for="user_id" value="Assigned User" />

                            <select name="user_id" id="user_id"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                v-model="form.user_id" required autofocus>
                                <!-- selected attribute is not working for now ==> to fix -->
                                <option v-for="user in props.users" :value="user.id"
                                    :selected="user.id === $page.props.auth.user.id">
                                    {{
                                        user.first_name + " " + user.last_name }}</option>

                            </select>

                            <InputError class="mt-2" :message="form.errors.user_id" />
                        </div>

                        <div>
                            <InputLabel for="client_id" value="Assigned Client" />

                            <select name="client_id" id="client_id"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                v-model="form.client_id" required autofocus>
                                <!-- to do: add selected attribute  -->
                                <option v-for="client in props.clients" :value="client.id">
                                    {{ client.company_name }}
                                </option>
                            </select>

                            <InputError class="mt-2" :message="form.errors.client_id" />
                        </div>

                        <div>
                            <InputLabel for="project_id" value="Assigned Project" />

                            <select name="project_id" id="project_id"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                v-model="form.project_id" required autofocus>
                                <!-- to do: add selected attribute  -->
                                <option v-for="project in props.projects" :value="project.id">
                                    {{ project.title }}
                                </option>
                            </select>

                            <InputError class="mt-2" :message="form.errors.project_id" />
                        </div>

                        <div>
                            <InputLabel for="status" value="Status" />

                            <select name="status" id="status"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                v-model="form.status" required autofocus>
                                <option value="open">
                                    Open
                                </option>
                                <option value="in progress">
                                    In progress
                                </option>
                                <option value="blocked">
                                    Blocked
                                </option>
                                <option value="pending">
                                    Pending
                                </option>
                                <option value="waiting client">
                                    Waiting Client
                                </option>
                                <option value="closed">
                                    Closed
                                </option>
                            </select>

                            <InputError class="mt-2" :message="form.errors.status" />
                        </div>

                        <div class="mt-4 flex items-center justify-start">
                            <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">
                                Save
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>