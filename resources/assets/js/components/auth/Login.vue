<template>
    <div class="col-md-10 offset-md-2">
      <div class="card w-100">
          <div class="card-header">
            Login User
          </div>
          <div class="card-body">
            <form v-on:submit.prevent="login">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-8">
                  <input v-model="user.email" type="text" class="form-control" placeholder="Email">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-8">
                  <input v-model="user.password" type="password" class="form-control" placeholder="Password">
                </div>
              </div>
              <button class="btn btn-primary" :disabled="submitted"><i v-if="spin" class="fa fa-spinner fa-spin"></i>
                &nbsp;Login
              </button>
            </form>
          </div>
        </div>
    </div>
</template>

<script>
import firebase from '../../firebase';
const db_users = firebase.database().ref('users');
const auth = firebase.auth()
export default {
    beforeMount() {
      //do something before mounting vue instance
      console.log(localStorage.getItem('token'));
      let token = localStorage.getItem('token')
      if(token){
        this.$router.replace({ path: '/' });
      }
    },
    mounted() {
    },
    data(){
      return{
        submitted: false,
        spin:false,
        user:{
          email:'teguh@gmail.com',
          password:'qwerty123'
        }
      }
    },
    firebase: {
    },
    methods:{
      login(){
        var self = this;
        self.submitted = true;

        firebase.auth().signInWithEmailAndPassword(this.user.email, this.user.password).then(function(){
          let email = auth.currentUser.email;
          let uid = auth.currentUser.uid;
          let data = {
            uid: uid,
            email: email,
            name: 'Teguh'
          }
          var userId = firebase.auth().currentUser.uid;
          console.log(userId);
          //Check existing data
          db_users.orderByChild("uid").equalTo(uid).on("value",snapshot => {
              const userData = snapshot.val();
              if (userData){
                console.log(userData.email);
                // localStorage.setItem('token', 12345);
                // localStorage.setItem('user', userData);
                // self.$router.replace({ path: '/' });
              }else{
                let newPostKey = db_users.push(data).key;
                console.log(newPostKey);
              }
          });
          self.submitted = false;
        }).catch(function(error)  {
          // Handle Errors here.
          var errorCode = error.code;
          var errorMessage = error.message;
          if (errorCode === 'auth/wrong-password') {
            alert('Wrong password.');
            self.submitted = false;
          } else {
            alert(errorMessage);
            self.submitted = false;
          }
          // ...
        });
      }
    }
}
</script>
