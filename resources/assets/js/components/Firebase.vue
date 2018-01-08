<template>
    <div class="col-md-10 offset-md-2">
        <br />
        <div class="row">
          <formaddbooks-component/>
        </div>
        <div class="row">
          <div class="card w-100">
              <div class="card-header">
                Book List
              </div>
              <div class="card-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <!-- <th scope="col">#</th> -->
                      <th scope="col">Title</th>
                      <th scope="col">Author</th>
                      <th scope="col">Url</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="book in books">
                      <!-- <th scope="row">1</th> -->
                      <td>{{book.title}}</td>
                      <td>b</td>
                      <td>https://material.io/icons/</td>
                      <td><a href="#"><i class="fa fa-trash"></i></a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

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
       console.log(db);
      })
    },
    data(){
      return{
        book: ''
      }
    },
    firebase: {
      books:  bookRef
    },
    methods:{
    }
}
</script>
