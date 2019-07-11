require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';


window.Vue.use(VueRouter);

export function createRouter() {
    const router = new VueRouter({
        routes: []
    })


    return router;
}