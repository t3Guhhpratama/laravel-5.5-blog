@extends('layouts.app')

@section('title', 'Page Home')

@section('content')
<!-- As a heading -->
<nav class="navbar navbar-light bg-light">
    <router-link to="/" class="nav-link disabled">VueJS is Fun</router-link>
  <!-- <span class="navbar-brand mb-0 h1">VueJS is Fun</span> -->
  <ul class="nav justify-content-center">
    <li class="nav-item">
      <router-link class="nav-link disabled" to="/login">Login</router-link>
    </li>
    <li class="nav-item">
      <router-link class="nav-link disabled" to="/register">Register</router-link>
    </li>
  </ul>
</nav>
<div class="container">
  <div class="row">
      <router-view></router-view>
  </div>
</div>
@endsection
