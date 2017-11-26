
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
import VeeValidate from 'vee-validate';
import Vuex from 'vuex';

Vue.use(VueRouter);
Vue.use(VueResource);
Vue.use(VeeValidate);
Vue.use(Vuex);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Register from './components/Register.vue';
import Login from './components/Login.vue';
import Home from './components/Home.vue';
import Dashboard from './components/Dashboard.vue';
import User from './components/User.vue';

Vue.component('nav-component', require('./components/Nav.vue'),
  {data: {
    login: true
  }});

Vue.http.headers.common['X-CSRF-TOKEN'] =  document.querySelector("meta[name=csrf-token]").getAttribute('content');

const routes = [
  { path: '/', component: Home, name:'home', meta: { requiresAuth: true }},
  { path: '/register', component: Register, name:'register' },
  { path: '/login', component: Login, name:'login' },
  { path: '/dashboard', component: Dashboard, name:'dashboard', meta: { requiresAuth: true }},
  { path: '/user', component: User, name:'user', meta: { requiresAuth: true }}
]

const store = new Vuex.Store({
  state:{
    login: true,
    register: true,
    logout: false,
    users:[],
    count: 0,
    alert_error:false
  },
  mutations:{
    hideLogin(state){
      state.login = false,
      state.register = false,
      state.logout = true
    },
    fetch_users(state, users){
      state.users = users
    },
    increment (state) {
      state.count++
    },
    alert_error_update(state){
      state.alert_error = true
    }
  },
  actions:{
    fetchUsers(context){
      Vue.http.get("/api/users")
        .then((response) => {
            // console.log(response.bodyText);
            context.commit("fetch_users", response.bodyText)
            // self.filterUsers();
        })
        .catch((error => {
            console.log(error.statusText)
        }))
    },
    increment ({commit}) {
     commit('increment')
   },
   alertErrorCommit({commit}){
     commit('alert_error_update')
   }
  }
});

const router = new VueRouter({
  mode: 'history',
  routes // short for `routes: routes`
});

router.beforeEach((to, from, next) => {
  // localStorage.removeItem('token');
  if(to.meta.requiresAuth){
    const authUser = localStorage.getItem('token');
    if(authUser){
      store.commit('hideLogin');
      next();
    }else{

      next({
        path: '/login'
        // query: { redirect: to.fullPath }
      });
    }
  }
  next();
});

const app = new Vue({
  router,
  store:store
}).$mount('#app')

// const app = new Vue({
//     el: '#app'
// });
