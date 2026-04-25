<script setup lang="ts">
import { ref } from 'vue'
import type { FormItem } from '../types/form'
import { useRouter } from 'vue-router'
import { useStore } from 'vuex'

const store = useStore()
const router = useRouter()

const name = ref<string>('')
const message = ref<string>('')
const channel = ref<'database' | 'email'>('database')
const errorText = ref<string>('')

const submitForm = async (): Promise<void> => {
    errorText.value = ''

    if (!name.value.trim() || !message.value.trim()) {
        errorText.value = 'Пожалуйста, заполните все поля!'
        return
    }

    const payload = {
        name: name.value,
        message: message.value,
        channel: channel.value,
    }

    try {
        const response = await fetch('/api/feedback', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify(payload),
        })

        if (!response.ok) {
            const data = await response.json().catch(() => ({}))
            errorText.value = data?.message ?? 'Произошла ошибка при отправке :('
            return
        }

        const localItem: FormItem = {
            name: name.value,
            message: message.value,
            channel: channel.value,
        }

        store.dispatch('addForm', localItem)

        name.value = ''
        message.value = ''
        channel.value = 'database'

        await router.push('/list')
    } catch {
        errorText.value = 'Сервер недоступен'
    }
}
</script>

<template>
    <div>
        <h2 class="mb-4 text-2xl font-semibold">Форма</h2>
        <form @submit.prevent="submitForm" class="space-y-4">
            <div>
                <label for="name" class="mb-1 block text-sm font-medium text-gray-700">Имя</label>
                <input
                    id="name"
                    v-model="name"
                    type="text"
                    class="w-full rounded border border-gray-300 px-3 py-2 outline-none focus:border-blue-500"
                    placeholder="Введите имя"
                />
            </div>
            <div>
                <label for="message" class="mb-1 block text-sm font-medium text-gray-700">Обращение</label>
                <textarea
                    id="message"
                    v-model="message"
                    rows="4"
                    class="w-full rounded border border-gray-300 px-3 py-2 outline-none focus:border-blue-500"
                    placeholder="Введите обращение"
                ></textarea>
            </div>

            <div>
                <label for="channel" class="mb-1 block text-sm font-medium text-gray-700">Канал</label>
                <select
                    id="channel"
                    v-model="channel"
                    class="w-full rounded border border-gray-300 px-3 py-2 outline-none focus:border-blue-500"
                >
                    <option value="database">database</option>
                    <option value="email">email</option>
                </select>
            </div>

            <p v-if="errorText" class="text-sm text-red-600">{{ errorText }}</p>

            <button
                type="submit"
                class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700"
            >
                Отправить
            </button>
        </form>
    </div>
</template>

<style scoped>

</style>
