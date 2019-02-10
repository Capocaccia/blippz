import Vue from 'vue'
import Router from 'vue-router'
import Landing from './views/Landing.vue'
import Home from './views/Home.vue'
import Contacts from './views/Contacts'
import Blips from './views/Blips'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Landing',
      component: Landing
    },
    {
      path: '/home',
      name: 'Home',
      component: Home
    },
    {
      path: '/contacts',
      name: 'Contacts',
      component: Contacts
    },
    {
      path: '/blips',
      name: 'Blips',
      component: Blips
    }
  ]
})
