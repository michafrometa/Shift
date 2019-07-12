<template>
    <v-app>
        <v-content transition="slide-x-transition">
            <router-view></router-view>
        </v-content>
    </v-app>
</template>

<script>
    import Home from "./Layout/Home";
    export default {
        name: 'app',
        components: {Home}
    }

</script>

<style>
</style>