<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, usePage, Head } from '@inertiajs/vue3';

const props = defineProps(['users']);

</script>

<template>

    <Head title="Authors" />

    <AuthenticatedLayout>

        <pre>{{ JSON.stringify($page.props.users, null, 2) }}</pre>

        <div class="overflow-x-auto">
            
        </div>

    </AuthenticatedLayout>
</template>