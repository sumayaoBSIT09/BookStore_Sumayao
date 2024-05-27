<template>
    <div>
        <h1>{{ books.title }}</h1>
        <p>Author: {{ books.author }}</p>
        <p>{{ books.description }}</p>
        <Link :href="'/books/' + books.id + '/edit'">Edit</Link>
    </div>
</template>

<script setup>
import { usePage } from '@inertiajs/inertia-vue3'
import Layout from '@/Layouts/Layout.vue'

defineOptions({
    layout:Layout
})

const { props } = usePage()
const books = props.value.book
</script>
