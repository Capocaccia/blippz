<template>
  <div class="home">
    <div class="heading">
      <h1 class="title">
        Thank you for using Blippz!
      </h1>
      <h2 class="title">
         We know you are safe! Hope you had fun!
      </h2>
      <h4>
        Log in below to add another Blip!
      </h4>
      <h5>
      </h5>
    </div>
    <div class="login-wrapper columns is-centered">
      <login>
      </login>
    </div>
  </div>
</template>

<script>

import login from '../components/landing/Login'
import eventService from '../eventService'

export default {
  name: 'MarkSafe',
  data() {
    return {
      register: false,
    }
  },
  components: {
    login
  },
  methods: {
  },
  mounted() {
    let payload = this.$route.fullPath.split('/')
    if(payload[2] && Number.isInteger(parseInt(payload[2]))) {
      eventService.blip.markSafe({
        'id': payload[2]
      })
    }
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
