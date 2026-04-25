import { createStore } from 'vuex'
import type { FormItem } from '../types/form'

type State = {
    forms: FormItem[]
}

const store = createStore<State>({
    state: {
        forms: [],
    },
    mutations: {
        ADD_FORM(state, form: FormItem) {
            state.forms.push(form)
        },
    },
    actions: {
        addForm({ commit }, form: FormItem) {
            commit('ADD_FORM', form)
        },
    },
    getters: {
        allForms(state): FormItem[] {
            return state.forms
        },
        formsCount(state): number {
            return state.forms.length
        },
    },
})

export default store
