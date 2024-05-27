<template>
    <div>
        <h1>Edit Book</h1>
        <form @submit.prevent="submit">
            <div>
                <label for="title">Title</label>
                <input type="text" v-model="form.title" id="title" />
            </div>
            <div>
                <label for="author">Author</label>
                <input type="text" v-model="form.author" id="author" />
            </div>
            <div>
                <label for="description">Description</label>
                <textarea v-model="form.description" id="description"></textarea>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</template>

<script setup>
import { reactive } from 'vue'
import { useForm } from '@inertiajs/inertia-vue3'
import { usePage } from '@inertiajs/inertia-vue3'
import Layout from '@/Layouts/Layout.vue'

defineOptions({
    layout:Layout
})

const { props } = usePage()
const book = props.value.book

const form = reactive({
    title: book.title,
    author: book.author,
    description: book.description
})

const submit = () => {
    Inertia.put(`/books/${book.id}`, form)
}
</script>
