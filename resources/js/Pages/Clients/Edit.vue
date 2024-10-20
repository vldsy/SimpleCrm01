<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps(['client']);

const form = useForm({
    contact_name: props.client.contact_name,
    contact_email: props.client.contact_email,
    company_name: props.client.company_name,
});

const submit = () => {
    form.put(route('clients.update', props.client));
};
</script>

<template>

    <Head title="Edit Client" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit Client
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="contact_name" value="Conact Name" />

                            <TextInput id="contact_name" type="text" class="mt-1 block w-full"
                                v-model="form.contact_name" required autofocus autocomplete="name" />

                            <InputError class="mt-2" :message="form.errors.contact_name" />
                        </div>

                        <div>
                            <InputLabel for="contact_email" value="Contact Email" />

                            <TextInput id="contact_email" type="email" class="mt-1 block w-full"
                                v-model="form.contact_email" required autocomplete="email" />

                            <InputError class="mt-2" :message="form.errors.contact_email" />
                        </div>

                        <div>
                            <InputLabel for="company_name" value="Company Name" />

                            <TextInput id="company_name" type="text" class="mt-1 block w-full"
                                v-model="form.company_name" required autofocus autocomplete="name" />

                            <InputError class="mt-2" :message="form.errors.company_name" />
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