<template>
 <div class="col-md-6 offset-md-3">
        <div class="row">
          <form class="form-horizontal" role="form" v-on:submit.prevent="submitUser">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Email...">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Password...">
              </div>
              <button type="submit" class="btn btn-primary" v-on:click="submitClick">Submit</button>
          </form>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    },
    data(){
      return{

      }
    },
    methods:{
    }
}
</script>
