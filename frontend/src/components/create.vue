<template>
    <div>
        <div class="admin-group columns">
            <div class="blip-admin column is-half">
                <button class="blip-create" @click="showBlipForm">
                    Create
                </button>
                <createBlip v-if="showForm">
                </createBlip>
            </div>
            <div class="contact-admin column is-half">
                <createContact>
                </createContact>
            </div>
        </div>
    </div>


</template>

<script>
    import { mapState } from 'vuex'
    import createBlip from './blips/createBlip'
    import createContact from './contacts/createContact'
    import contactList from './contacts/contactsList'

    export default {
        name: "create",
        data() {
            return {
                showForm: false
            }
        },
        components: {
            createBlip,
            createContact,
            contactList
        },
        methods: {
            showBlipForm() {
                this.showForm = true
            }
        },
        computed: mapState([
            'blips'
        ]),
        mounted() {

        }
    }
</script>

<style scoped>

</style>