<template>
    <div class="container">

        <div class="row">
          <div class="btn-group" role="group">
            <button  v-on:click="loadData" type="button" class="btn btn-primary">Load data</button>
            <button v-on:click="userPage" type="button" class="btn btn-primary">Users</button>
            <button v-on:click="productPage" type="button" class="btn btn-primary">Product</button>
            <button v-on:click="todoPage" type="button" class="btn btn-primary">Todo App</button>
            <button v-on:click="algoliaPage" type="button" class="btn btn-primary">Algolia Search</button>
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
        <!-- <button class="btn btn-info" @click="getMediumData">submit</button> -->
        <div class="row justify-content-center" style="width:100%">
          <!-- <div class=""> -->
            <medium-editor :text='text' v-on:edit='processEditOperation' custom-tag='div'>
            </medium-editor>
          <!-- </div> -->

        </div>
        <div class="row">
          <div>
            <countdown deadline="2018-08-21 12:00:00" ></countdown>
          </div>
        </div>
        <div class="row">
          <select v-model="selected">
            <option v-for="option in options" v-bind:value="option.value">
              {{option.text}}
            </option>
          </select>
          <span>{{selected}}</span>
        </div>
    </div>
</template>



<script>

    var text =
         '<p>Causes the placeholder to disappear as soon as the field gains focus. Default: true</p>'

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
              selected: 'A',
              options: [
                { text: 'One', value: 'A' },
                { text: 'Two', value: 'B' },
                { text: 'Three', value: 'C' }
              ],
              picked:'',
              image:'',
              show: true,
              text: text,
              userData: [],
              number: 0,
              message: [],
              activeColor: 'red',
              fontSize: 30,
              list : [],
              dateTime:''
          }
        },
        methods:{
          infiniteHandler($state){
              setTimeout(()=>{
                const temp = [];
                for(let i = this.list.length + 1; i <= this.list.length + 20; i++){
                  temp.push(i);
                }
                this.list = this.list.concat(temp);
                $state.loaded();
              }, 1000)
          },
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
          todoPage(){
            this.$router.push({path: 'todo-app'});
          },
          onChange(){
            console.log('tes');
          },
          getMediumData(){
            console.log(this.text);
          },
          algoliaPage(){
            this.$router.push({path: 'algolia-search'})
          }
        }
    }
</script>
