<template>

    <div class="contacts-list interior-container">
        <div class="section">
            <h2 class="title">
                Your Contacts
            </h2>
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
                        this.$store.commit('removeContact', contactId)
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

    .contact {

    }

    .contact-item {
        margin-right: 1rem;
    }

    .contact-item:last-child {
        margin-right: 0;
    }


</style>