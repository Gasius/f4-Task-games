<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const user = computed(() => page.props.auth.user);
const isAdmin = computed(() => user.value && user.value.role === 'admin');

</script>

<template>
    <nav class="bg-gray-100/50 backdrop-blur-[5px] p-4 flex justify-between items-center fixed top-0 w-full z-10 shadow-lg ring-1 ring-inset ring-gray-50/20">
        <a href="/games" class="text-xl font-bold text-gray-800">
            <img src="https://erp.f4st.dev/assets/images/logo.svg" alt="logo">
        </a>

        <div class="flex items-center space-x-4">
            <Link v-if="isAdmin" :href="route('games.create')" class="py-2 px-4 rounded-full shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Добавить игру
            </Link>

            <div v-if="user" class="flex items-center space-x-4">
                <Link :href="route('dashboard')" class="text-gray-600 hover:text-gray-900 transition-colors duration-300">
                    {{ user.name }}
                </Link>
                <Link :href="route('logout')" method="post" as="button" class="text-sm font-medium text-red-600 hover:text-red-500">
                    Выйти
                </Link>
            </div>

            <div v-else class="flex items-center space-x-4">
                <Link :href="route('login')" class="text-gray-600 hover:text-gray-900 transition-colors duration-300">
                    Войти
                </Link>
                <Link :href="route('register')" class="py-2 px-4 rounded-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Зарегистрироваться
                </Link>
            </div>
        </div>
    </nav>
    <div class="fixed inset-0 bg-[url('https://cdn.radiosputnik.ru/images/148340/76/1483407615_0:386:7360:4526_1920x1080_80_0_0_a4a83e018bd75d8e99c6c66b3eedd954.jpg')] bg-no-repeat bg-cover bg-center -z-10"></div>
</template>
