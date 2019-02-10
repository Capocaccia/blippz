<template>
    <div>
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
</template>

<script>
    import eventService from '../../eventService'
    import { mapState } from 'vuex'

    export default {
        name: "createBlip",
        data() {
            return {
                start: null,
                end: null,
                notes: null,
                blipContacts: []
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

                eventService.blip.saveBlip(payload)
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