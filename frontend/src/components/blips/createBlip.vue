<template>
    <div>
        <h3 class="title">
            Add A Blip
        </h3>
        <div class="add-blip form-container" v-if="contacts.length > 0">
            <h5>
                Start
            </h5>
            <input class="input" type="date" v-model="start">
            <h5>
                End
            </h5>
            <input class="input" type="date" v-model="end">
            <textarea class="input" type="text" placeholder="Tell your contacts where you will be and details about your adventure!" v-model="notes"></textarea>
            <h5>Select Contacts (Maximum of 3)</h5>
            <label class="input-with-label" v-for="(contact, idx) in contacts" :key="idx">
                <input type="checkbox" :value="contact.id" @click="addContact(contact)" :checked="contact.default">
                <span class="label-body">
                    {{ contact.firstName }}
                    {{ contact.lastName }}
                </span>
            </label>
            <button class="button" @click="createBlip">Submit Blip</button>
        </div>
        <div v-else>
            <h5>
                Add contacts first.  Then come back here.
            </h5>
        </div>
    </div>
</template>

<script>
    import eventService from '../../eventService'
    import { mapState } from 'vuex'
    import moment from 'moment'
    import toastr from 'toastr'

    export default {
        name: "createBlip",
        data() {
            return {
                start: null,
                end: null,
                notes: null,
                blipContacts: [],
            }
        },
        computed: mapState([
            'contacts',
            'defaultContacts'
        ]),
        watch: {

        },
        components: {},
        mixins: [],
        props: [],
        methods: {
            createBlip: function () {
                let contacts = this.blipContacts.concat(this.defaultContacts).slice(0,2)

                let payload = {
                    start: this.start,
                    end: this.end,
                    notes: this.notes,
                    contact_1: contacts[0] ? contacts[0].id : null,
                    contact_2: contacts[1] ? contacts[1].id : null,
                    contact_3: contacts[2] ? contacts[2].id : null,
                    user_id: this.$store.getters.userId
                }

                if(!payload.contact_1) {
                    toastr.error('You must have at least one contact.')
                    return;
                }

                if(this.start && this.end && moment(this.start).isBefore(this.end)) {
                    eventService.blip.saveBlip(payload)
                        .then((rsp) => {
                            if(rsp.data.result === 'success') {
                                toastr.success('Blip saved.')
                                eventService.blip.getBlips({
                                    'user_id' : this.$store.getters.userId
                                })
                                .then((rsp) => {
                                    this.$store.commit('setBlips', rsp.data.data)
                                })
                            } else {
                                toastr.error('An error has occurred.')
                            }
                        })
                } else {
                    toastr.error('The end date must be after the start date.')
                }

            },
            addContact: function(id) {
                if(this.blipContacts.indexOf(id) === -1 && this.blipContacts.length <= 3) {
                    this.blipContacts.push(id)
                } else {
                    let toSlice = this.blipContacts.indexOf(id)
                    this.blipContacts.splice(toSlice, 1)
                }
            }
        }
    }
</script>

<style scoped>

    .input-with-label {
        display: flex;
        align-items: center;
    }

    .input-with-label > input {
        width: auto;
        margin: 0;
    }

    h5 {
        margin: 0 0 1rem 0;
    }

</style>