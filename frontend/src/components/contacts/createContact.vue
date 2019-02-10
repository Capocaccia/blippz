<template>
    <div>
        <button @click="addContact">
            Add Contact
        </button>
        <div class="add-contact" v-if="showAddForm">
            <input class="input" type="text" placeholder="First Name" v-model="firstName">
            <input class="input" type="text" placeholder="Last Name" v-model="lastName">
            <input class="input" type="text" placeholder="Email" v-model="email">
            <div>
                Is this a default contact?
                <select class="select" name="Default" v-model="isDefault">
                    <option value=""></option>
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
            </div>
            <button class="button" @click="submitContact">Submit</button>
        </div>
    </div>
</template>

<script>
    import eventService from '../../eventService'

    export default {
        name: "createContact",
        data() {
            return {
                showAddForm: false,
                firstName: null,
                lastName: null,
                email: null,
                isDefault: false
            }
        },
        components: {},
        mixins: [],
        props: [],
        methods: {
            addContact: function () {
                this.showAddForm = true
            },
            submitContact: function () {
                let payload = {
                    firstName: this.firstName,
                    lastName: this.lastName,
                    email: this.email,
                    default: this.default,
                    user_id: this.$store.getters.userId
                }

                eventService.contact.saveContact(payload)
            }
        },
        computed: {}
    }
</script>

<style scoped>

</style>