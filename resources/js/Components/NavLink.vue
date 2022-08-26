<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'inline-block w-full py-2 mx-0 font-medium text-left text-gray-500 md:ml-0 md:w-auto md:px-0 md:mx-2 lg:mx-3 md:text-center border-b-2 border-red-400 font-bold leading-5 text-gray-900 focus:outline-none focus:border-red-700 transition'
        : 'inline-block w-full py-2 mx-0 font-medium text-left text-gray-900 md:w-auto md:px-0 md:mx-2 hover:text-red-600 lg:mx-3 md:text-center border-b-2 border-transparent leading-5 hover:border-red-300 focus:outline-none focus:text-red-700 focus:border-red-300 transition';
});
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
