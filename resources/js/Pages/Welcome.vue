<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    canLogin: {
        type: Boolean,
        required: true,
    },
    canRegister: {
        type: Boolean,
        required: true,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

const isImageError = ref(false);

function handleImageError() {
    isImageError.value = true;
}
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-cream text-dark-brown">
        <div class="relative min-h-screen flex flex-col items-center justify-center py-10">
            <header class="w-full max-w-4xl px-6 py-4 mb-6">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <img :src="'https://png.pngtree.com/png-vector/20220812/ourmid/pngtree-book-logo-icon-illustration-bookstore-student-background-vector-png-image_38477658.png'" alt="Bookstore Logo" class="h-12 w-auto" />
                        <h1 class="text-3xl font-serif font-bold">Welcome to Our Bookstore</h1>
                    </div>
                    <nav class="flex space-x-4">
                        <Link v-if="props.canLogin" :href="route('login')" class="btn-primary">Log In</Link>
                        <Link v-if="props.canRegister" :href="route('register')" class="btn-secondary">Register</Link>
                    </nav>
                </div>
            </header>

            <main class="w-full max-w-4xl px-6">
                <section class="grid gap-6 md:grid-cols-3">
                    <div class="category-card">
                        <img :src="'https://i.redd.it/76u7q5kqua951.jpg'" alt="Fiction" class="card-image" @error="handleImageError" />
                        <div class="card-content">
                            <h2 class="text-xl font-semibold">Fiction</h2>
                            <p>Explore the latest and greatest in fiction literature.</p>
                        </div>
                    </div>
                    <div class="category-card">
                        <img :src="'https://www.wildbilly.dk/images/Nonfiction.jpg'" alt="Non-Fiction" class="card-image" @error="handleImageError" />
                        <div class="card-content">
                            <h2 class="text-xl font-semibold">Non-Fiction</h2>
                            <p>Discover insightful and educational non-fiction books.</p>
                        </div>
                    </div>
                    <div class="category-card">
                        <img :src="'https://images.hdqwalls.com/download/little-cute-girl-with-book-ab-3840x2160.jpg'" alt="Children\'s Books" class="card-image" @error="handleImageError" />
                        <div class="card-content">
                            <h2 class="text-xl font-semibold">Children\'s Books</h2>
                            <p>Find delightful books for young readers.</p>
                        </div>
                    </div>
                </section>

                <section class="mt-10">
                    <h2 class="text-2xl font-serif font-bold mb-4">Featured Books</h2>
                    <div class="grid gap-6 md:grid-cols-2">
                        <div class="book-card">
                            <img :src="'https://wallpapercave.com/wp/wp4430577.jpg'" alt="Featured Book 1" class="card-image" @error="handleImageError" />
                            <div class="card-content">
                                <h3 class="text-xl font-semibold">Featured Book 1</h3>
                                <p>An amazing book that you will love.</p>
                            </div>
                        </div>
                        <div class="book-card">
                            <img :src="'https://wallpapercave.com/wp/wp9167023.jpg'" alt="Featured Book 2" class="card-image" @error="handleImageError" />
                            <div class="card-content">
                                <h3 class="text-xl font-semibold">Featured Book 2</h3>
                                <p>Another incredible book worth reading.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mt-10">
                    <h2 class="text-2xl font-serif font-bold mb-4">Recommended for You</h2>
                    <div class="grid gap-6 md:grid-cols-2">
                        <div class="book-card">
                            <img :src="'https://wallpapercave.com/wp/wp4430535.jpg'" alt="Recommended Book 1" class="card-image" @error="handleImageError" />
                            <div class="card-content">
                                <h3 class="text-xl font-semibold">Recommended Book 1</h3>
                                <p>A great recommendation based on your interests.</p>
                            </div>
                        </div>
                        <div class="book-card">
                            <img :src="'https://images7.alphacoders.com/339/thumb-1920-339484.jpg'" alt="Recommended Book 2" class="card-image" @error="handleImageError" />
                            <div class="card-content">
                                <h3 class="text-xl font-semibold">Recommended Book 2</h3>
                                <p>Another wonderful book you might enjoy.</p>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
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
.btn-primary {
    background-color: #8b4513;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 0.25rem;
    text-decoration: none;
    font-weight: 500;
}
.btn-secondary {
    background-color: #cd853f;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 0.25rem;
    text-decoration: none;
    font-weight: 500;
}
.category-card, .book-card {
    display: flex;
    flex-direction: column;
    background-color: white;
    border-radius: 0.5rem;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-decoration: none;
    color: inherit;
    transition: transform 0.2s;
}
.category-card:hover, .book-card:hover {
    transform: translateY(-0.5rem);
}
.card-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}
.card-content {
    padding: 1rem;
}
</style>
