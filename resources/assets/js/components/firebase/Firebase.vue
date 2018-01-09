<template>
    <div class="col-md-10 offset-md-2">
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
import Firebase from 'firebase';
let config = {
    apiKey: "AIzaSyCc2CYLmmzF7w3Xx_im2kATozcxPXXdwSg",
    authDomain: "vuejs-firebase-4e815.firebaseapp.com",
    databaseURL: "https://vuejs-firebase-4e815.firebaseio.com",
    projectId: "vuejs-firebase-4e815",
    storageBucket: "vuejs-firebase-4e815.appspot.com",
    messagingSenderId: "945415338414"
}
let FirebaseApp = Firebase.initializeApp(config);
let db = FirebaseApp.database();
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
