<template>
    <div class="container mx-auto py-8 bg-cream text-dark-brown min-h-screen">
      <h1 class="text-3xl font-semibold text-dark-brown mb-6">Create Book</h1>
      <form @submit.prevent="submit" class="bg-white p-6 rounded-lg shadow-md">
        <div class="mb-4">
          <label for="title" class="block text-dark-brown font-medium mb-2">Title</label>
          <input type="text" v-model="form.title" id="title" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-dark-brown" />
        </div>
        <div class="mb-4">
          <label for="author" class="block text-dark-brown font-medium mb-2">Author</label>
          <input type="text" v-model="form.author" id="author" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-dark-brown" />
        </div>
        <div class="mb-6">
          <label for="description" class="block text-dark-brown font-medium mb-2">Description</label>
          <textarea v-model="form.description" id="description" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-dark-brown"></textarea>
        </div>
        <button type="submit" class="px-4 py-2 bg-dark-brown text-cream rounded hover:bg-darker-brown">Create</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { reactive } from 'vue';
  import { useForm } from '@inertiajs/inertia-vue3';
  import Layout from '@/Layouts/Layout.vue';
  import { Inertia } from '@inertiajs/inertia';
  
  defineOptions({
    layout: Layout,
  });
  
  const form = reactive({
    title: '',
    author: '',
    description: '',
  });
  
  const submit = () => {
    Inertia.post('/book', form);
  };
  </script>
  
  <style scoped>
  .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 1rem;
  }
  
  .bg-cream {
    background-color: #fdf6e3;
  }
  
  .text-dark-brown {
    color: #4a3f35;
  }
  
  .bg-dark-brown {
    background-color: #4a3f35;
  }
  
  .hover\:bg-darker-brown:hover {
    background-color: #3a2f2b;
  }
  
  .text-cream {
    color: #fdf6e3;
  }
  
  input,
  textarea {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 0.375rem;
    focus: outline-none;
    transition: border-color 0.2s;
  }
  
  input:focus,
  textarea:focus {
    border-color: #4a3f35;
    box-shadow: 0 0 0 3px rgba(74, 63, 53, 0.1);
  }
  
  button {
    background-color: #4a3f35;
    color: #fdf6e3;
    padding: 0.5rem 1rem;
    border: none;
    border-radius: 0.375rem;
    cursor: pointer;
    transition: background-color 0.2s;
  }
  
  button:hover {
    background-color: #3a2f2b;
  }
  </style>
  