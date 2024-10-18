<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    address: '',
    phone_number: '',
    password: '',
    terms_accepted: true,
});

const submit = () => {
    form.post(route('users.store'));
};
</script>

<template>

    <Head title="Create User" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Create User
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
                                required autofocus autocomplete="address" />

                            <InputError class="mt-2" :message="form.errors.address" />
                        </div>

                        <div>
                            <InputLabel for="phone_number" value="Phone Number" />

                            <TextInput id="phone_number" type="text" class="mt-1 block w-full"
                                v-model="form.phone_number" required autofocus autocomplete="phone number" />

                            <InputError class="mt-2" :message="form.errors.phone_number" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="password" value="Password" />

                            <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password"
                                required autocomplete="new-password" />

                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>

                        <div class="mt-4 block">
                            <label class="flex items-center">
                                <Checkbox name="terms_accepted" v-model:checked="form.terms_accepted" />
                                <span class="ms-2 text-sm text-gray-600">Accept terms</span>
                            </label>
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