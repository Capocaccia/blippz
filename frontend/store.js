import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        user: null,
        blips: null,
        contacts: null
    },
    mutations: {
        setUser (state, key) {
            state.user = key
        },
        setBlips (state, key) {
            state.blips = key
        },
        setContacts (state, key) {
            state.contacts = key
        }
    },
    getters: {
        userId: state => {
            return state.user.id
        },
        blips: state => {
            return state.blips
        },
        contacts: state => {
            return state.contacts
        }
    },
    setters: {
        userId: state => {
            return state.user.id
        }
    }
})