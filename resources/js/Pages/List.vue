<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Users</h2>
            </div>
            <div class="col-12">
                <ul class="list-group">
                    <li v-for="user in users" :key="user.id" class="list-group-item">
                        {{ user.name }}
                    </li>
                </ul>
            </div>

            <WhenVisible
                always
                :params="{
            data: {
              page: current + 1,
            },
            only: ['users', 'current'],
            preserveUrl: true,
          }"
            >
                <div v-show="current < last">Loading Users</div>
                <template #fallback>
                    Loading Users
                </template>
            </WhenVisible>
        </div>
    </div>
</template>

<script setup>
import {WhenVisible} from '@inertiajs/vue3'

defineProps({
    users: Array,
    current: Number,
    last: Number,
})
</script>
