import Vue from 'vue';
import VueRouter from 'vue-router';

import LoginFirebase from '../components/auth/Login.vue';
import RegisterFirebase from '../components/auth/Register.vue';
import Home from '../components/Home.vue';
import FirebaseComponent from '../components/firebase/Firebase.vue';
import UserComponent from '../components/firebase/User.vue';
import WebOne from '../components/web-one/WebOne.vue';
import store from '../store';


Vue.use(VueRouter);

const router =  new VueRouter({
  mode: 'history',
  routes:[
    { path: '/', component: FirebaseComponent, name:'FirebaseComponent', meta: { requiresAuth: true }},
    { path: '/login', component: LoginFirebase, name:'login' },
    { path: '/register', component: RegisterFirebase, name:'register' },
    { path: '/user', component: UserComponent, name:'user', meta: { requiresAuth: true } },
    { path: '/webone', component: WebOne, name:'webone', meta: { requiresAuth: true } }
  ]
})

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
      });
    }
  }
  next();
});

export default router;
