<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    contact_name: '',
    contact_email: '',
    contact_phone_number: '',
    company_name: '',
    company_address: '',
    company_city: '',
    company_zip: '',
    company_vat: '',
});

const submit = () => {
    form.post(route('clients.store'));
};
</script>

<template>

    <Head title="Create Client" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Create Client
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                    <form @submit.prevent="submit">

                        <h2 class="text-xl font-semibold leading-tight text-gray-800">
                            Contact information
                        </h2>
                        <div>
                            <InputLabel for="contact_name" value="Name" />

                            <TextInput id="contact_name" type="text" class="mt-1 block w-full"
                                v-model="form.contact_name" required autofocus autocomplete="name" />

                            <InputError class="mt-2" :message="form.errors.contact_name" />
                        </div>

                        <div>
                            <InputLabel for="contact_email" value="Email" />

                            <TextInput id="contact_email" type="email" class="mt-1 block w-full"
                                v-model="form.contact_email" required autocomplete="email" />

                            <InputError class="mt-2" :message="form.errors.contact_email" />
                        </div>

                        <div>
                            <InputLabel for="contact_phone_number" value="Phone Number" />

                            <TextInput id="contact_phone_number" type="text" class="mt-1 block w-full"
                                v-model="form.contact_phone_number" autofocus autocomplete="phone number" />

                            <InputError class="mt-2" :message="form.errors.contact_phone_number" />
                        </div>

                        <h2 class="text-xl font-semibold leading-tight text-gray-800 mt-4">
                            Company information
                        </h2>

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