<template>
 <div class="col-md-6 offset-md-3">
        <form class="form-horizontal" role="form" v-on:submit.prevent="login">
            <div class="row">
                <div class="col-md-12">
                    <h2>Login</h2>
                    <hr>
                </div>
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
                    <button type="submit" class="btn btn-success"><i class="fa fa-sign-in"></i> Login</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    },
    data(){
      return{
        name:'',
        email:'',
        password:''
      }
    },
    methods:{
      login(event){
        this.$validator.validateAll().then((result) => {
            if (result) {
              // eslint-disable-next-line
              this.$http.post('/api/login',
              {email: this.email, password: this.password}).then(response => {
                // get body data
                if(response.body == 'failed'){
                  console.log(response.body);
                  this.$router.push({ path: '/login' });
                }else{
                  localStorage.setItem('token', 12345);
                  this.$store.commit('hideLogin');
                  this.$router.push({ path: '/' });
                }

              }, response => {
                console.log(response);
                // error callback
              });
              return;
            }
            alert('Correct them errors!');
        });
      }
    }
}
</script>
