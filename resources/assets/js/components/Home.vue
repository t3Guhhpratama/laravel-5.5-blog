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
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" v-on:click="show = !show">
            Launch demo modal
          </button>
          <!-- Modal -->
          <transition name="modalfade">
            <div v-if="show">
              <div class="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" v-bind:style="{display:'block'}">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="hideModal">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      ...
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </transition>

        </div>
        <div class="row">
          <div class="myDiv" v-bind:style="{transform: 'translate('+translateValue+'px)'}"></div>
        </div>
    </div>
</template>

<style>
  .modalfade-enter-active, .modalfade-leave-active {
    transition: opacity .5s
  }
  .modalfade-enter, .modalfade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0
  }
  .myDiv{
    width: 200px;
    height: 200px;
    border:1px solid black;
    background-color: lightblue;
  }
  .myTransform{
    transform: translate(10px);
  }
</style>

<script>

    var text =
         '<p>Causes the placeholder to disappear as soon as the field gains focus. Default: true</p>'

    export default {

        mounted() {
            // console.log('Component mounted.')
            this.$nextTick(function () {
              // Code that will run only after the
              // entire view has been rendered
              let runtranslate = setInterval(()=>{
                this.translateValue += 2 ;
                if(this.translateValue == 200){
                  clearInterval(runtranslate);
                }
                console.log(this.translateValue);
              },20);

            })
        },
        computed:{
          // image(){
          //   return this.$store.state.image
          // }
        },
        data(){
          return{
              picked:'',
              image:'',
              show: false,
              text: text,
              userData: [],
              number: 0,
              message: [],
              activeColor: 'red',
              fontSize: 30,
              list : [],
              dateTime:'',
              translateValue: 50
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
          },
          hideModal(){
            this.displayModal = 'none';
            this.show = false;
          }
        }
    }
</script>
