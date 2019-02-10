<template>
    <div class="blip-list">
        <div class="blip is-flex is-spaced column is-full box"
             v-for="(blip, idx) in blips" :key="idx">
            <div>
                <div class="title">Start</div>
                {{ blip.start }}
            </div>
            <div>
                <div class="title">End</div>
                {{ blip.end }}
            </div>
            <div>
                <div class="title">Notes</div>
                {{ blip.notes }}
            </div>
            <div class="contacts-list">
                <div class="title">Contacts</div>
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
    import { mapState } from 'vuex'

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
         justify-content: space-around;
     }
    .contacts-list {
        display: flex;
        flex-direction: column;
    }
</style>