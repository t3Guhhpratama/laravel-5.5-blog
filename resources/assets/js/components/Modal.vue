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
</style>

<script>

    var text =
         '<p>Causes the placeholder to disappear as soon as the field gains focus. Default: true</p>'

    export default {

        mounted() {
        },
        computed:{
          // image(){
          //   return this.$store.state.image
          // }
        },
        data(){
          return{

          }
        },
        methods:{
        }
    }
</script>
