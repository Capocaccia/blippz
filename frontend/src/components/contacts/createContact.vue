<template>
    <div>
        <button @click="addContact">
            Add Contact
        </button>
        <div class="add-contact" v-if="showAddForm">
            <input type="text" placeholder="First Name" v-model="firstName">
            <input type="text" placeholder="Last Name" v-model="lastName">
            <input type="text" placeholder="Email" v-model="email">
            <select name="Default" v-model="isDefault">
                <option value=""></option>
                <option value="true">Yes</option>
                <option value="false">No</option>
            </select>
            <button @click="submitContact">Submit</button>
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