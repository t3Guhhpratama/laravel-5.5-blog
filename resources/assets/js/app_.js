
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
import ExampleComponent from './components/ExampleComponent.vue';
import Login from './components/Login.vue';

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('login-component', require('./components/Login.vue'));
Vue.component('home-component', require('./components/Home.vue'));

Vue.http.headers.common['X-CSRF-TOKEN'] =  document.querySelector("meta[name=csrf-token]").getAttribute('content');

const routes = [
  { path: '/foo', component: ExampleComponent },
  { path: '/login', component: Login }
]

const router = new VueRouter({
  routes // short for `routes: routes`
})

const app = new Vue({
  router
}).$mount('#app')

// const app = new Vue({
//     el: '#app'
// });
