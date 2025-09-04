<script setup>
import Navbar from "@/Components/Navbar.vue";

defineProps({
    games: {type: Array}
})
</script>

<template>
    <div class="relative min-h-screen pt-16">
        <Navbar/>
        <div class="bg-gray-100/50 backdrop-blur-[5px] p-6 rounded-[40px] ring-1 ring-inset ring-gray-50/20 shadow-lg max-w-3xl mx-auto w-11/12 md:w-1/2 mt-[60px] mb-[40px]">
            <h1 class="text-3xl font-bold text-center mb-6 text-black/80">Каталог игр</h1>
            <ul class="space-y-6">
                <li
                    v-for="game in games"
                    :key="game.id"
                    class="flex overflow-hidden flex-col md:flex-row items-center md:items-start bg-white rounded-[20px] shadow-xl transition-shadow hover:shadow-xl"
                >
                    <div class="w-36 h-36 flex-shrink-0">
                        <img
                            :src="game.image"
                            :alt="game.title"
                            class="w-full h-full object-cover"
                        />
                    </div>

                    <div class="flex flex-col items-start ml-2 text-left my-auto">
                        <h2 class="text-xl md:text-2xl font-semibold text-gray-800">
                            <a :href="'/games/' + game.id" class="hover:text-blue-600 transition-colors duration-300">
                                {{ game.title }}
                            </a>
                        </h2>
                        <p class="text-sm md:text-base text-gray-500 italic mb-2">
                            {{ game.genre }}
                        </p>
                        <p class="text-gray-600 leading-relaxed text-sm md:text-base">
                            {{ game.description }}
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>
