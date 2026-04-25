import { createRouter, createWebHistory } from "vue-router";
import FormPage from '../pages/FormPage.vue'
import ListPage from '../pages/ListPage.vue'

const routes = [
    { puth: '/', name: 'form-page', component: 'FormPage' },
    { puth: '/list', name: 'list-page', component: 'ListPage' },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
