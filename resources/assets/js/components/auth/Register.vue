<template>
    <div class="col-md-10 offset-md-2">
      <div class="card w-100">
          <div class="card-header">
            Signup User
          </div>
          <div class="card-body">
            <form v-on:submit.prevent="register">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-8">
                  <input v-model="newUser.email" type="text" class="form-control" placeholder="Email">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-8">
                  <input v-model="newUser.password" type="password" class="form-control" placeholder="Password">
                </div>
              </div>
              <button class="btn btn-primary"><i v-if="spin" class="fa fa-spinner fa-spin"></i>
                &nbsp;Submit
              </button>
            </form>
          </div>
        </div>
    </div>
</template>

<script>
import firebase from '../../firebase';
export default {
    mounted() {
    },
    data(){
      return{
        spin: false,
        newUser:{
          email:'',
          password:''
        }
      }
    },
    firebase: {
    },
    methods:{
      register(){
        this.spin = true;
        // let user = firebase.auth().currentUser;
        // if (user) {
        //   // User is signed in.
        //   console.log(user.email);
        // } else {
        //   // No user is signed in.
        //   console.log(user);
        // }
        firebase.auth().createUserWithEmailAndPassword(this.newUser.email, this.newUser.password).catch(function(error) {
          // Handle Errors here.
          var errorCode = error.code;
          var errorMessage = error.message;
            if (errorCode == 'auth/weak-password') {
              alert('The password is too weak.');
            } else {
              alert(errorMessage);
            }
            console.log(error);
          });
      }
    }
}
</script>
