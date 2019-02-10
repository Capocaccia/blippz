<template>
    <div>
        <div class="admin-group">
            <div class="blip-admin">
                <button class="blip-create" @click="showBlipForm">
                    Create
                </button>
                <createBlip v-if="showForm">
                </createBlip>
            </div>
            <div class="contact-admin">
                <createContact>
                </createContact>
            </div>
        </div>

        <div class="blip-list">
            <div class="blip"
                 v-for="(blip, idx) in blips" :key="idx">
                {{ blip.start }}
                {{ blip.end }}
                {{ blip.notes }}
            </div>
        </div>

        <div class="contact-list">
            <contactList></contactList>
        </div>
    </div>


</template>

<script>
    import eventService from '../../eventService'
    import { mapState } from 'vuex'
    import createBlip from './createBlip'
    import createContact from '../contacts/createContact'
    import contactList from '../contacts/contactsList'

    export default {
        name: "BlipList",
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
            eventService.blip.getBlips({
                'user_id' : this.$store.getters.userId
            })
            .then((rsp) => {
                this.$store.commit('setBlips', rsp.data.data)
            })
        }
    }
</script>

<style scoped>

</style>