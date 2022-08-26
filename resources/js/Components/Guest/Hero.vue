<template>
    <div class="max-w-full mx-auto mt-px text-left md:max-w-none md:text-center bg-cover bg-center" :style="'background-image: url(' + hero_photo +')' ">
        <div class="bg-black bg-opacity-0 px-4 py-32 w-full h-full bg-opacity-70 transition-all duration-1000">
            <h1 class="text-5xl font-extrabold leading-10 tracking-tight text-left text-white md:text-center sm:leading-none md:text-6xl lg:text-7xl">
                <span class="inline md:block">Bienvenido</span> <span
                class="relative mt-2 text-transparent bg-clip-text bg-gradient-to-br from-red-600 to-red-500 md:inline-block">a {{ $page.props.project_info }}</span>
            </h1>
            <div class="mx-auto mt-5 text-white md:mt-12 md:max-w-lg md:text-center lg:text-lg">A review site for tacos and some other food...</div>
            <div class="flex flex-col items-center mt-12 text-center">
                <span class="relative inline-flex w-full md:w-auto">
                    <a href="#" type="button"
                       class="inline-flex items-center justify-center w-full px-8 py-4 text-base font-bold leading-6 text-white bg-red-600 border border-transparent rounded-full md:w-auto hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600">
                        Buscar Restaurantes
                    </a>
                </span>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    hero_photo: String,
})
</script>
