import Vue from 'vue'
import Router from 'vue-router'
import Landing from './views/Landing.vue'
import Home from './views/Home.vue'
import MarkSafe from './views/MarkSafe.vue'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/markSafe/:id',
      name: 'MarkSafe',
      component: MarkSafe
    },
    {
      path: '/',
      name: 'Landing',
      component: Landing
    },
    {
      path: '/home',
      name: 'Home',
      component: Home
    }
  ]
})
