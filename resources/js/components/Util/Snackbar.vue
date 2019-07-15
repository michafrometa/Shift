<template>
    <v-snackbar
            v-model="show"
            :bottom="y === 'bottom'"
            :left="x === 'left'"
            :multi-line="mode === 'multi-line'"
            :right="x === 'right'"
            :timeout="timeout"
            :top="y === 'top'"
            :vertical="mode === 'vertical'"
            :color="value.color"
    >
        {{ text }}
        <v-btn
                color="white"
                flat
                @click="this.$emit('input', null)"
        >
            Close
        </v-btn>
    </v-snackbar>
</template>

<script>
    export default {
        name: "CustomSnackbar",
        data() {
            return {
                text: '',
                y: 'top',
                x: 'right',
                mode: 'multi-line',
                timeout: 2000
            }
        },
        watch: {
            value(val) {
                this.text = val.text
            },
        },
        computed: {
            show: {
                get: function () {
                    return this.value.text !== ''
                },
                set: function (text) {
                    this.$emit('input', {
                        text: '',
                        color: 'success'
                    })
                }
            },

        },
        props: {
            value: {
                type: Object,
                default: function () {
                    return {
                        text: '',
                        color: 'success'
                    }
                }
            },
        }
    }
</script>

<style scoped>

</style>