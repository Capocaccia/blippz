import axios from 'axios'

export default {
    auth: {
        userLogin(payload) {
            return axios.post('/auth/login/', payload)
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
        },
        delete(payload) {
            return axios.post('/blip/delete', payload)
        }
    },
    contact: {
        saveContact(payload) {
            return axios.post('/contact/save', payload)
        },
        getContacts(payload) {
            return axios.post('/contact/all', payload)
        },
        delete(payload) {
            return axios.post('/contact/delete', payload)
        }
    }
}