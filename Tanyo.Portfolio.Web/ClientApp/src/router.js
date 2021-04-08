import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'

Vue.use(Router)

export default new Router({
    mode: 'history',
    base: process.env.BASE_URL,
    routes: [{
        path: '/',
        name: 'home',
        component: Home
    }, {
        path: '/home',
        name: 'home',
        component: Home
    }, {
        path: '/blog',
        name: 'blog',
        component: () => import('./views/Blog.vue')
    }, {
        path: '/cv',
        name: 'cv',
        component: () => import('./views/CV.vue')
    }, {
        path: '/portfolio',
        name: 'portfolio',
        component: () => import('./views/Portfolio.vue')
    }, {
        path: '/pricing',
        name: 'pricing',
        component: () => import('./views/Pricing.vue')
    }, {
        path: '/contacts',
        name: 'contacts',
        component: () => import('./views/Contacts.vue')
    }, {
        path: '*',
        name: 'NotFound',
        component: () => import(/* webpackChunkName: "404" */ './views/NotFound.vue')
    }]
})