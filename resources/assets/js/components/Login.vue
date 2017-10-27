<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <form name="loginform" v-on:submit.prevent="onSubmit">
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="name@example.com">
                </div>
                <div class="form-group">
                  <input name="password" type="password" class="form-control" placeholder="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Sign in</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
          onSubmit(event){
            var data = $('form[name=loginform]').serialize();
            $.post( "/login", input, function( data ) {
              console.log( data); // John
            }, "json");
          }
        }
    }
</script>
