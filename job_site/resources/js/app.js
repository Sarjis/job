
require('./bootstrap');

window.Vue = require('vue');
import router from './packeges/router'
import axios from 'axios'

let bus = new Vue();
Vue.prototype.$bus = bus;
Vue.prototype.$axios = axios;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
    router
});
