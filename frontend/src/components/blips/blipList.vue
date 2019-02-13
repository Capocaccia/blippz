<template>
    <div class="blip-list interior-container" v-if="blips.length > 0">
        <div>
            <h3 class="title">
                Your Blips
            </h3>
        </div>
        <div class="grid-container fifths row">
            <h5>
                Start
            </h5>
            <h5>
                End
            </h5>
            <h5>
                Notes
            </h5>
            <h5>
                Contacts
            </h5>
            <h5>
                Manage
            </h5>
        </div>
        <div class="grid-container fifths row"
             v-for="(blip, idx) in blips" :key="idx">
            <div>
                {{ blip.start }}
            </div>
            <div>
                {{ blip.end }}
            </div>
            <div>
                {{ blip.notes }}
            </div>
            <div>
                <div class="blip_contact" v-if="blip.contact_1">
                    <div class="name">
                        {{blip.first_contact.firstName}} {{blip.first_contact.lastName}}
                    </div>
                    <div class="email">
                        {{blip.first_contact.email}}
                    </div>
                </div>
                <div class="blip_contact" v-if="blip.contact_2">
                    <div class="name">
                        {{blip.second_contact.firstName}} {{blip.second_contact.lastName}}
                    </div>
                    <div class="email">
                        {{blip.second_contact.email}}
                    </div>
                </div>
                <div class="blip_contact" v-if="blip.contact_3">
                    <div class="name">
                        {{blip.third_contact.firstName}} {{blip.third_contact.lastName}}
                    </div>
                    <div class="email">
                        {{blip.third_contact.email}}
                    </div>
                </div>
            </div>
            <div>
                <div class="button button-no-margin"
                @click="deleteBlip(blip.id)">
                    Delete
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        <div>
            <h3 class="title">
                Your Blips
            </h3>
            <h5>
                You havent added any Blips yet. Click Add A Blip to get started.
            </h5>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex'
    import eventService from '../../eventService'
    import toastr from 'toastr'

    export default {
        name: "blipList",
        data() {
            return {}
        },
        components: {},
        mixins: [],
        props: [],
        methods: {
            deleteBlip(blipId) {
                eventService.blip.delete({
                    id: blipId
                })
                .then(() => {
                    this.$store.commit('removeBlip', blipId)
                    toastr.success('Blip deleted.')
                })
            }
        },
        computed: mapState([
            'blips'
        ])
    }
</script>

<style scoped>


</style>