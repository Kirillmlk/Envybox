import { createRouter, createWebHistory } from 'vue-router'
import FormPage from '../pages/FormPage.vue'
import ListPage from '../pages/ListPage.vue'

const routes = [
    { path: '/', name: 'form-page', component: FormPage },
    { path: '/list', name: 'list-page', component: ListPage },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
