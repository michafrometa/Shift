<template v-if="type==='select'">
    <v-autocomplete
            hide-selected
            :items="items"
            v-model="model"
            :loading="loading"
            :label="label"
            :search-input.sync="search"
    ></v-autocomplete>
</template>
<template v-else-if="type==='autocomplete'">
    <v-autocomplete
            hide-selected
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
        props: {
            value: [Array, String, Number, Object],
            label: {
                type: String,
                required: true
            },
            type: {
                type: String,
                default: 'autocomplete',
                validator: function (value) {
                    return ['autocomplete', 'select'].indexOf(value) !== -1
                }
            },
            method: {
                type: String,
                default: 'post'
            },
            url: {
                type: String
            },
            display: {
                type: String
            },
            track_by: {
                type: String,
                default:
                    "id"
            }
        },
        watch: {
            search(val) {
                /*fixme should not api search when model is the already selected item*/
                val && this.querySelections(val)
            },
            model(val) {
                this.$emit('input', val)
            },
            value(val) {
                if (isNull(val)) {
                    this.model = null
                    this.items = []
                } else {
                    if (typeof val === 'number') {
                        this.model = val
                    } else if (typeof val === 'object') {
                        this.items = [{'value': val[this.track_by], 'text': val[this.display]}]
                        this.model = val[this.track_by]
                    }else if (val ==='None'){
                        this.model = null
                        this.items = []
                    }
                    else{
                        console.log('Another posibility :' + val)
                    }
                }
            }
        }
        ,
        methods: {
            querySelections(v) {
                this.loading = true
                async_call(this.url, {'search': this.search}, this.method)
                    .then((item) => {
                        this.items = (item.data.map(e => {
                                return ({'value': e[this.track_by], 'text': e[this.display]});
                            })
                        );
                        this.loading = false
                    });

            }
        }
    }

</script>

<style scoped>

</style>