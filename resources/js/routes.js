require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

import Home from './components/Layout/Home';

window.Vue.use(VueRouter);

export function createRouter() {
    const router = new VueRouter({
        routes: [{
            path: '/',
            redirect: '/home',
            component: {
                render(c) {
                    return c('router-view')
                }
            },
            children: [
                {
                    path: '/home',
                    name: 'home',
                    props: true,
                    component: Home
                },
            ]
        }]

    })


    return router;
}