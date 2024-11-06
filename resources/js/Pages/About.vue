<template>
    <div class="container my-4">
        <h1 class="text-center mb-4">About This Social Feed</h1>
        <p class="text-center">
            This is an example page to demonstrate async navigation in Inertia.js v2.0.
            When you navigate back to the feed, the transition will be non-blocking.
        </p>

        <div class="text-center">
            <Link href="/" class="btn btn-primary" prefetch="hover">Go Back to Feed</Link>
        </div>
    </div>
</template>

<script>
import {Link} from '@inertiajs/vue3';

export default {
    components: {
        Link
    },
    name: 'About'
};
</script>
