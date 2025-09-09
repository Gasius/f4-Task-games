<script setup>
import { Link, router } from '@inertiajs/vue3';
import Navbar from '@/Components/Navbar.vue';

defineProps({
    games: { type: Object },
    isAdmin: { type: Boolean },
});

const deleteGame = (gameId) => {
    if (confirm('Вы уверены, что хотите удалить эту игру?')) {
        router.delete(route('games.destroy', gameId));
    }
};
</script>

<template>
    <div class="relative min-h-screen pt-16">
        <Navbar />
        <div class="bg-gray-100/50 backdrop-blur-[5px] p-6 rounded-[40px] ring-1 ring-inset ring-gray-50/20 shadow-lg max-w-3xl mx-auto w-11/12 md:w-1/2 mt-[60px] mb-[40px]">
            <h1 class="text-3xl font-bold text-center mb-6 text-black/80">Каталог игр</h1>

            <ul class="space-y-6">
                <li
                    v-for="game in games.data"
                    :key="game.id"
                    class="flex overflow-hidden flex-col md:flex-row items-center bg-white rounded-[20px] shadow-xl transition-shadow hover:shadow-xl relative"
                >
                    <div class="w-36 h-36 flex-shrink-0">
                        <img
                            :src="game.image"
                            :alt="game.title"
                            class="w-full h-full object-cover"
                        />
                    </div>

                    <div class="flex-grow flex flex-col items-start ml-2 text-left my-auto p-4">
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

                    <div v-if="isAdmin" class="flex flex-col gap-2 md:absolute md:top-4 md:right-4">
                        <div class="flex md:flex-raw gap-2">
                            <Link :href="route('games.edit', game.id)" class="w-8 h-8 flex items-center justify-center rounded-full shadow-md text-white bg-green-500 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.38-2.828-2.828z" />
                                </svg>
                            </Link>
                            <button
                                @click="deleteGame(game.id)"
                                class="w-8 h-8 flex items-center justify-center rounded-full shadow-md text-white bg-red-500 transition-colors duration-300"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <p v-if="game.status === 'available'" class="text-sm text-gray-500 text-center">Доступна</p>
                        <p v-else class="text-sm text-gray-500 text-center">Скрыта</p>
                    </div>
                </li>
            </ul>

            <div class="flex justify-center mt-8">
                <div class="flex space-x-2">
                    <Link
                        v-for="(link, index) in games.links"
                        :key="index"
                        :href="link.url"
                        :class="{'bg-gray-200 text-gray-900 font-bold': link.active, 'text-gray-600': !link.active}"
                        class="py-2 px-4 rounded-md transition-colors"
                        v-html="link.label"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
