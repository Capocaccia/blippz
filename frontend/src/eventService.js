import axios from 'axios'

const apiClient = axios.create({
    baseURL: 'http://blippz.test'
})

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
    }
}