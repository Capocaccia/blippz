<template>
  <div class="home">
    <div class="heading">
      <h1 class="title">
        Welcome to Blippz.
      </h1>
      <h2 class="title">
        Nobody plans to get lost. Leave a Blip. Be found.
      </h2>
    </div>
    <div class="login-wrapper columns is-centered">
      <login>
      </login>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import login from '../components/landing/Login'

export default {
  name: 'landing',
  data() {
    return {
      register: false,
    }
  },
  components: {
    login
  },
  methods: {
  }
}
</script>

<style scoped>

  .heading {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
  }

</style>
