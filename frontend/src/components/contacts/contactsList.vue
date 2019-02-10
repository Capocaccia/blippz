<template>

    <div class="contacts-list section">
        <div>
            <h2 class="title">
                Your Contacts
            </h2>
        </div>
        <div class="contact is-flex is-spaced is-full box"
        v-for="(contact, idx) in contacts" :key="idx">
            {{ contact.firstName }}
            {{ contact.lastName }}
            {{ contact.email }}
        </div>
    </div>
    
</template>

<script>
    import { mapState } from 'vuex'

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
        ])
    }
</script>

<style scoped>

</style>