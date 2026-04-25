

<template>
    <div class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-black via-indigo-900 to-purple-900 p-4">
        <div class="pointer-events-none absolute -bottom-20 right-0 h-96 w-96 rounded-full bg-cyan-400/25 blur-3xl"></div>
        <div class="relative w-full max-w-2xl rounded-lg border border-white/20 bg-white/90 p-6 shadow-2xl backdrop-blur">
            <nav class="mb-6 flex gap-3">
                <router-link
                    to="/"
                    class="rounded border border-blue-600 bg-blue-600 px-4 py-2 text-white transition hover:bg-blue-700"
                >
                    Форма
                </router-link>
                <router-link
                    to="/list"
                    class="rounded border border-blue-600 bg-blue-600 px-4 py-2 text-white transition hover:bg-blue-700"
                >
                    Список
                </router-link>
            </nav>
            <router-view />
        </div>
    </div>
</template>

<style scoped>

</style>
