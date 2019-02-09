<template>
  <div class="hello">
    <input type="text" placeholder="Username" v-model="username">
    <input type="text" placeholder="Password" v-model="password">
    <button class="login" @click="login">Submit</button>
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
      username: null
    }
  },
  methods: {
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
