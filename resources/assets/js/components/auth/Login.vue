<template>
    <div class="col-md-10 offset-md-2">
      <div class="card w-100">
          <div class="card-header">
            Login User
          </div>
          <div class="card-body">
            <form v-on:submit.prevent="addBook">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-8">
                  <input v-model="newBook.title" type="text" class="form-control" placeholder="Title">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Author</label>
                <div class="col-sm-8">
                  <input v-model="newBook.author" type="text" class="form-control" placeholder="Author">
                </div>
              </div>
            </form>
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
export default {
    mounted() {
      this.$nextTick(function () {
       // Code that will run only after the
       // entire view has been rendered
      })
    },
    data(){
      return{
      }
    },
    firebase: {
    },
    methods:{
      login(){
        
      }
    }
}
</script>
