<template>
    <CRUD
            :url="url"
            :headers="headers"
            :editedItem="editedItem"
            :defaultItem="defaultItem"
            :view_name="view_name"
            @fill_form="fill_form"
    >
        <template v-slot:form_content="{ crud }">
            <v-flex xs12 sm6 md4>

                <custom-select
                        url="api/getagreementsBy"
                        v-model="editedItem.agreement"
                        label="Agreement"
                        type="autocomplete"
                >
                </custom-select>

            </v-flex>
            <v-flex xs12 sm6 md4>
                <v-text-field v-model="editedItem.post_collection" label="Post Collection"></v-text-field>
                <v-autocomplete
                        hide-no-data
                        hide-selected
                        :items="form_select_inputs.post_collections"
                        v-model="editedItem.agreement"
                        label="Post Collection"
                        :search-input.sync="search"
                ></v-autocomplete>
            </v-flex>
            <v-flex xs12 sm6 md4>
                <v-text-field v-model="editedItem.patient" label="Patient"></v-text-field>
            </v-flex>
            <v-flex xs12 sm6 md4>
                <v-text-field v-model="editedItem.doctor" label="Doctor"></v-text-field>
            </v-flex>
            <v-flex xs12 sm6 md4>
                <v-text-field v-model="editedItem.date" label="Date"></v-text-field>
            </v-flex>
        </template>
    </CRUD>
</template>

<script>
    import CustomSelect from '../Util/Select';
    import CRUD from '../Util/CRUD';

    export default {
        name: "ServiceOrder",
        components: {
            CustomSelect,
            CRUD
        },
        data: function () {
            return {
                url: 'service_order',
                view_name: "Service orders",

                headers: [
                    {
                        text: 'Agreement',
                        align: 'left',
                        value: 'agreement.description'
                    },
                    {text: 'Post Collection', value: 'post_collection.description'},
                    {text: 'Patient', value: 'patient.name'},
                    {text: 'Doctor', value: 'doctor.name'},
                    {text: 'Date', value: 'date'},
                    {text: 'Actions', value: 'name', sortable: false, no_td: true}
                ],

                editedItem: {
                    agreement: 'None',
                    post_collection: 0,
                    patient: 0,
                    doctor: 0,
                    date: 0
                },
                defaultItem: {
                    agreement: 'None',
                    post_collection: 0,
                    patient: 0,
                    doctor: 0,
                    date: 0
                },
                form_select_inputs: {
                    agreements: [],
                    post_collections: [],
                    patients: [],
                    doctors: [],
                }
            }
        },

        methods: {
            fill_form(item) {
                this.editedItem = item
            },
        },

    }

</script>

<style scoped>

</style>