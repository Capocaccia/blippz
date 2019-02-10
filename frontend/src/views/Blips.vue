<template>
  <div class="home">
    <createBlip>
    </createBlip>
    <blipList>
    </blipList>
  </div>
</template>

<script>
  import blipList from '../components/blips/blipList'
  import createBlip from '../components/blips/createBlip'

  export default {
    name: 'Contacts',
    data() {
      return {

      }
    },
    components: {
      blipList,
      createBlip
    },
    methods: {

    }
  }
</script>
