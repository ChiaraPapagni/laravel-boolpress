/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/** 
 * Vue-router 
 * 
 * 0. If using a module system (e.g. via vue-cli), 
 * import Vue and VueRouter and then call `Vue.use(VueRouter)`.
 * 
 * 1. Define route components.
 * These can be imported from other files
 * 
 * 2. Define some routes
 * Each route should map to a component. 
 * The "component" can either be an actual component constructor created via
 * `Vue.extend()`, or just a component options object.
 * 
 * 3. Create the router instance and pass the `routes` option.
 * You can pass in additional options here.
 * 
 * 4. Create and mount the root instance. 
 * Make sure to inject the router with the router option to make the whole app router-aware.
 */
import VueRouter from 'vue-router'
Vue.use(VueRouter)

const Home = Vue.component('Home', require('./pages/Home.vue').default);
const Posts = Vue.component('Posts', require('./pages/Posts.vue').default);
const About = Vue.component('About', require('./pages/About.vue').default);
const Contacts = Vue.component('Contacts', require('./pages/Contacts.vue').default);

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/posts',
        name: 'posts',
        component: Posts
    },
    {
        path: '/about',
        name: 'about',
        component: About
    },
    {
        path: '/contacts',
        name: 'contacts',
        component: Contacts
    },
];

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('App', require('./App.vue').default);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('posts-list', require('./components/PostsListComponent').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router,
    el: '#app',
});
