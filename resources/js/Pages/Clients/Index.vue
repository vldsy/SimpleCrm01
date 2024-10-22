<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, usePage, Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import DataTable from '@/Components/DataTable.vue'
import { ref, computed, onMounted } from 'vue'
import Pagination from '@/Components/Pagination.vue'

const props = defineProps(['clients']);

const fields = computed(() => {
    return [
        { key: 'company_name', label: 'Company Name' },
        { key: 'company_vat', label: 'VAT' },
        { key: 'company_address', label: 'Address' },
        { key: 'actions', label: 'Actions' }
    ]
});

const rows = computed(() => {
    return props.clients.data.map(({ id, company_name, company_vat, company_address }) => ({ id, company_name, company_vat, company_address }));
});

function confirmDelete(e) {
    if (!window.confirm(" Are you sure？")) {
        e.preventDefault();
    }
}

</script>

<template>

    <Head title="Clients" />

    <AuthenticatedLayout>
        <!-- <pre>{{ JSON.stringify($page.props.users, null, 2) }}</pre> -->
        <!-- <pre>{{ JSON.stringify($page.props.auth.can, null, 2) }}</pre> -->

        <div class="overflow-x-auto">
            <Link :href="route('clients.create')"
                class="ml-6 rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Add new client
            </Link>

            <DataTable class="mt-4" :rows="rows" :fields="fields">
                <template #header="{ label }">
                    <span v-text="label" />
                </template>
                <template #cell(actions)="{ item }">
                    <!-- <code v-text="JSON.stringify(item, null, 2)" :style="{
            whiteSpace: 'pre-wrap',
            textAlign: 'left',
            display: 'block',
            paddingLeft: '3rem'
          }" /> -->
                    <div class="flex items-center px-0 py-3">
                        <Link as="button" :href="route('clients.edit', item.id)" method="get"
                            class="mr-2 flex items-center justify-center rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Edit
                        </Link>
                        <Link v-if="$page.props.auth.can['delete clients']" as="button" :href="route('clients.destroy', item.id)" method="delete"
                            @click="(e) => confirmDelete(e)"
                            class="flex items-center justify-center rounded-lg bg-red-700 px-4 py-2 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Delete
                        </Link>
                    </div>
                </template>
            </DataTable>
            <pagination :links="clients.links" />
        </div>
    </AuthenticatedLayout>
</template>