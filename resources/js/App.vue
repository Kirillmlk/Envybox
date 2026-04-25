

<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 p-4">
        <div class="w-full max-w-2xl rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
            <nav class="mb-6 flex gap-4">
                <router-link to="/" class="text-blue-600 hover:underline">Форма</router-link>
                <router-link to="/list" class="text-blue-600 hover:underline">Список</router-link>
            </nav>
            <router-view />
        </div>
    </div>
</template>

<style scoped>

</style>
