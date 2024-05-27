<template>
    <div class="container mx-auto flex justify-center items-center h-screen">
      <div class="card border border-gray-300 rounded-lg bg-gray-100 shadow-2xl bg-gradient-to-br from-red-200 to-red-400">
        <div class="card-body p-8">
          <div v-if="showEdit">
            <form @submit.prevent="submit" class="space-y-4">
              <div class="flex flex-col">
                <label for="title" class="text-white font-bold mb-2 label-shadow">title</label>
                <input type="text" id="title" class="form-input" v-model="form.title">
              </div>
              <div class="flex flex-col">
                <label for="author" class="text-white font-bold mb-2 label-shadow">author</label>
                <input type="text" id="author" class="form-input" v-model="form.author">
              </div>
              <div class="flex flex-col">
                <label for="description" class="text-white font-bold mb-2 label-shadow">Description</label>
                <input type="text" id="description" class="form-input" v-model="form.description">
              </div>
              <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded">Save</button>
            </form>
          </div>
          <div v-else>
            <div class="flex flex-col items-center">
              <p class="text-white font-bold mb-2 label-shadow ">{{ book.title }}</p>
              <p class="text-white font-bold mb-2 label-shadow">{{ book.author }}</p>
            </div>
          </div>
          <div class="flex justify-center mt-8">
            <button onclick="window.history.back()" class="btn bg-red-700 mr-4">Back</button>
            <button class="btn bg-blue-700 mr-4" @click="toggleEdit">{{ showEdit ? 'Cancel' : 'Edit' }}</button>
            <button class="btn bg-red-700" @click="delbook">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  import { useForm } from '@inertiajs/vue3';
  import Layout from '@/Layouts/Layout.vue';
  
  export default {
    layout: Layout,
    props: {
      book: Object
    },
    setup(props) {
      const showEdit = ref(false);
  
      const form = useForm({
        title: props.book.title,
        author: props.book.author,
        description: props.book.description,
      });
  
      const submit = async () => {
        await form.put(`/book/${props.book.id}`);
      };
  
      const toggleEdit = () => {
        showEdit.value = !showEdit.value;
      };
  
      const delbook = () => {
        const del = confirm('Are you sure you want to delete this book?');
        if (del) {
          form.submit('delete', `/book/${props.book.id}`);
        }
      };
  
      return { showEdit, form, submit, toggleEdit, delbook };
    }
  }
  </script>
  
  <style scoped>
.container {
  background-color: #fdf6e3;
  max-width: 100%;
}

.card {
  border-radius: 20px;
  width: 500px;
  background-color: #fdf6e3;
}

.form-input {
  border: 1px solid #cbd5e0;
  border-radius: 4px;
  padding: 8px;
  width: 100%;
}

.btn {
  padding: 8px 16px;
  border-radius: 4px;
  color: white;
  text-decoration: none;
}

.btn:hover {
  filter: brightness(0.9);
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

.hover\:bg-red-600:hover {
  background-color: #047857;
}

.hover\:bg-red-600:hover {
  background-color: #e53e3e;
}

.label-shadow {
  text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
}
</style>
  