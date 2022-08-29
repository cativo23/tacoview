<template>
    <AppLayout title="Index">
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800  dark:text-gray-200"
            >
                Countries List
            </h2>
        </template>

        <div class="text-gray-700">
            <Table
                :data="countries.data"
                :meta="countries.meta"
                :striped="true"
            >
                <template #cell(actions)="{ item: country }">
                    <Button :href="route('countries.edit', country.id)">
                        Edit
                    </Button>
                </template>
            </Table>
        </div>

    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Table } from "@protonemedia/inertiajs-tables-laravel-query-builder";
import Button from "@/Components/Button.vue";

defineProps({
    countries: Object,
})
</script>
