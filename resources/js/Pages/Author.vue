<template>
    <div class="container mt-4">
        <div v-if="post" class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Latest Post</h5>
                <p class="card-text">{{ post.title }}</p>
                <p class="card-text"><small class="text-muted">Published on {{ post.created_at }}</small></p>
            </div>
        </div>

        <Deferred data="authors">
            <template #fallback>
                <div class="text-center">Loading authors...</div>
            </template>
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Authors</h5>
                    <ul class="list-group">
                        <li v-for="author in authors" :key="author.id" class="list-group-item">
                            {{ author.name }}
                        </li>
                    </ul>
                </div>
            </div>
        </Deferred>
    </div>
</template>

<script setup>
import { Deferred } from '@inertiajs/vue3'

defineProps({
    post: Object,
    authors: Array
})
</script>

