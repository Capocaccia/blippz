<template>
    <div class="interior-container">
        <h2 class="title">
            Add A Contact
        </h2>
        <div class="add-contact form-container">
            <input type="text" placeholder="First Name" v-model="firstName">
            <input type="text" placeholder="Last Name" v-model="lastName">
            <input type="text" placeholder="Email" v-model="email">
            <div>
                Is this a default contact?
                <select class="select" name="Default" v-model="isDefault">
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
                    default: this.default !== false,
                    user_id: this.$store.getters.userId
                }

                let isReadyToSubmit = true

                Object.values(payload).forEach((value) => {
                    value === null ? isReadyToSubmit = false : ''
                })

                if(isReadyToSubmit) {
                    eventService.contact.saveContact(payload)
                        .then((rsp) => {
                            if(rsp.msg === 'success') {
                                toastr.success('Contact saved!')
                            } else {
                                toastr.error('An error has occurred.')
                            }
                        })
                } else {
                    toastr.error('Please fill out all fields')
                }
            }
        },
        computed: {}
    }
</script>

<style >

</style>