require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

import Home from './components/Layout/Home';
import ServiceOrder from './components/Views/ServiceOrder';

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
                    component: Home,
                    children: [
                        {
                            path: '/service_order',
                            name: 'service_order',
                            component: ServiceOrder
                        },
                    ]
                },
            ]
        }]

    })


    return router;
}