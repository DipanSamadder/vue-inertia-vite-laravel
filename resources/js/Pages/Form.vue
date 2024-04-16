
<script setup>
    import Layout from '@/Components/Layout.vue';
    import { defineProps } from 'vue';
    import { Head } from '@inertiajs/vue3'
    defineOptions({ layout: Layout });
</script>

<template>
    <form @submit.prevent="handleSubmit">
      <div>
        <label for="name">Name:</label>
        <input type="text" id="name" v-model="form.name">
      </div>
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="form.email">
      </div>
      <div>
        <button type="submit">Submit</button>
      </div>
    </form>
  </template>
  
  <script>
  export default {
    data() {
      return {
        form: {
          name: '',
          email: ''
        }
      };
    },
    methods: {
      async handleSubmit() {
        // Send form data to Laravel backend using Inertia.js
        await this.$inertia.post('/p/submit-form', this.form);
      }
    }
  };
  </script>