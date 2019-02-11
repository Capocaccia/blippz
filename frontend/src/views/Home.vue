<template>
  <div class="home">
    <div class="section level columns">
        <div class="notification box column is-marginless is-3 is-info has-text-centered"
            @click="toggleView('viewBlipsToggle')">
            View My Blips
        </div>
        <div class="notification box column is-marginless is-3 is-primary has-text-centered"
             @click="toggleView('addBlipToggle')">
            Add A Blip
        </div>
        <div class="notification box column is-marginless is-3 is-info has-text-centered"
             @click="toggleView('viewContactsToggle')">
            View Contacts
        </div>
        <div class="notification box column is-marginless is-3 is-primary has-text-centered"
             @click="toggleView('addContactToggle')">
            Add A Contact
        </div>

    </div>
    <div class="section level columns">
        <blipList v-if="toggles.viewBlipsToggle">
        </blipList>
        <createBlip v-if="toggles.addBlipToggle">
        </createBlip>
        <createContact v-if="toggles.addContactToggle">
        </createContact>
        <contactList v-if="toggles.viewContactsToggle">
        </contactList>
    </div>
  </div>
</template>

<script>
  import blipList from '../components/blips/blipList'
  import createBlip from '../components/blips/createBlip'
  import contactList from '../components/contacts/contactsList'
  import createContact from '../components/contacts/createContact'
  import create from '../components/create'
  import eventService from '../eventService'

  export default {
    name: 'home',
    data() {
      return {
        register: false,
        login: false,
        toggles: {
            viewBlipsToggle: false,
            addBlipToggle: false,
            addContactToggle: false,
            viewContactsToggle: false,
        }
      }
    },
    components: {
      blipList,
      create,
      createBlip,
      contactList,
      createContact
    },
    methods: {
        toggleView(view) {
            Object.keys(this.toggles).forEach((key) => {
                key === view ? this.toggles[key] = true : this.toggles[key] = false
            })
        }
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
