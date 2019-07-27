import Vue from 'vue'
import Router from 'vue-router'
import Register from '../components/register/Register'
import Login from '../components/login/Login'
//import PostCreate from '../components/post/Create'


Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/register-user',
            name: 'register',
            component: Register
        },{
            path: '/login-form',
            name: 'Login',
            component: Login
         },
        //{
        //     path: '/',
        //     name: '/',
        //     component: PostCreate
        // },
    ],
     mode: 'history'

});