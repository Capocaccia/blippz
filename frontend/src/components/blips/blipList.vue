<template>
    <div class="blip-list interior-container">
        <div>
            <h2 class="title">
                Your Blips
            </h2>
        </div>
        <div class="grid-container full blip asdadsa"
             v-for="(blip, idx) in blips" :key="idx">
            <div>
                <h5>
                    Start
                </h5>
                {{ blip.start }}
            </div>
            <div>
                <h5>
                    End
                </h5>
                {{ blip.end }}
            </div>
            <div>
                <h5>
                    Notes
                </h5>
                {{ blip.notes }}
            </div>
            <div>
                <h5>Contacts</h5>
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
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex'

    export default {
        name: "blipList",
        data() {
            return {}
        },
        components: {},
        mixins: [],
        props: [],
        methods: {},
        computed: mapState([
            'blips'
        ])
    }
</script>

<style scoped>

    .blip {
        display: flex;
        justify-content: space-around;
    }

</style>