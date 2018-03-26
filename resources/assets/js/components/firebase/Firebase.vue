<template>
    <div class="col-md-10 offset-md-2">
        <div class="col-md-12 nav-child">
          <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link active" href="#">Active</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
          </ul>
        </div>
        <p>
          Add Book & Delete book using Vuejs, All data will be saved into firebase database.
        </p>
        <br />
        <div class="row">
          <formaddbooks-component :bookRef="bookRef"/>
        </div>
        <div class="row">
          <formlistbooks-component :bookRef="bookRef" :books="books"/>
        </div>
    </div>
</template>

<script>
import firebase from '../../firebase';

const db = firebase.database()
let bookRef = db.ref('books');
export default {
    mounted() {
      this.$nextTick(function () {
       // Code that will run only after the
       // entire view has been rendered
      })
    },
    data(){
      return{
        message:[
          {title: 'react'},
          {title: 'angular'}
        ],
        bookRef : bookRef
      }
    },
    firebase: {
      books:  bookRef
    },
    methods:{
    }
}
</script>
