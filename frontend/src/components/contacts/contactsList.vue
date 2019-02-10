<template>

    <div class="contacts-list">
        <div class="contact"
        v-for="(contact, idx) in contacts" key="idx">
            {{ contact.firstName }}
            {{ contact.lastName }}
            {{ contact.email }}
        </div>
    </div>
    
</template>

<script>
    import { mapState } from 'vuex'
    import eventService from '../../eventService'

    export default {
        name: "contactsList",
        data() {
            return {}
        },
        components: {},
        mixins: [],
        props: [],
        methods: {},
        computed: mapState([
            'contacts'
        ]),
        mounted() {
            eventService.contact.getContacts({
                'user_id' : this.$store.getters.userId
            })
            .then((rsp) => {
                this.$store.commit('setContacts', rsp.data.data)
            })
        }
    }
</script>

<style scoped>

</style>