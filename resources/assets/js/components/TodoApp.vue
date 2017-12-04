<template>
 <div class="col-md-6 offset-md-3">
        <div class="row">
          <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td><button class="btn btn-primary col-11">Edit</button></td>
      <td><button class="btn btn-primary col-8">Delete</button></td>
    </tr>
  </tbody>
</table>
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
