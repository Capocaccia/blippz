<template>
    <div>
        <input type="date" v-model="start">
        <input type="date" v-model="end">
        <input type="text" placeholder="Notes" v-model="notes">
        <button @click="createBlip">Submit Blip</button>
    </div>
    
</template>

<script>
    import eventService from '../../eventService'

    export default {
        name: "createBlip",
        data() {
            return {
                start: null,
                end: null,
                notes: null,
                contacts: '1,5,23'
            }
        },
        components: {},
        mixins: [],
        props: [],
        methods: {
            createBlip: function () {
                let payload = {
                    start: this.start,
                    end: this.end,
                    notes: this.notes,
                    contacts: this.contacts,
                    user_id: this.$store.getters.userId
                }

                eventService.blip.saveBlip(payload)
            }
        },
        computed: {}
    }
</script>

<style scoped>

</style>