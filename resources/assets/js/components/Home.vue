<template>
    <div class="container">
        <div class="row">
          <div class="btn-group" role="group">
            <button  v-on:click="loadData" type="button" class="btn btn-primary">Load data</button>
            <button v-on:click="userPage" type="button" class="btn btn-primary">Users</button>
            <button v-on:click="productPage" type="button" class="btn btn-primary">Product</button>
          </div>
        </div>
        <!-- <div class="row">
            <button v-on:click="loadData" type="button" class="btn btn-primary">Load data</button>
            <button v-on:click="loadUsers" type="button" class="btn btn-primary">Users</button>
        </div> -->
        <br />
        <div class="row">
          <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Slug</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(data, key) in userData">
                  <th scope="row">{{key+1}}</th>
                  <td>{{ data.name }}</td>
                  <td>{{ data.email }}</td>
                  <td>{{ data.slug }}</td>
                </tr>
              </tbody>
          </table>
        </div>
        <div class="row">
          <div class="editable"></div>
        </div>
        <div class="row">
          <button class="btn btn-primary" v-on:click="changeColor">Change</button>
          <div v-bind:style="{color:activeColor, fontSize: fontSize+'px'}">
            fgdfgasdfasd
          </div>
          <!-- <div>
              <i class="fa fa-camera-retro fa-4x"></i>
          </div> -->
          <!-- <image-component></image-component> -->
          <!-- <figure class="figure">
            <img src="images/hospital.jpeg" width="200" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
            <figcaption class="figure-caption">A caption for the above image.</figcaption>
          </figure> -->
          <!-- <input  v-model="message"/>
          <p>Message is: {{ message }}</p> -->
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
              userData: [],
              number: 0,
              message: [],
              activeColor: 'red',
              fontSize: 30
          }
        },
        methods:{
          changeColor(){
            this.activeColor = 'blue'
          },
          loadData:function(event){
          // GET /someUrl
            this.$http.get('/api/users').then(response => {

              // get body data
              this.userData = response.body;
            }, response => {
              // error callback
            });
          },
          userPage(){
            this.$router.push({path: 'user'});
          },
          productPage(){
            this.$router.push({path: 'product'});
          }
        }
    }
</script>
