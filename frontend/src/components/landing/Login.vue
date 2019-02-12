<template>
  <div class="login">

    <div class="register" v-if="showRegistrationForm && !cancelRegistrationForm">
        <input type="text" placeholder="First Name" v-model="user.firstName">
        <input type="text" placeholder="Last Name" v-model="user.lastName">
        <input type="text" placeholder="Username" v-model="user.userName">
        <input type="text" placeholder="Email" v-model="user.email">
        <input type="text" placeholder="Password" v-model="user.password">
        <button class="button is-primary" @click="submitRegistration">
            Register
        </button>
        <button class="button is-danger" @click="cancelRegistration">
            Cancel
        </button>
    </div>

    <div v-if="!showRegistrationForm ">
      <input type="text" placeholder="Username" v-model="username">
      <input type="text" placeholder="Password" v-model="password">
      <button class="button is-primary" @click="login">Login</button>
        - OR -
        <button class="button is-primary" @click="activateRegistration">Register</button>
    </div>

  </div>
</template>

<script>
  import eventService from '../../eventService'

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
      submitRegistration: function () {
          let emptyValue = false

          Object.values(this.user).forEach((val) => val === null ? emptyValue = true : '')

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
    background-color: rgba(5,56,107);
  }

  input {
    margin-bottom: 1rem;
    width: 100%;
    outline: none;
    background: transparent;
    padding: .25rem;
    border-style: inherit;
    border-bottom: 2px solid grey;
    font-size: 1.25rem;
    color: white;
  }
</style>
