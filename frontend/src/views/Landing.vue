<template>
  <div class="home">
    <div class="heading">
      <h1 class="title">
        Welcome to Blippz.
      </h1>
      <h2 class="title">
        Rule #1 of survival: Inform others of your plans. Let Blippz handle that.
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
    color:rgb(237,245,225);
  }

</style>
