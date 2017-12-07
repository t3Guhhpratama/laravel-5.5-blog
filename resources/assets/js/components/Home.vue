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
        <button class="btn btn-info" @click="getMediumData">submit</button>
        <div class="row justify-content-center" style="width:100%">
          <!-- <div class=""> -->
            <medium-editor :text='text' v-on:edit='processEditOperation' custom-tag='div' @change="onChange">
            </medium-editor>
          <!-- </div> -->

        </div>

    </div>
</template>



<script>

    var text =
         '<p>A Vue 2 component for the the dead simple inline editor toolbar by </p>'

    export default {

        mounted() {
            console.log('Component mounted.')
        },
        computed:{
          // image(){
          //   return this.$store.state.image
          // }
        },
        data(){
          return{
              image:'',
              show: true,
              text: text,
              userData: [],
              number: 0,
              message: [],
              activeColor: 'red',
              fontSize: 30
          }
        },
        methods:{
          processEditOperation: function (operation) {
            this.text = operation.api.origElements.innerHTML
          },
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
          },
          onChange(){
            console.log('tes');
          },
          getMediumData(){
            console.log(this.text);
          }
        }
    }
</script>
