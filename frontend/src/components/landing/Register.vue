<template>
  <div class="register-form">
    <input type="text" placeholder="First Name" v-model="user.firstName">
    <input type="text" placeholder="Last Name" v-model="user.lastName">
    <input type="text" placeholder="Username" v-model="user.userName">
    <input type="text" placeholder="Email" v-model="user.email">
    <input type="text" placeholder="Password" v-model="user.password">
    <button class="submit" @click="submitRegistration">
      Submit
    </button>
  </div>
</template>

<script>
import eventService from '../../eventService'

export default {
  name: 'Register',
  data () {
    return {
      msg: 'Register',
      user: {
        firstName: null,
        lastName: null,
        userName: null,
        email: null,
        password: null
      }
    }
  },
  methods: {
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

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
