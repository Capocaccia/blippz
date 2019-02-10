<template>
    <div class="section">
        <button class="button" @click="addBlip">
            Add Blip
        </button>
        <div class="add-blip" v-if="showForm">
            <input class="input" type="date" v-model="start">
            <input class="input" type="date" v-model="end">
            <input class="input" type="text" placeholder="Notes" v-model="notes">
            <button class="button" @click="createBlip">Submit Blip</button>
            <ul>
                <li v-for="(contact, idx) in contacts" :key="idx">
                    {{ contact.firstName }}
                    {{ contact.lastName }}
                    <input type="checkbox" :value="contact.id" @click="addContact(contact.id)">
                </li>
            </ul>
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
                showForm: false
            }
        },
        computed: mapState([
            'contacts'
        ]),
        components: {},
        mixins: [],
        props: [],
        methods: {
            addBlip: function () {
                this.showForm = !this.showForm
            },
            createBlip: function () {
                let payload = {
                    start: this.start,
                    end: this.end,
                    notes: this.notes,
                    contact_1: this.blipContacts[0],
                    contact_2: this.blipContacts[1],
                    contact_3: this.blipContacts[2],
                    user_id: this.$store.getters.userId
                }

                if(this.start && this.end && moment(this.start).isBefore(this.end)) {
                    eventService.blip.saveBlip(payload)
                        .then((rsp) => {
                            if(rsp.msg === 'success') {
                                toastr.success('Blip saved.')
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

</style>