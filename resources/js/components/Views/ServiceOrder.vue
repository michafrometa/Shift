<template>
    <crud
            :headers="headers"
            :editedItem="editedItem"
            :defaultItem="defaultItem"
            :view_name="view_name"
            @fill_form="fill_form"
            @form_errors="form_errors"
            v-bind:action.sync="crud_action"
    >
        <template v-slot:form_content="{ crud }">
            <v-flex xs12 sm6 md4>

                <custom-select
                        url="api/agreementsBy"
                        v-validate="'required'"
                        v-model="agreement"
                        label="Agreement"
                        display="name"
                        name="agreement"
                >
                </custom-select>
                <span class="text-danger">{{ errors.first('agreement') }}</span>
            </v-flex>
            <v-flex xs12 sm6 md4>
                <custom-select
                        url="api/postcollectionsBy"
                        v-validate="'required'"
                        v-model="post_collection"
                        label="Post Collection"
                        display="description"
                        name="post_collection"
                >
                </custom-select>
                <span class="text-danger">{{ errors.first('post_collection') }}</span>
            </v-flex>
            <v-flex xs12 sm6 md4>
                <custom-select
                        url="api/patientsBy"
                        v-validate="'required'"
                        v-model="patient"
                        label="Patient"
                        display="name"
                        name="patient"

                >
                </custom-select>
                <span class="text-danger">{{ errors.first('patient') }}</span>
            </v-flex>
            <v-flex xs12 sm6 md4>
                <custom-select
                        url="api/doctorsBy"
                        v-validate="'required'"
                        v-model="doctor"
                        label="Doctor"
                        display="name"
                        name="doctor"
                >
                </custom-select>
                <span class="text-danger">{{ errors.first('doctor') }}</span>
            </v-flex>
            <v-flex xs12 sm6 md4>
                <!--todo default selected date has to be TODAY
                todo passed dates should be disabled-->
                <custom-datepicker
                        v-validate="'required'"
                        v-model="editedItem.date"
                        label="Date"
                        name="date"
                ></custom-datepicker>
                <span class="text-danger">{{ errors.first('date') }}</span>

            </v-flex>
        </template>
    </crud>
</template>

<script>
    import CustomSelect from '../Util/Select';
    import CustomDatepicker from '../Util/Datepicker';
    import Crud from '../Util/Crud';

    export default {
        name: "ServiceOrder",
        components: {
            CustomSelect,
            CustomDatepicker,
            Crud
        },
        data: function () {
            return {
                view_name: "service_order",
                crud_action: '',
                headers: [
                    {text: this.$t('messages.agreement'), align: 'left', value: 'agreement.name'},
                    {text: this.$t('messages.post_collection'), value: 'post_collection.description'},
                    {text: this.$t('messages.patient'), value: 'patient.name'},
                    {text: this.$t('messages.doctor'), value: 'doctor.name'},
                    {text: this.$t('messages.date'), value: 'date'},
                    {text: this.$t('messages.actions'), value: 'name', sortable: false, no_td: true}
                ],

                editedItem: {
                    agreement_id: null,
                    post_collection_id: null,
                    patient_id: null,
                    doctor_id: null,
                    date: null
                },
                defaultItem: {
                    agreement_id: null,
                    post_collection_id: null,
                    patient_id: null,
                    doctor_id: null,
                    date: null
                },
                form_select_inputs: {
                    agreements: [],
                    post_collections: [],
                    patients: [],
                    doctors: [],
                }
            }
        },
        computed: {
            agreement: {
                get: function () {
                    if (this.crud_action === 'update') {
                        return this.editedItem.agreement
                    } else {
                        return this.editedItem.agreement_id
                    }
                },
                set: function (id) {
                    this.editedItem.agreement_id = id
                }
            }, post_collection: {
                get: function () {
                    if (this.crud_action === 'update') {
                        return this.editedItem.post_collection
                    } else {
                        return this.editedItem.post_collection_id
                    }
                },
                set: function (id) {
                    this.editedItem.post_collection_id = id
                }
            },
            patient: {
                get: function () {
                    if (this.crud_action === 'update') {
                        return this.editedItem.patient
                    } else {
                        return this.editedItem.patient_id
                    }
                },
                set: function (id) {
                    this.editedItem.patient_id = id
                }
            }, doctor: {
                get: function () {
                    if (this.crud_action === 'update') {
                        return this.editedItem.doctor
                    } else {
                        return this.editedItem.doctor_id
                    }
                },
                set: function (id) {
                    this.editedItem.doctor_id = id
                }
            }
        },
        methods: {
            fill_form(item) {
                this.editedItem = item
            },
            form_errors(response) {
                for (let field in response) {
                    if (response.hasOwnProperty(field)) {
                        this.$validator.errors.add({
                            field: field,
                            msg: response[field][0]
                        });
                    }
                }
            },
        },
    }

</script>

<style scoped>

</style>