import es from "./locale/es";
import Locales from '../assets/js/vue-i18n-locales.generated';
import Vuex from 'vuex';
require('./bootstrap');
import axios from "axios";
import vuexI18n from 'vuex-i18n';
window.Vue = require('vue');
import Vuetify from 'vuetify';
import VeeValidate, {Validator} from 'vee-validate';
import App from './components/App'
import {createRouter} from './routes'



window.Vue.use(Vuex)
const store = new Vuex.Store();
window.Vue.use(vuexI18n.plugin,store);
window.Vue.i18n.add('en', Locales.en);
window.Vue.i18n.add('es', Locales.es);
window.Vue.i18n.set('en');


window.Vue.use(VeeValidate, {events: 'change|custom'});
window.Vue.use(Vuetify);
Validator.localize('es', es);


Vue.component('App', require('./components/App.vue').default);

const router = createRouter();

window.isNull = function ($value) {
    return ($value === undefined) || ($value === null) || ($value === "") || ($value === '')
},

    window.async_call = function (url, data, method = 'get') {
        return axios({
            url: url,
            data: data,
            method: method
        })
    }

const app = new Vue({
    store,
    el: '#app',
    components: {App},
    router,
    mounted() {
        this.$validator.localize('es', es);
    },
});
