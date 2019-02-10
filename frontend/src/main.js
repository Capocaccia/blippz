import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from '../store'
import './../node_modules/bulma/css/bulma.css';
import './../node_modules/toastr/toastr.scss'
Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
