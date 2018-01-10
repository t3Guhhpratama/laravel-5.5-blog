import Vue from 'vue';
import VueRouter from 'vue-router';

import Login from '../components/Login.vue';

Vue.use(router);

export default new VueRouter({
  routes:[
    { path: '/login', component: Login, name:'login' }
  ]
})
