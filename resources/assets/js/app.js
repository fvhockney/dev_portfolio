
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import Container from './components/Container';
import Home from './components/Home';
import About from './components/About';
import Contact from './components/Contact';
import Portfolio from './components/Portfolio';

import BootstrapVue from 'bootstrap-vue';

Vue.use(VueRouter);
Vue.use(BootstrapVue);

const routes = [
  {path: '/', name: 'home', component: Home},
  {path: '/about', name: 'about', component: About},
  {path: '/contact', name: 'contact', component: Contact},
  {path: '/portfolio', name: 'portfolio', component: Portfolio},
];

const router = new VueRouter({
  // mode: 'history',
  routes
});

const app = new Vue({
    el: '#app',
    router,
    components: {Container},
});
