<template>
  <div class="home">
    <div class="section level columns">
        <div class="notification box column is-marginless is-3 is-info has-text-centered">
          View My Blips
        </div>
        <div class="notification box column is-marginless is-3 is-primary has-text-centered">
          Add A Blip
        </div>
        <div class="notification box column is-marginless is-3 is-warning has-text-centered">
          Add A Contact
        </div>
    </div>
  </div>
</template>

<script>
  import blipList from '../components/blips/blipList'
  import create from '../components/create'
  import eventService from '../eventService'

  export default {
    name: 'home',
    data() {
      return {
        register: false,
        login: false
      }
    },
    components: {
      blipList,
      create
    },
    methods: {

    },
    mounted() {
      eventService.blip.getBlips({
        'user_id' : this.$store.getters.userId
      })
      .then((rsp) => {
        this.$store.commit('setBlips', rsp.data.data)
      })

      eventService.contact.getContacts({
        'user_id' : this.$store.getters.userId
      })
      .then((rsp) => {
        this.$store.commit('setContacts', rsp.data.data)
      })
    }
  }
</script>
