import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        user: null,
        blips: null,
        contacts: null,
        defaultContacts: []
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
        },
        removeBlip(state, key) {
            state.blips.forEach((blip, idx) => {
                if(blip.id === key) {
                    state.blips.splice(idx, 1)
                }
            })
        },
        removeContacts(state, key) {
            state.contacts.forEach((contact, idx) => {
                if(contact.id === key) {
                    state.contacts.splice(idx, 1)
                }
            })
        },
        setDefaultContacts(state, key) {
            state.contacts.forEach((contact) => {
                if(contact.default && state.defaultContacts.length < 3) {
                    state.defaultContacts.push(contact)
                }
            })
        },
        addContact(state, key) {
            state.contacts.push(key)
        }
    }
    ,
    getters: {
        userId: state => {
            return state.user.id
        },
        user: state => {
            return state.user
        },
        blips: state => {
            return state.blips
        },
        contacts: state => {
            return state.contacts
        }
    }
})