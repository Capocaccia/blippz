<template>
  <div class="home">
    <img src="../assets/logo.png">

    <div class="login-wrapper">
      <button class="button" @click="activateLogin">
        Login
      </button>
      <login v-if="login"></login>
    </div>

    <div class="register-wrapper">
      <button class="button" @click="activateRegistration">
        Register
      </button>
      <register v-if="register"></register>
    </div>

  </div>
</template>

<script>
// @ is an alias to /src
import login from '../components/landing/Login'
import register from '../components/landing/Register'

export default {
  name: 'home',
  data() {
    return {
      register: false,
      login: false
    }
  },
  components: {
    login,
    register
  },
  methods: {
    activateRegistration: function() {
      this.login = false;
      this.register = true
    },
    activateLogin: function() {
      this.login = true;
      this.register = false
    }
  }
}
</script>
