<template>
    <AppLayout :title=" 'Editing ' + this.country.name + ' ' + this.country.emoji">
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800  dark:text-gray-200"
            >
                Editing <span class="italic">{{ this.country.name  }} </span> {{ this.country.emoji}}
            </h2>
        </template>

        <div class="text-gray-700">
            <EditForm :country="this.country" />
        </div>

    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import EditForm from '@/Pages/Country/Partials/EditForm.vue';

defineProps({
    country: Object,
});
</script>
