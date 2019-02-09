import Vue from 'vue'
import Router from 'vue-router'
import Landing from './views/Landing.vue'
import About from './views/About.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'home',
      component: Landing
    },
    {
      path: '/about',
      name: 'about',
      component: About
    }
  ]
})
