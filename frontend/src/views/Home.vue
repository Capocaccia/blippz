<template>
  <div class="home">
    <div class="section level navbar">
        <div class="notification navbar-item column is-marginless is-2 has-text-centered"
            @click="toggleView('viewBlipsToggle')">
            View My Blips
        </div>
        <div class="notification navbar-item column is-marginless is-2 has-text-centered"
             @click="toggleView('addBlipToggle')">
            Add A Blip
        </div>
        <div class="notification navbar-item column is-marginless is-2 has-text-centered"
             @click="toggleView('viewContactsToggle')">
            View Contacts
        </div>
        <div class="notification navbar-item column is-marginless is-2 has-text-centered"
             @click="toggleView('addContactToggle')">
            Add A Contact
        </div>
    </div>
    <div class="section level container">
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

<style scope>
    .navbar {
        display: flex;
        justify-content: space-around;
        background-color: rgba(5,56,107, 1);
        color: rgb(237,245,225);
    }

    .navbar-item {
        background-color: rgba(5,56,107, 1);
        color: rgb(237,245,225);
        padding: 2rem 2rem;
        width: 100%;
        text-align: center;
    }

    .navbar-item:hover {
        cursor: pointer;
        background-color: rgb(55,150,131);
        transition: 0.3s;
    }

    /*rgba(5,56,107);*/
    /*rgb(55,150,131)*/
    /*rgb(92,219,149)*/
    /*rgb(142,228,175)*/
    /*rgb(237,245,225)*/

</style>
