<script setup>
import Navbar from "@/Components/Navbar.vue";
</script>

<template>
    <div  class="relative min-h-screen flex items-center pt-16">
        <Navbar/>
        <div class="bg-gray-100/50 backdrop-blur-[5px] p-6 rounded-[20px] ring-1 ring-inset ring-gray-50/20 shadow-lg max-w-3xl mx-auto w-11/12 md:w-1/2">
            <h2 class="text-3xl font-bold mb-4 text-gray-800">О нас</h2>
            <p class="text-gray-800 leading-relaxed mb-4">
                Миссия <strong class="text-blue-700">F4studio</strong> — приносить радость и новые эмоции через интерактивные развлечения.
            </p>
            <p class="text-gray-800 leading-relaxed mb-4">
                Мы создаём собственные браузерные игры, стремясь сделать их максимально интересными и доступными для каждого. Мы работаем над тем, чтобы наши игры были не просто способом убить время, а источником позитива и вдохновения.
            </p>
            <p class="text-gray-800 leading-relaxed">
                Используя наш опыт в разработке, мы также принимаем заказы на создание небольших промо-сайтов для рекламных кампаний. Мы знаем, как важно быстро и эффективно донести информацию до аудитории, и готовы помочь вам в этом.
            </p>
        </div>
    </div>
</template>
