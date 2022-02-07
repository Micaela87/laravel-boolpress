/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

Vue.use(VueRouter);

import AllTvSeries from './components/AllTvSeries.vue';
import SingleTvSeries from './components/SingleTvSeries.vue';
import App from './components/App.vue';
import AddNewSeries from './components/AddNewSeries.vue';
import EditTvSeries from './components/EditTvSeries.vue';

const routes = [
    {
        path: '/',
        component: App,
        name: 'home'
    },
    {
        path: '/tvseries',
        component: AllTvSeries,
        name: 'tvseries'
    },
    {
        path: '/tvseries/:id',
        component: SingleTvSeries,
        name: 'show'
    },
    {
        path: '/addtvseries',
        component: AddNewSeries,
        name: 'add'
    },
    {
        path: '/edittvseries/:id',
        component: EditTvSeries,
        name: 'edit'
    },
];

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    component: { App },
    router
});
