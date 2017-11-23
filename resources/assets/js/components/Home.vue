<template>
    <div class="container">
        <div class="row">
            <button v-on:click="loadData" type="button" class="btn btn-primary">Load data</button>
            <button v-on:click="loadUsers" type="button" class="btn btn-primary">Users</button>
        </div>
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
              number: 0
          }
        },
        created(){
          this.$store.dispatch("fetchUsers")
        },
        methods:{
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
          loadUsers(){
            this.$store.dispatch('fetchUsers');
            // console.log("Users--->",this.$store.state.users)
            console.log(this.$store.state.users);
          }
        }
    }
</script>
