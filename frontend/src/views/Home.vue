<template>
  <div class="home">
    <img src="../assets/logo.png">

    <blipList>
    </blipList>

  </div>
</template>

<script>
  import blipList from '../components/BlipList'

  export default {
    name: 'home',
    data() {
      return {
        register: false,
        login: false
      }
    },
    components: {
      blipList
    },
    methods: {

    }
  }
</script>
