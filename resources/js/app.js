/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//support for vuex
import Vuex from 'vuex';
Vue.use(Vuex);
import storeData from './store/index';

const store = new Vuex.Store(
    storeData
);


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('todo', require('./components/todo.vue').default);

//V-form
import Vue from 'vue';
import { Form, HasError, AlertError } from 'vform';

Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
window.Form = Form;

// sweet alert 2
import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

window.Toast = Toast;

const app = new Vue({
    el: '#app',
    store
});
