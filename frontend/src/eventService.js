import axios from 'axios'

export default {
    auth: {
        userLogin(payload) {
            return axios.post('/auth/login/', payload)
        },
        userAliveAndActive() {
            return axios.post('/auth/check/')
        },
        userLogout() {
            return axios.post('/auth/logout/')
        }
    },
    admin: {
        createUser(payload) {
            return axios.post('/admin/user', payload)
        }
    },
    blip: {
        saveBlip(payload) {
            return axios.post('/blip/save', payload)
        },
        getBlips(payload) {
            return axios.post('/blip/all', payload)
        }
    },
    contact: {
        saveContact(payload) {
            return axios.post('/contact/save', payload)
        }
    }
}