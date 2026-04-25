<script setup lang="ts">

import {ref} from "vue";
import {FormItem} from "../types/form";
import {useRouter} from "vue-router";
import {useStore} from "vuex";

const store = useStore()
const router = useRouter()

const name = ref<string>('')
const message = ref<string>('')

const submitForm = (): void => {
    if (!name.value.trim() || !message.value.trim()) return

    const payLoad: FormItem = {
        name: name.value,
        message: message.value,
        createdAt: new Date().toISOString(),
    }

    store.dispatch("addForm", payLoad)
    name.value = ''
    message.value = ''
    router.push('/list')
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
