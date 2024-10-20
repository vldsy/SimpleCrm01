<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    description: '',
    deadline_at: '',
    company_name: '',
    company_address: '',
    company_city: '',
    company_zip: '',
    company_vat: '',
});

const submit = () => {
    form.post(route('projects.store'));
};
</script>

<template>

    <Head title="Create Project" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Create Project
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
                            <InputLabel for="company_name" value="Company Name" />

                            <TextInput id="company_name" type="text" class="mt-1 block w-full"
                                v-model="form.company_name" required autofocus autocomplete="name" />

                            <InputError class="mt-2" :message="form.errors.company_name" />
                        </div>

                        <div>
                            <InputLabel for="company_address" value="Company Address" />

                            <TextInput id="company_address" type="text" class="mt-1 block w-full"
                                v-model="form.company_address" autofocus autocomplete="address" />

                            <InputError class="mt-2" :message="form.errors.company_address" />
                        </div>

                        <div>
                            <InputLabel for="company_city" value="Company City" />

                            <TextInput id="company_city" type="text" class="mt-1 block w-full"
                                v-model="form.company_city" autofocus autocomplete="name" />

                            <InputError class="mt-2" :message="form.errors.company_city" />
                        </div>

                        <div>
                            <InputLabel for="company_zip" value="Company Zip" />

                            <TextInput id="company_zip" type="text" class="mt-1 block w-full" v-model="form.company_zip"
                                autofocus autocomplete="name" />

                            <InputError class="mt-2" :message="form.errors.company_zip" />
                        </div>

                        <div>
                            <InputLabel for="company_vat" value="Company Name" />

                            <TextInput id="company_vat" type="text" class="mt-1 block w-full" v-model="form.company_vat"
                                autofocus autocomplete="name" />

                            <InputError class="mt-2" :message="form.errors.company_vat" />
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