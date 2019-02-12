<template>
    <div class="interior-container">
        <h2 class="title">
            Add A Blip
        </h2>
        <div class="add-blip form-container">
            <input class="input" type="date" v-model="start">
            <input class="input" type="date" v-model="end">
            <textarea class="input" type="text" placeholder="Notes" v-model="notes"></textarea>
            <h5>Select Contacts</h5>
            <label class="input-with-label" v-for="(contact, idx) in contacts" :key="idx">
                <input type="checkbox" :value="contact.id" @click="addContact(contact.id)">
                <span class="label-body">
                    {{ contact.firstName }}
                    {{ contact.lastName }}
                </span>
            </label>
            <button class="button" @click="createBlip">Submit Blip</button>
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
            'contacts'
        ]),
        components: {},
        mixins: [],
        props: [],
        methods: {
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