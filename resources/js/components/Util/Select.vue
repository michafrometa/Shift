<template v-if="type==='select'">
    <v-autocomplete
            hide-no-data
            hide-selected
            cache-items
            :items="items"
            v-model="model"
            :loading="loading"
            :label="label"
            :search-input.sync="search"
    ></v-autocomplete>
</template>
<template v-else-if="type==='autocomplete'">
    <v-autocomplete
            hide-no-data
            hide-selected
            cache-items
            :items="items"
            :loading="loading"
            v-model="model"
            :label="label"
            :search-input.sync="search"
    ></v-autocomplete>
</template>

<script>
    export default {
        name: "CustomSelect",
        data: function () {
            return {
                search: null,
                loading: false,
                items: [],
                model: null
            }
        },
        mounted() {
            this.model = this.value;
        },
        props: {

            value: [Array, String, Number, Object],
            label: {
                type: String,
                required: true
            },

            type: {
                type: String,
                default: 'select'
            },
            method: {
                type: String,
                default: 'post'
            },
            url: {
                type: String
            },
            label: {
                type: String
            }
        },
        watch: {
            search(val) {
                val && this.querySelections(val)
            },
            model(val){
                this.$emit('input',val)
            }
        },
        methods: {
            querySelections(v) {
                this.loading = true
                async_call(this.url, {'search': this.search}, this.method)
                    .then((item) => {
                        this.items = (item.data.map(e => {
                                return ({'value': e['id'], 'text': e['description']});
                            })
                        );
                        /*   this.$emit('input', (item.data.map(e => {
                                                        return ({'value': e['id'], 'text': e['description']});
                                                    })
                                                ));*/

                        this.loading = false
                    });

            }
        },
    }

</script>

<style scoped>

</style>