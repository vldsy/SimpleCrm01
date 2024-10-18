<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, usePage, Head } from '@inertiajs/vue3';
import DataTable from '@/Components/DataTable.vue'

const props = defineProps(['users']);

const columns = computed(() => {
    return [
        {
            key: 'first_name',
            label: 'First Name'
        },
        {
            key: 'last_name',
            label: 'Last Name'
        },
        {
            key: 'email',
            label: 'Email'
        },
    ]

})

const rows = computed(() => {
    return props.users.map(({ id, first_name, last_name }) => ({ id, first_name, last_name }));
})


export default defineComponent({
  props: {
    rows: {
      type: Array,
      default: () => []
    },
    fields: {
      type: [Array, null],
      default: null
    }
    
  },
  setup(props) {
    return {
      localFields: computed(() => props.fields || ['key', ...Object.keys(props.rows[0]), 'row'].map(key => ({
        key,
        label: key
      })))
    }
  }
});

</script>

<template>

    <Head title="Authors" />

    <AuthenticatedLayout>

        <pre>{{ JSON.stringify($page.props.users, null, 2) }}</pre>

        <!-- https://stackoverflow.com/questions/72956962/vuejs-3-how-to-pass-variable-to-all-elements-inside-a-slot -->
        <!-- https://codesandbox.io/p/sandbox/fast-frost-j2ci4q?file=%2Fsrc%2Fcomponents%2FTable.vue%3A1%2C1-66%2C10 -->


        <div class="overflow-x-auto">
            <DataTable :rows="rows" :fields="fields">
                <template #cell(key)="{ index }">
                {{ index + 1 }}
                </template>
                <template #cell(row)="{ item }">
                <code v-text="JSON.stringify(item, null, 2)"
                        :style="{ 
                        whiteSpace: 'pre-wrap',
                        textAlign: 'left',
                        display: 'block',
                        paddingLeft: '3rem'
                        }"
                />
                </template>
                <template #cell(fname)="{ value }">
                <span style="color: red" v-text="value" />
                </template>
                <template #header(fname)="{ label }">
                <span style="color: blue" v-text="label" />
                </template>
                <template #header="{ label }">
                <span style="font-style: italic;" v-text="label" />
                </template>
            </DataTable>

            <!-- <DataTableStyled :rows="rows" :columns="columns">
                <Link v-if="!row.followed" as="button" :href="route('users.update', row.id)" method="post"
                    class="mr-2 flex items-center justify-center rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Edit
                </Link>
                <Link v-else as="button" :href="route('users.destroy', row.id)" method="delete"
                    class="flex items-center justify-center rounded-lg bg-red-700 px-4 py-2 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Delete
                </Link>
            </DataTableStyled> -->
        </div>

    </AuthenticatedLayout>
</template>