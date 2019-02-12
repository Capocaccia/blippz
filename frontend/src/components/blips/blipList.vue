<template>
    <div class="blip-list interior-container">
        <div>
            <h2 class="title">
                Your Blips
            </h2>
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
                <span v-if="blip.contact_1">
                    {{blip.first_contact.firstName}}
                    {{blip.first_contact.lastName}}
                    {{blip.first_contact.email}}
                </span>
                <span v-if="blip.contact_2">
                    {{blip.second_contact.firstName}}
                    {{blip.second_contact.lastName}}
                    {{blip.second_contact.email}}
                </span>
                <span v-if="blip.contact_3">
                    {{blip.third_contact.firstName}}
                    {{blip.third_contact.lastName}}
                    {{blip.third_contact.email}}
                </span>
            </div>
            <div>
                <div class="button button-no-margin"
                @click="deleteBlip(blip.id)">
                    Delete
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex'
    import eventService from '../../eventService'

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
                .then((rsp) => {
                    console.log(rsp)
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