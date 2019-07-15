<template>


    <v-menu
            v-model="menu2"
            :close-on-content-click="false"
            :nudge-right="40"
            lazy
            transition="scale-transition"
            offset-y
            full-width
            min-width="290px"
    >
        <template v-slot:activator="{ on }">
            <v-text-field
                    v-model="date"
                    :label="label"
                    prepend-icon="event"
                    readonly
                    v-on="on"
            ></v-text-field>
        </template>

        <v-date-picker v-model="date" @input="menu2 = false"></v-date-picker>
    </v-menu>

</template>

<script>
    export default {
        name: "CustomDatepicker",
        data: function () {
            return {
                date: null,
                search: null,
                loading: false,
                items: [],
                model: null,
                modal: false,
                menu2: false
            }
        },
        props: {
            value: [Array, String, Number, Object],
            label: [String]
        }
        ,
        watch: {
            date(val) {
                this.$emit('input', val)
            }
            ,
            value(val) {

                this.date = val ? val : new Date().toISOString().substr(0, 10)
            }
        }
        ,

    }
</script>

<style scoped>

</style>