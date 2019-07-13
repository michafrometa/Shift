<template>
    <div>
        <v-toolbar flat color="white">
            <v-toolbar-title>{{view_name}}</v-toolbar-title>
            <v-divider
                    class="mx-2"
                    inset
                    vertical
            ></v-divider>
            <v-spacer></v-spacer>
            <v-dialog v-model="dialog" max-width="500px">
                <template v-slot:activator="{ on }">
                    <v-btn color="primary" dark class="mb-2" v-on="on">New Item</v-btn>
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
    export default {
        name: "CRUD",
        data: () => ({
            dialog: false,

            items: [],
            editedIndex: -1,

        }),
        props: {
            url: {
                type: String
            },
            view_name: {
                type: String
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
        computed: {
            formTitle() {
                return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
            }
        },

        watch: {
            dialog(val) {
                val || this.close()
            }
        },

        created() {
            this.initialize()
        },

        methods: {
            initialize() {
                async_call('api/'+ this.url)
                    .then((item) => {
                        this.items = item.data
                    });
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

            editItem(item) {
                this.editedIndex = this.items.indexOf(item)

                this.$emit("fill_form", Object.assign({}, item))
                this.dialog = true
            },

            deleteItem(item) {
                const index = this.items.indexOf(item)
                confirm('Are you sure you want to delete this item?') && this.items.splice(index, 1)
            },

            close() {
                this.dialog = false
                setTimeout(() => {
                    this.$emit("fill_form", Object.assign({}, this.defaultItem))
                    this.editedIndex = -1
                }, 300)
            },

            save() {
                if (this.editedIndex > -1) {
                    Object.assign(this.items[this.editedIndex], this.editedItem)
                } else {
                    this.items.push(this.editedItem)
                }
                this.close()
            }
        }
    }
</script>

<style scoped>

</style>