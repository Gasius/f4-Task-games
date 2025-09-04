<script setup>
import Navbar from "@/Components/Navbar.vue";

defineProps({
    game: {type: Array}
})
</script>

<template>
    <div class="relative min-h-screen flex items-center pt-16">
        <Navbar/>
        <div class="bg-gray-100/50 backdrop-blur-[5px] p-6 rounded-[40px] ring-1 ring-inset ring-gray-50/20 shadow-lg max-w-3xl mx-auto w-11/12 md:w-1/2">
            <div class="flex overflow-hidden flex-col md:flex-row items-center md:items-start bg-white rounded-[20px] shadow-xl transition-shadow hover:shadow-xl">
                <div class="w-36 h-36 md:w-40 md:h-40 flex-shrink-0">
                    <img
                        :src="game.image"
                        :alt="game.title"
                        class="w-full h-full object-cover"
                    />
                </div>

                <div class="flex flex-col items-start ml-4 text-left my-auto">
                    <h2 class="text-xl md:text-2xl font-semibold text-gray-800">
                        {{ game.title }}
                    </h2>
                    <p class="text-sm md:text-base text-gray-500 italic mb-2">
                        {{ game.genre }}
                    </p>
                    <p class="text-gray-600 leading-relaxed text-sm md:text-base">
                        {{ game.description }}
                    </p>
                </div>
            </div>
            <div class="mt-7 flex flex-col md:flex-row items-center md:items-start p-2 bg-white rounded-[20px] shadow-xl transition-shadow hover:shadow-xl">
                <div class="p-4">
                    <p class="text-gray-500 text-shadow-black text-shadow-lg">{{ game.specification }}</p>
                </div>
            </div>
        </div>
    </div>
</template>
