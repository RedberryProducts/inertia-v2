<template>
    <div class="container my-4">
        <h1 class="text-center mb-4">Social Media Feed</h1>
        <p class="text-center text-muted">Current Visitors: {{ visitorCount }}</p>
        <div class="text-center mb-4">
            <button @click="togglePolling" class="btn btn-primary">
                {{ isPolling ? 'Stop Polling' : 'Start Polling' }}
            </button>
        </div>

        <div class="text-center mb-4">
            <Link href="/author" class="btn btn-secondary mx-2 px-4 py-2 font-weight-bold shadow-sm rounded">Authors
            </Link>
            <Link href="/about" class="btn btn-secondary mx-2 px-4 py-2 font-weight-bold shadow-sm rounded">About</Link>
            <Link href="/user" class="btn btn-secondary mx-2 px-4 py-2 font-weight-bold shadow-sm rounded">Users</Link>
            <Link href="/list" class="btn btn-secondary mx-2 px-4 py-2 font-weight-bold shadow-sm rounded">List</Link>
        </div>

        <div class="row">
            <div v-for="post in posts" :key="post.id" class="col-md-12 mb-4">
                <Post :post="post"></Post>
            </div>
        </div>
    </div>
</template>

<script>
import {Link, usePage, usePoll, Deferred, WhenVisible} from '@inertiajs/vue3';
import {ref} from 'vue';
import Post from "../Components/Post.vue";
import post from "../Components/Post.vue";

export default {
    computed: {
        post() {
            return post
        }
    },
    components: {
        WhenVisible,
        Deferred,
        Post,
        Link,
    },
    setup() {
        const props = usePage().props;
        const posts = ref(props.posts || []);
        const visitorCount = ref(props.visitorCount || 0);
        const isPolling = ref(true);

        const {stop, start} = usePoll(10000, {
            only: ['visitorCount'],
            replace: true,
            fresh: true,
            onSuccess(response) {
                const newVisitorCount = response?.props?.visitorCount;
                if (newVisitorCount) {
                    visitorCount.value = newVisitorCount;
                    console.log("Updated visitor count:", visitorCount.value);
                } else {
                    console.log("visitorCount not found in response");
                }
            },
        }, {
            keepAlive: true,
            autoStart: true,
        });

        function togglePolling() {
            if (isPolling.value) {
                stop();
                console.log("Polling stopped");
            } else {
                start();
                console.log("Polling started");
            }
            isPolling.value = !isPolling.value;
        }


        return {posts, visitorCount, isPolling, togglePolling};
    },
};
</script>
