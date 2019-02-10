<template>

    <div class="contacts-list">
        <div class="contact"
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