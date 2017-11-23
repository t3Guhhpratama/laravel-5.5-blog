<template>
  <nav class="navbar navbar-light bg-light">
      <label class="nav-link disabled">VueJS</label>
    <!-- <span class="navbar-brand mb-0 h1">VueJS is Fun</span> -->
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <router-link class="nav-link disabled" to="/login" v-show="login">Login</router-link>
      </li>
      <li class="nav-item">
        <router-link class="nav-link disabled" to="/register" v-show="register">Register</router-link>
      </li>
      <li class="nav-item">
        <router-link class="nav-link disabled" to="" v-show="logout">logout</router-link>
      </li>
    </ul>
  </nav>
</template>

<script>
    export default {
        computed:{
            login(){
              return this.$store.state.login;
            },
            register(){
              return this.$store.state.register;
            },
            logout(){
              return this.$store.state.logout;
            }
        },
        methods:{
        }
    }
</script>
