<template>
    <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
      <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th v-for="column in columns" :key="column.key" class="px-4 py-4">
            {{ column.label }}
          </th>
          <th class="px-4 py-4">action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-if="rows.length === 0">
          <td :colspan="columns.length + 1" class="px-4 py-3 text-center">
            No data
          </td>
        </tr>
        <tr v-for="row in rows" :key="row.id" class="border-b dark:border-gray-700">
          <td v-for="column in columns" :key="column.key" class="px-4 py-3">
            {{ row[column.key] }}
          </td>
          <td class="flex items-center px-4 py-3">
            <slot />
          </td>
        </tr>
      </tbody>
    </table>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  const { rows, columns } = defineProps({
    rows: {
      type: Array,
      required: true
    },
    columns: {
      type: Array,
      required: true
    }
  })
  
  </script>