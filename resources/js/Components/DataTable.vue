<template>
    <table>
      <thead>
        <tr>
          <th v-for="field in localFields" :key="field.key">
            <slot :name="`header(${field.key})`"
                  v-bind="field">
              <slot name="header"
                    v-bind="field">
                {{ field.key }}
              </slot>
            </slot>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item, index) in rows" :key="index">
          <td v-for="field in localFields" :key="field.key">
            <slot :name="`cell(${field.key})`"
                  v-bind="{ 
                    item, 
                    index, 
                    value: item[field.key],
                    field
                  }">
              <slot name="cell"
                    v-bind="{ 
                      item, 
                      index, 
                      value: item[field.key],
                      field
                    }">
                {{ item[field.key] }}
              </slot>
            </slot>
          </td>
        </tr>
      </tbody>
    </table>
  </template>
  
  <script lang="ts">
  import { defineComponent, computed } from "vue";
  
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