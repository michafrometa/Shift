<template>
    <div>
        <custom-snackbar
                v-model="snackbar"
        >
        </custom-snackbar>
        <v-toolbar flat color="white">
            <v-toolbar-title>{{ $t('messages.' + view_name) }}</v-toolbar-title>
            <v-divider
                    class="mx-2"
                    inset
                    vertical
            ></v-divider>
            <v-spacer></v-spacer>
            <v-text-field
                    v-model="search"
                    append-icon="search"
                    :label="$t('messages.search')"
                    single-line
                    hide-details
            ></v-text-field>
            <v-spacer></v-spacer>
            <v-dialog v-model="dialog" max-width="500px">
                <template v-slot:activator="{ on }">
                    <v-btn color="primary" dark class="mb-2" v-on="on">{{ $t('messages.new_item') }}</v-btn>
                </template>
                <v-card>
                    <v-card-title>
                        <span class="headline">{{ formTitle }}</span>
                    </v-card-title>

                    <v-card-text>
                        <v-container grid-list-md>
                            <v-layout wrap>
                                <slot name="form_content" v-bind:crud="this"></slot>
                            </v-layout>
                        </v-container>
                    </v-card-text>

                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="blue darken-1" flat @click="close">Cancel</v-btn>
                        <v-btn color="blue darken-1" flat @click="save">Save</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-toolbar>
        <v-data-table
                :headers="headers"
                :items="items"
                :search="search"
                class="elevation-1"
        >
            <template v-slot:items="props">
                <td v-for="header in headers" v-if="!header.no_td">{{string_to_array(header.value,props.item)}}</td>

                <td class="justify-center layout px-0">
                    <v-icon
                            small
                            class="mr-2"
                            @click="editItem(props.item)"
                    >
                        edit
                    </v-icon>
                    <v-icon
                            small
                            @click="deleteItem(props.item)"
                    >
                        delete
                    </v-icon>
                </td>
            </template>
            <template v-slot:no-data>
                <v-btn color="primary" @click="initialize">Reset</v-btn>
            </template>
        </v-data-table>
    </div>

</template>

<script>
    import CustomSnackbar from './Snackbar'

    export default {
        inject: ['$validator'],
        name: "Crud",
        components: {
            CustomSnackbar
        },
        data: () => ({
            snackbar: {
                text: '',
                color: 'success'
            },
            search: '',
            dialog: false,
            editedIndex: -1,
            action: '',
            items: []
        }),
        computed: {
            real_url() {
                return this.url ? this.url : 'api/' + this.view_name
            },
            formTitle() {
                return this.editedIndex === -1 ? this.$t('messages.new_item') : this.$t('messages.edit_item')
            }
        },
        created() {
            this.initialize()
        },
        props: {
            url: {
                type: String
            },
            view_name: {
                type: String,
                required: true
            },
            headers: {
                type: Array,
                required: true
            },
            editedItem: {
                type: Object,
                required: true
            },
            defaultItem: {
                type: Object,
                required: true
            }
        },
        methods: {
            editItem(item) {
                this.editedIndex = this.items.indexOf(item)
                this.editedIndex === -1 ? this.set_action("store") : this.set_action("update")
                this.$emit("fill_form", Object.assign({}, item))
                this.dialog = true
            },
            deleteItem(item) {
                this.set_action("delete")
                const index = this.items.indexOf(item)
                confirm(this.$t('messages.sure_to_delete')) &&

                async_call(this.real_url + '/' + item.id, {id: item.id}, 'delete')
                    .then((item) => {
                        this.notify(item.data)
                        this.initialize()
                    }).catch((err) => {
                    this.notify(err.response.data, 'error')
                });
            },

            close() {
                this.dialog = false
                this.$validator.errors.clear();
                setTimeout(() => {
                    this.$emit("fill_form", Object.assign({}, this.defaultItem))
                    this.editedIndex = -1
                }, 300)
            },
            notify(text, color = 'success') {
                this.snackbar = {
                    text: text,
                    color: color
                }
            },
            save() {
                this.$validator.validate().then(result => {
                    if (result) {
                        if (this.editedIndex > -1) {
                            async_call(this.real_url + '/' + this.editedItem.id, this.editedItem, 'put')
                                .then((item) => {

                                    this.notify(item.data)
                                    this.initialize()
                                    this.close()
                                }).catch((err) => {
                                this.notify(err.response.data, 'error')
                            });
                        } else {
                            async_call(this.real_url, this.editedItem, 'post')
                                .then((item) => {
                                    this.notify(item.data)
                                    this.initialize()
                                    this.close()
                                }).catch((err) => {
                                this.notify(err.response.data, 'error')
                            });
                        }
                    } else
                        this.$emit("form_errors", (result.response !== undefined) ? result.response.data.errors : result);
                })
            },
            set_action(action) {
                this.action = action
                this.$emit('update:action', action)
            },
            /*
          Solving issue handling nested object referencing by string
          https://stackoverflow.com/a/23149700/10326123*/

            string_to_array(pathString, jsonObj) {
                var pathArray = pathString.split(".");
                var grandchild = jsonObj;
                $.each(pathArray, function (i, item) {
                    grandchild = grandchild[item];
                });
                return grandchild;
            },
            initialize() {
                async_call(this.real_url)
                    .then((item) => {
                        this.items = item.data
                    })
                    .catch((err) => {
                        this.notify(err.response.data, 'error')
                    });
            }
        }
    }
</script>

<style scoped>

</style>