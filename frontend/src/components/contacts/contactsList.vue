<template>

    <div class="contacts-list" v-if="contacts.length > 0">
        <div class="section">
            <h3 class="title">
                Your Contacts
            </h3>
        </div>
        <div class="grid-container quarters row">
            <h5>
                Name
            </h5>
            <h5>
                Email
            </h5>
            <h5>
                Default
            </h5>
            <h5>
                Manage
            </h5>
        </div>
        <div class="grid-container quarters row" v-for="(contact, idx) in contacts" :key="idx">
            <div class="contact-item">
                {{ contact.firstName }}
                {{ contact.lastName }}
            </div>
            <div class="contact-item">
                {{ contact.email }}
            </div>
            <div class="contact-item">
                {{ contact.default ? 'Yes' : 'No' }}
            </div>
            <div class="button button-no-margin contact-item"
            @click="deleteContact(contact.id)">
                Delete
            </div>
        </div>
    </div>
    <div v-else>
        <h3 class="title">
            Your Contacts
        </h3>
        <h5>
            Go add some contacts!
        </h5>
    </div>
    
</template>

<script>
    import { mapState } from 'vuex'
    import eventService from '../../eventService'
    import toastr from 'toastr'

    export default {
        name: "contactsList",
        data() {
            return {}
        },
        components: {},
        mixins: [],
        props: [],
        methods: {
            deleteContact(contactId) {
                eventService.contact.delete({
                    id: contactId
                })
                .then((rsp) => {
                    if(rsp.data.result === 'success') {
                        this.$store.commit('removeContacts', contactId)
                        toastr.success('Contact deleted.')
                    } else {
                        toastr.error('There was a problem deleting this contact.')
                    }
                })
            }
        },
        computed: mapState([
            'contacts'
        ])
    }
</script>

<style scoped>

    .contact-item {
        margin-right: 1rem;
    }

    .contact-item:last-child {
        margin-right: 0;
    }

</style>