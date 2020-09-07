import Vue from 'vue';
import Router from 'vue-router';
import Home from "./components/Home";
import Login from "./components/page/Login";
import Register from "./components/page/Register";
import Dashboard from "./components/page/Dashboard";
import Links from "./components/page/Links";
import Stat from "./components/page/Stat";
import * as auth from './services/auth';

Vue.use(Router);

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        beforeEnter(to, from, next){
            if (!auth.isLoggedIn()){
                next();
            } else {
                next('/');
            }
        }

    },
    {
        path: '/register',
        name: 'register',
        component: Register,
        beforeEnter(to, from, next){
            if (!auth.isLoggedIn()){
                next();
            } else {
                next('/');
            }
        }
    },
    {
        path: '/links',
        name: 'links',
        component: Links,
        beforeEnter(to, from, next){
            if (!auth.isLoggedIn()){
                next('/login');
            } else {
                next();
            }
        }
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
        beforeEnter(to, from, next){
            if (!auth.isLoggedIn()){
                next('/login');
            } else {
                next();
            }
        }
    },
    {
        path: '/stat/:id/general',
        name: 'stat',
        component: Stat,
        beforeEnter(to, from, next){
            if (!auth.isLoggedIn()){
                next('/login');
            } else {
                next();
            }
        }
    },
];

const router = new Router({
    mode: 'history',
    routes: routes
});
export default router;