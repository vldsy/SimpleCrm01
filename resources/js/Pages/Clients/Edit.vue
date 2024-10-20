<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps(['user']);

const form = useForm({
    first_name: props.user.first_name,
    last_name: props.user.last_name,
    email: props.user.email,
    address: props.user.address,
    phone_number: props.user.phone_number,
});

const submit = () => {
    form.put(route('users.update', props.user));
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
                            <InputLabel for="first_name" value="First Name" />

                            <TextInput id="first_name" type="text" class="mt-1 block w-full" v-model="form.first_name"
                                required autofocus autocomplete="given-name" />

                            <InputError class="mt-2" :message="form.errors.first_name" />
                        </div>

                        <div>
                            <InputLabel for="last_name" value="Last Name" />

                            <TextInput id="last_name" type="text" class="mt-1 block w-full" v-model="form.last_name"
                                required autofocus autocomplete="family-name" />

                            <InputError class="mt-2" :message="form.errors.last_name" />
                        </div>

                        <div>
                            <InputLabel for="email" value="Email" />

                            <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                                autocomplete="email" />

                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <div>
                            <InputLabel for="address" value="Address" />

                            <TextInput id="address" type="text" class="mt-1 block w-full" v-model="form.address"
                                autofocus autocomplete="address" />

                            <InputError class="mt-2" :message="form.errors.address" />
                        </div>

                        <div>
                            <InputLabel for="phone_number" value="Phone Number" />

                            <TextInput id="phone_number" type="text" class="mt-1 block w-full"
                                v-model="form.phone_number" autofocus autocomplete="phone number" />

                            <InputError class="mt-2" :message="form.errors.phone_number" />
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