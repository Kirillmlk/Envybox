<script setup lang="ts">
import {useStore} from "vuex";
import {computed} from "vue";
import {FormItem} from "../types/form";

const store = useStore()

const forms = computed<FormItem[]>(() => store.getters.allForms)
const formsCount = computed<number>(() => store.getters.formsCount)
</script>


<template>
    <div>
        <h2 class="mb-2 text-2xl font-semibold">Список форм</h2>
        <p class="mb-4 text-gray-600">Всего: {{ formsCount }}</p>
        <ul v-if="forms.length" class="space-y-3">
            <li v-for="(item, index) in forms" :key="index" class="rounded border border-gray-200 p-3">
                <p class="font-medium">{{ item.name }}</p>
                <p class="text-gray-700">{{ item.message }}</p>
            </li>
        </ul>
        <p v-else class="text-gray-500">Пока нет отправленных форм.</p>
    </div>
</template>

<style scoped>

</style>
