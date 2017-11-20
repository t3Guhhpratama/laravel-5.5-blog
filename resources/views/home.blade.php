@extends('layouts.app')

@section('title', 'Page Home')

@section('content')
<!-- As a heading -->
<nav class="navbar navbar-light bg-light">
  <a class="nav-link disabled" href="#">
    <router-link to="/">VueJS is Fun</router-link>
  </a>
  <!-- <span class="navbar-brand mb-0 h1">VueJS is Fun</span> -->
  <ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="nav-link disabled" href="#">
        <router-link to="/login">Login</router-link>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#"><router-link to="/register">Register</router-link></a>
    </li>
  </ul>
</nav>
<div class="container">
  <div class="row">
      <router-view></router-view>
  </div>
</div>
@endsection
