import Vue from 'vue'
import Router from 'vue-router'
import Ex from '../components/ExampleComponent'
import Register from '../components/register/Register'


Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/',
            name: '/',
            component: Ex
        },{
            path: '/register',
            name: 'register',
            component: Register
        },
    ],
    mode: 'history'

});