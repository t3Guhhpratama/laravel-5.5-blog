
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';

Vue.use(VueRouter);
Vue.use(VueResource);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Register from './components/Register.vue';
import Login from './components/Login.vue';
import Home from './components/Home.vue';

Vue.component('register-component', require('./components/Register.vue'));
Vue.component('login-component', require('./components/Login.vue'));

Vue.http.headers.common['X-CSRF-TOKEN'] =  document.querySelector("meta[name=csrf-token]").getAttribute('content');

const routes = [
  { path: '/', component: Home },
  { path: '/register', component: Register },
  { path: '/login', component: Login }
]

const router = new VueRouter({
  mode: 'history',
  routes // short for `routes: routes`
})

const app = new Vue({
  router
}).$mount('#app')

// const app = new Vue({
//     el: '#app'
// });
