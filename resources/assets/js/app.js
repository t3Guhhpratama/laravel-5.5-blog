
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');
window.MediumInsert = require('medium-editor-insert-plugin').MediumInsert;
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
import VeeValidate from 'vee-validate';
import editor from 'vue2-medium-editor';
import InfiniteLoading from 'vue-infinite-loading';
import InstantSearch, { createFromAlgoliaCredentials } from 'vue-instantsearch';
import VueFire from 'vuefire';

const searchStore = createFromAlgoliaCredentials('N40D9JHVMN', '6cfda334ecafdd4fdeeaccdbf52598d6');
Vue.use(VueRouter);
Vue.use(VueResource);
Vue.use(VeeValidate);
Vue.use(InstantSearch);
Vue.use(VueFire);
// MediumInsert.use(editor)


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//Firebase auth
import RegisterFirebase from './components/auth/Register.vue';
import LoginFirebase from './components/auth/Login.vue';

import Register from './components/Register.vue';
import Login from './components/Login.vue';
import Home from './components/Home.vue';
import Dashboard from './components/Dashboard.vue';
import User from './components/User.vue';
import Product from './components/Product.vue';
import TodoApp from './components/TodoApp.vue';
import FirebaseComponent from './components/firebase/Firebase.vue';
import AlgoliaSearch from './components/AlgoliaSearch.vue';
import NavigationMenu from './components/NavigationMenu.vue';
import OrderForm from './components/OrderForm.vue';
import router from './router';

//Vuex
import store from './store';

Vue.component('nav-component', require('./components/Nav.vue'),
  {data: {
    login: true
  }});
Vue.component('footer-component',require('./components/Footer-1.vue'));
Vue.component('image-component', require('./components/Image.vue'));
Vue.component('infinite-loading', InfiniteLoading);
Vue.component('table-results', require('./components/TableResultAlgolia.vue'));
Vue.component('formaddbooks-component', require('./components/firebase/FirebaseFormAddBooks.vue'));
Vue.component('formlistbooks-component', require('./components/firebase/FirebaseListBooks.vue'));

// editor.MediumInsert;
Vue.component('medium-editor', {
  extends:editor,
  props:{
    options:{
      type:Object,
      default:function(){
        return {
          placeholder: false,
          imageDragging: false,
          activeButtonClass: 'medium-editor-button-active',
          delay: 2000,
          toolbar: {
              buttons: ['bold']
          }
        }
      }
    }
  },
  mounted() {
    //do something after mounting vue instance
    $(this.$refs.element).mediumInsert({
      editor:this.$refs.api,
      addons:{
        images:{
          uploadScript: null,
          captionPlaceholder: 'Descripción de imagen',
          fileDeleteOptions: {
            url: 'api/users/delete-photo', // (string) A relative path to an upload script
            formData: {
              _token:document.querySelector("meta[name=csrf-token]").content
            },
          },
          fileUploadOptions: { // (object) File upload configuration. See https://github.com/blueimp/jQuery-File-Upload/wiki/Options
            url: 'api/users/upload-photo', // (string) A relative path to an upload script
            formData: {
              _token:document.querySelector("meta[name=csrf-token]").content
            },
          }
        }
      }
    });
  }
});

Vue.http.headers.common['X-CSRF-TOKEN'] =  document.querySelector("meta[name=csrf-token]").getAttribute('content');

const app = new Vue({
  router,
  store
}).$mount('#app')
