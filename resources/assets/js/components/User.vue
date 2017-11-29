<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
              <form class="form-horizontal" role="form" v-on:submit.prevent="submitUser">
                  <div class="form-group">
                    <label for="exampleFormControlFile1">Example file input</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" placeholder="Enter Name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  {{count}}
                  <button type="submit" class="btn btn-primary" v-on:click="submitClick">Submit</button>
              </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        computed:{
          count(){
            return this.$store.state.count
          }
        },
        methods:{
          submitUser(){
            return this.$store.dispatch('createUser');
          },
          submitClick(){
            return this.$store.dispatch('increment')
          }
        }
    }
</script>
