<template>
    <div>
        <input type="date" v-model="start">
        <input type="date" v-model="end">
        <input type="text" placeholder="Notes" v-model="notes">
        <button @click="createBlip">Submit Blip</button>
    </div>
    
</template>

<script>
    export default {
        name: "createBlip",
        data() {
            return {}
        },
        components: {},
        mixins: [],
        props: [],
        methods: {},
        computed: {}
    }
</script>

<style scoped>

</style>