<template>
    <div class="card w-100">
        <div class="card-header">
          Add New Books
        </div>
        <div class="card-body">
              <form class="form-inline">
                <div class="form-group mb-2">
                  <input type="text" readonly class="form-control-plaintext" value="Title">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                  <input type="password" class="form-control" placeholder="title">
                </div>
                <!-- <button type="submit" class="btn btn-primary mb-2">Confirm identity</button> -->
              </form>
              <form class="form-inline">
                <div class="form-group mb-2">
                  <input type="text" readonly class="form-control-plaintext" value="Author">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                  <input type="password" class="form-control" placeholder="Author">
                </div>
              </form>
              <form class="form-inline">
                <div class="form-group mb-2">
                  <input type="text" readonly class="form-control-plaintext" value="Url">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                  <input type="password" class="form-control" placeholder="Url">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Add Book</button>
              </form>
        </div>
      </div>
</template>

<script>
export default {
    mounted() {
    },
    data(){
      return{
        book: ''
      }
    },
    methods:{
    }
}
</script>
