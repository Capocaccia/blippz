import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        user: null,
        blips: null
    },
    mutations: {
        setUser (state, key) {
            state.user = key
        },
        setBlips (state, key) {
            state.blips = key
        },

    },
    getters: {
        userId: state => {
            return state.user.id
        }
    },
    setters: {
        userId: state => {
            return state.user.id
        }
    }
})