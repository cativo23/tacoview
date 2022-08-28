<template>
    <AppLayout title="Index">
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800  dark:text-gray-200"
            >
                Profile Settings
            </h2>
        </template>

        <div class="text-gray-700">
            <Table :data="countries.data" :meta="countries.meta"/>
        </div>

    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Table } from "@protonemedia/inertiajs-tables-laravel-query-builder";

defineProps({
    countries: Object,
})
</script>
