<template>
  <div class="home">
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
