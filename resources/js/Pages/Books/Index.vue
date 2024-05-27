<script setup>
import { defineProps, defineOptions } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
import Layout from '@/Layouts/Layout.vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
  books: Object,
  success: String
});

defineOptions({
  layout: Layout
});

const deletebook = (id) => {
  if (confirm('Are you sure you want to delete this book?')) {
    Inertia.delete(`/books/${id}`, {
      preserveScroll: true,
    });
  }
  return false;
}
</script>

<template>
  <div class="container mx-auto py-8 bg-cream text-dark-brown min-h-screen">
    <div class="mb-8">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-3xl font-semibold text-dark-brown">List Of Books</h2>
        <Link href="/book/create" class="px-4 py-2 bg-dark-brown text-white rounded hover:bg-darker-brown">Add a Book</Link>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div v-for="book in books" :key="book.id" class="bg-white rounded-lg shadow-md overflow-hidden transition-all book">
          <div class="p-4">
            <h4 class="text-lg font-semibold mb-2 text-dark-brown">{{ book.title }}</h4>
            <p class="text-sm"><strong>Author:</strong> {{ book.author }}</p>
            <p class="text-sm">{{ book.description }}</p>
          </div>
          <div class="flex items-center justify-end px-4 py-2 bg-light-brown border-t border-gray-200">
            <Link :href="'/book/' + book.id" class="ml-auto text-dark-brown hover:text-darker-brown">View Details</Link>
            <button @click.prevent="deletebook(book.id)" class="ml-4 text-red-600 hover:text-red-800">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
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
.text-red-600 {
  color: #e53e3e;
}
.hover\:text-red-800:hover {
  color: #b91c1c;
}
.transition-all {
  transition-property: all;
  transition-duration: 0.5s;
  transition-timing-function: ease;
}
.flex {
  display: flex;
}
.justify-end {
  justify-content: flex-end;
}
.items-center {
  align-items: center;
}
.container {
  max-width: 1200px;
  scroll-behavior: smooth;
}
</style>
