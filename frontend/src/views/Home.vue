<template>
  <div class="home">
    <div class="grid-container quarters">
        <div class="navbar-item"
            @click="toggleView('viewBlipsToggle')">
            View My Blips
        </div>
        <div class="navbar-item"
             @click="toggleView('addBlipToggle')">
            Add A Blip
        </div>
        <div class="navbar-item"
             @click="toggleView('viewContactsToggle')">
            View Contacts
        </div>
        <div class="navbar-item"
             @click="toggleView('addContactToggle')">
            Add A Contact
        </div>
    </div>
    <div>
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
    }

    .navbar-item {
        position: relative;
    }
    .navbar-item:after {
        position: absolute;
        bottom: 0;
        width: 100%;
        left: 0;
        content: '';
        transition: 0.3s;
        height: 1px;
    }

    .navbar-item:hover::after {
        background-color: black;
    }

</style>
