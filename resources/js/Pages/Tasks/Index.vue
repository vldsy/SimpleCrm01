<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, usePage, Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import DataTable from '@/Components/DataTable.vue'
import { ref, computed, onMounted } from 'vue'
import Pagination from '@/Components/Pagination.vue'

const props = defineProps(['tasks']);

const fields = computed(() => {
    return [
        { key: 'title', label: 'Title' },
        { key: 'assigned_to', label: 'Assigned To' },
        { key: 'client', label: 'Client' },
        { key: 'deadline_at', label: 'Deadline' },
        { key: 'status', label: 'Status' },
        { key: 'actions', label: 'Actions' }
    ]
});

const rows = computed(() => {
    return props.tasks.data.map((
        { id, title, user, client, deadline_at, status }
    ) => (
        { id, title, assigned_to: user ? user.first_name + " " + user.last_name : "Not assigned", client: client ? client.company_name : "Not assigned", deadline_at, status }
    ));
});

function confirmDelete(e) {
    if (!window.confirm(" Are you sure？")) {
        e.preventDefault();
    }
}

</script>

<template>

    <Head title="Tasks" />

    <AuthenticatedLayout>
        <!-- <pre>{{ JSON.stringify($page.props.users, null, 2) }}</pre> -->
        <!-- <pre>{{ JSON.stringify($page.props.auth.can, null, 2) }}</pre> -->

        <div class="overflow-x-auto">
            <Link :href="route('tasks.create')"
                class="ml-6 rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Add new task
            </Link>

            <DataTable class="mt-4" :rows="rows" :fields="fields">
                <template #header="{ label }">
                    <span v-text="label" />
                </template>
                <template #cell(actions)="{ item }">
                    <div class="flex items-center px-0 py-3">
                        <Link as="button" :href="route('tasks.edit', item.id)" method="get"
                            class="mr-2 flex items-center justify-center rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Edit
                        </Link>
                        <Link v-if="$page.props.auth.can['delete tasks']" as="button"
                            :href="route('tasks.destroy', item.id)" method="delete" @click="(e) => confirmDelete(e)"
                            class="flex items-center justify-center rounded-lg bg-red-700 px-4 py-2 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Delete
                        </Link>
                    </div>
                </template>
            </DataTable>
            <pagination :links="tasks.links" />
        </div>
    </AuthenticatedLayout>
</template>