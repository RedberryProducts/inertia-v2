<template>
    <div class="card h-100">
        <div class="card-body">
            <h5 class="card-title">{{ post.title }}</h5>
            <p class="card-text">{{ post.content }}</p>
        </div>
    </div>
</template>

<script>
import {WhenVisible} from "@inertiajs/vue3";

export default {
    components: {WhenVisible},
    props: {
        post: {
            type: Object,
            required: true
        }
    }
};
</script>
