<template>
    <div>
        <h3 class="title">
            Add A Contact
        </h3>
        <div class="add-contact form-container">
            <input type="text" placeholder="First Name" v-model="firstName">
            <input type="text" placeholder="Last Name" v-model="lastName">
            <input type="text" placeholder="Email" v-model="email">
            <div>
                Is this a default contact?
                <select class="select" name="Default" v-model="isDefault">
                    <option value="true">
                        Yes
                    </option>
                    <option value="false">
                        No
                    </option>
                </select>
            </div>
            <button class="button" @click="submitContact">Submit Contact</button>
        </div>
    </div>
</template>

<script>
    import eventService from '../../eventService'
    import toastr from 'toastr'

    export default {
        name: "createContact",
        data() {
            return {
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
            submitContact: function () {
                let payload = {
                    firstName: this.firstName,
                    lastName: this.lastName,
                    email: this.email,
                    default: this.isDefault === 'true',
                    user_id: this.$store.getters.userId
                }

                if(!this.emailIsValid(this.email)) {
                    toastr.error('The email address is invalid');
                    return;
                }

                let isReadyToSubmit = true

                Object.values(payload).forEach((value) => {
                    value === null ? isReadyToSubmit = false : ''
                })

                if(isReadyToSubmit) {
                    eventService.contact.saveContact(payload)
                        .then((rsp) => {
                            if(rsp.data.result === 'success') {
                                this.$store.commit('addContact', rsp.data.user)
                                this.$store.commit('setDefaultContacts')
                                toastr.success('Contact saved!')
                                this.blankForm()
                            } else {
                                toastr.error('An error has occurred.')
                            }
                        })
                } else {
                    toastr.error('Please fill out all fields')
                }
            },
            blankForm: function () {
              this.firstName = null
              this.lastName = null
              this.email = null
              this.isDefault = null
            },
            emailIsValid: function (email) {
                return /\S+@\S+\.\S+/.test(email)
            }
        },
        computed: {}
    }
</script>

<style >

</style>