<template>
 <div class="col-md-6 offset-md-3">
        <form class="form-horizontal" role="form" v-on:submit.prevent="login">
            <div class="row">
                <div class="col-md-12">
                    <h2>Login</h2>
                    <hr>
                </div>
            </div>
              <!-- <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                  v-bind:style="{ width: widthBar+'%'}"></div>
              </div> -->
              <br />
            <div class="alert alert-danger" role="alert" v-show="alert_error">
              Wrong Email or Password!
              <button type="button" class="close" v-on:click="close_alert">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="form-group">
              <div class="input-group ">
                <span class="input-group-addon"><i class="fa fa-at"></i></span>
                <input v-validate="'required|email'" v-model="email" name="email" type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
              </div>
              <small class="text-danger " v-show="errors.has('email')">
                Email required
              </small>
            </div>

            <div class="form-group">
              <div class="input-group ">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input v-validate="'required'" v-model="password" name="password" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
              </div>
              <small class="text-danger " v-show="errors.has('password')">
                Password required
              </small>
            </div>
            <div class="row" style="padding-top: 1rem">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success btnlogin" :disabled="submitted">
                      <i v-if="sign" class="fa fa-sign-in"></i>
                      <i v-if="spin" class="fa fa-spinner fa-spin"></i>
                      Login</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
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
    computed:{
      alert_error(){
          return this.$store.state.alert_error
      }
    },
    data(){
      return{
        name:'',
        email:'',
        password:'',
        widthBar: 10,
        max: 100,
        submitted: false,
        spin: false,
        sign: true
      }
    },
    methods:{
      login(event){
        this.$validator.validateAll().then((result) => {
            if (result) {
              this.submitted = true
              this.spin = true
              this.sign = false
              // eslint-disable-next-line
              this.$http.post('/api/login',
              {email: this.email, password: this.password}).then(response => {
                // get body data
                if(response.body == 'failed'){
                  console.log(response.body);
                  this.$store.dispatch('alertErrorCommit', 1);
                  // this.$router.push({ path: '/login' });
                }else{
                  this.submitted = false
                  localStorage.setItem('token', 12345);
                  this.$store.commit('hideLogin');
                  this.$router.replace({ path: '/' });
                }

              }, response => {
                console.log(response);
                // error callback
              });
              return;
            }
            alert('Correct them errors!');
        });
      },
      close_alert(){
        this.$store.dispatch('alertErrorCommit', 0);
      }
    }
}
</script>
