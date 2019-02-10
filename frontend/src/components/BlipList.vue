<template>
    <div class="blip-list">
        <div class="blip">

        </div>
    </div>
</template>

<script>
    import eventService from '../eventService'

    export default {
        name: "BlipList",
        data() {
            return {}
        },
        components: {},
        mixins: [],
        props: [],
        methods: {},
        computed: {},
        mounted() {
            eventService.blip.getBlips(this.$store.getters.userId)
                .then((rsp) => {
                    this.$store.commit('setBlips', rsp.data.data)
                })
        }
    }
</script>

<style scoped>

</style>