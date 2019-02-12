<template>
  <div class="login">

    <div class="form-container" v-if="showRegistrationForm" >
        <input type="text" placeholder="First Name" v-model="user.firstName">
        <input type="text" placeholder="Last Name" v-model="user.lastName">
        <input type="text" placeholder="Username" v-model="user.userName">
        <input type="email" placeholder="Email" v-model="user.email">
        <input type="password" placeholder="Password" v-model="user.password">
        <button class="button is-primary" @click="submitRegistration">
            Register
        </button>
        <button class="button is-danger" @click="cancelRegistration">
            Cancel
        </button>
    </div>

    <div v-if="!showRegistrationForm " class="form-container">
      <input type="text" placeholder="Username" v-model="username">
      <input type="password" placeholder="Password" v-model="password">
      <button class="button is-primary" @click="login">Login</button>
      <button class="button is-primary" @click="activateRegistration">Register</button>
    </div>

  </div>
</template>

<script>
  import eventService from '../../eventService'
  import toastr from 'toastr'

export default {
  name: 'Login',
  data () {
    return {
        msg: 'Login',
        password: null,
        username: null,
        user: {
            firstName: null,
            lastName: null,
            userName: null,
            email: null,
            password: null
        },
        showRegistrationForm: false,
    }
  },
  components: {},
  methods: {
      activateRegistration () {
          this.showRegistrationForm = true
      },
      cancelRegistration () {
          this.showRegistrationForm = false
      },
      login: function () {
          eventService.auth.userLogin({
            username: this.username,
            password: this.password
          })
          .then((rsp) => {
            if(rsp.data.result === 'success') {
                this.$store.commit('setUser', rsp.data.user)
                this.$router.push(`/${rsp.data.redirect}`)
            }
          })
      },
      emailIsValid: function (email) {
          return /\S+@\S+\.\S+/.test(email)
      },
      passwordIsValid: function(pass) {
          if(this.user.password) {
              let password = this.user.password.split(' ').join('').trim();
              return password.length > 5;
          }

          return false;

      },
      submitRegistration: function () {
          let emptyValue = false

          Object.values(this.user).forEach((val) => val === null ? emptyValue = true : '')

          if(!this.emailIsValid(this.user.email)) {
              toastr.error('The email address is invalid.');
              return;
          }

          if(!this.passwordIsValid(this.user.password)){
              toastr.error('The password is invalid. \n It must be a minimum of 5 characters long with no spaces.');
          }

          if(!emptyValue) {
              eventService.admin.createUser(this.user)
          }
      }
  }
}
</script>

<style scoped>
    .login {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 2rem;
    }
</style>
