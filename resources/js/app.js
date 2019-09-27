/*jshint esversion: 6 */
/* jshint node: true */

require('./bootstrap');
require('./Escema6/index');


import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);
import {routes} from './routes';
import Vuex from 'vuex';
Vue.use(Vuex);
window.axios = require('axios');
//vue support
import dataStorage from './store/index';
const store = new Vuex.Store(
    dataStorage
);

Vue.component('main-body', require('./components/Main.vue').default);
Vue.component('student-edit', require('./components/student/StudentEdit.vue').default);

// V-form
import { Form, HasError, AlertError } from 'vform';
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
window.Form= Form;

// Sweet alert 2
import swal from 'sweetalert2';
window.swal = swal;
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

window.toast = toast;


const router = new VueRouter({
    routes, // short for `routes: routes`
    // mode: 'hash',//instead of 'history'

});


const app = new Vue({
    el: '#app',
    router,
    store
});
