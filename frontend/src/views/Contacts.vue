<template>
  <div class="home">
    <createContact>
    </createContact>
    <contactList>
    </contactList>
  </div>
</template>

<script>
  import contactList from '../components/contacts/contactsList'
  import createContact from '../components/contacts/createContact'

  export default {
    name: 'Contacts',
    data() {
      return {

      }
    },
    components: {
      contactList,
      createContact
    },
    methods: {

    }
  }
</script>
