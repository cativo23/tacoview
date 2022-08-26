<template>
    <nav class="relative z-50 h-24 select-none" x-data="{ isOpen: false }">
        <div class="container relative flex flex-wrap items-center justify-between h-24 mx-auto overflow-hidden font-medium border-b border-gray-200 md:overflow-visible lg:justify-center sm:px-4 md:px-2 lg:px-0">
            <div class="flex items-center justify-start w-1/4 h-full pr-4">
                <Link :href="route('index')" class="inline-flex items-center text-2xl text-gray-900 gap-2">
                    <span class="p-1 text-xl font-black text-gray-900">{{ $page.props.project_info }}</span>
                    <ApplicationLogo aria-hidden="true" class="w-10 h-auto"/>
                </Link>
            </div>
            <div class="top-0 left-0 items-start w-full h-full p-4 text-sm bg-gray-900 bg-opacity-50 md:items-center md:w-3/4 md:absolute lg:text-base md:bg-transparent md:p-0 md:relative md:flex" :class="{'flex fixed': isOpen, 'hidden': !isOpen }">
                <div class="flex-col w-full h-auto overflow-hidden bg-white rounded-lg md:bg-transparent md:overflow-visible md:rounded-none md:relative md:flex md:flex-row">
                    <Link :href="route('index')" class="inline-flex items-center block w-auto h-16 px-6 text-xl font-black leading-none text-gray-900 md:hidden">
                        {{ $page.props.project_info }}<span class="text-red-600">.</span>
                    </Link>
                    <div class="flex flex-col items-start justify-center w-full space-x-6 text-center lg:space-x-8 md:w-2/3 md:mt-0 md:flex-row md:items-center">
                        <JetNavLink v-if="$page.props.user" :href="route('dashboard')" :active="route().current('dashboard')" :class="'ml-6'">
                            Dashboard
                        </JetNavLink>
                        <JetNavLink :href="'#'" :active="route().current('dashboard')" :class="!$page.props.user ? 'ml-6' : ''">
                            Restaurantes
                        </JetNavLink>
                        <JetNavLink :href="'#'" :active="route().current('dashboard')">
                            Blog
                        </JetNavLink>
                        <JetNavLink :href="'#'" :active="route().current('dashboard')">
                            Contacto
                        </JetNavLink>
                        <a href="#" class="absolute top-0 left-0 hidden py-2 mt-6 ml-10 mr-2 text-gray-600 lg:inline-block md:mt-0 md:ml-2 lg:mx-3 md:relative">
                            <svg class="inline w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </a>
                    </div>
                    <div v-if="canLogin" class="flex flex-col items-start justify-end w-full pt-4 md:items-center md:w-1/3 md:flex-row md:py-0">
                        <template v-if="!$page.props.user">
                            <Link :href="route('login')" class="inline-flex items-center w-full px-6 py-3 mr-0 text-gray-700 md:mr-2 lg:mr-3 md:w-auto">
                                Log in
                            </Link>

                            <Link v-if="canRegister" :href="route('register')" class="inline-flex items-center w-full px-6 py-3 text-sm font-medium leading-4 text-white bg-red-600 md:px-3 md:w-auto md:rounded-full lg:px-5 hover:bg-red-500 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-red-600">
                                Register
                            </Link>
                        </template>
                    </div>
                </div>
            </div>
            <div @click="isOpen = !isOpen" class="absolute right-0 flex flex-col items-center items-end justify-center w-10 h-10 bg-white rounded-full cursor-pointer md:hidden hover:bg-gray-100">
                <svg class="w-6 h-6 text-gray-700" v-show="!isOpen" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M4 6h16M4 12h16M4 18h16"></path></svg>
                <svg class="w-6 h-6 text-gray-700" v-show="isOpen" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </div>
        </div>
    </nav>
</template>

<script setup>
import {Link} from '@inertiajs/inertia-vue3';
import JetNavLink from '@/Components/NavLink.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import {ref} from "vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean
})

let isOpen = ref();
</script>
