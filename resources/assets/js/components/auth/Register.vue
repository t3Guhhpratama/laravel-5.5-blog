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
const db_users = firebase.database().ref('users');
const auth = firebase.auth()
export default {
    beforeMount() {
      //do something before mounting vue instance
      let token = localStorage.getItem('token')
      if(token){
        this.$router.replace({ path: '/' });
      }
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
        let self = this;
        self.spin = true;
        let email = self.newUser.email;
        let password = self.newUser.password;
        // let uid = auth.currentUser.uid;
        //Firebase Query
        // db_users.orderByChild("uid").equalTo(uid).on("child_added",snapshot => {
        //     const userData = snapshot.val();
        //     console.log(userData);
        // });
        // GET /someUrl
        

        firebase.auth().createUserWithEmailAndPassword(email, password).then(function(){
            self.spin = false;
            let uid = auth.currentUser.uid;
            let data = {
              uid: uid,
              email: email
            }
            let newPostKey = db_users.push(data).key;

            //Send Email
            this.$http.get('/api/send-mail/'+email).then(response => {
              // get body data
              let someData = response.body;
              self.$router.push({ path: '/login' });
            }, response => {
              // error callback
              console.log(response);
            });
           
        }).catch(function(error) {
          self.spin = false;
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
