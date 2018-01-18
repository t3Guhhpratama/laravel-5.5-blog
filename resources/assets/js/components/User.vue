<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
              <form class="form-horizontal" role="form" v-on:submit.prevent="submitUser">
                  <div class="form-group">
                    <label for="exampleFormControlFile1">Example file input</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" placeholder="Enter Name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-primary" v-on:click="submitClick">Submit</button>
              </form>
            </div>
        </div>
        <div class="row">
          <table class="table">
              <thead class="thead-dark">
                <tr>
                  <!-- <th scope="col">#</th> -->
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <!-- <tr>
                  <th>1</th>
                  <td>Teguh</td>
                  <td>Teguh@gmail.com</td>
                </tr> -->
                <tr v-for="(data, key) in arr">
                  <!-- <th scope="row">{{key+1}}</th> -->
                  <td>{{ data.name }}</td>
                  <td>{{ data.email }}</td>
                  <td v-on:click="modalShow(data)" ><i class="fa fa-edit"></i></td>
                </tr>
              </tbody>
          </table>
        </div>
        <!-- Modal -->
        <transition name="modalfade">
          <div v-if="modalshow">
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
                    <form v-on:submit.prevent="updateUser">
                      <div class="row">
                        <img src="https://cloud.netlifyusercontent.com/assets/344dbf88-fdf9-42bb-adb4-46f01eedd629/68dd54ca-60cf-4ef7-898b-26d7cbe48ec7/10-dithering-opt.jpg"
                        class="rounded float-left" alt="..." style="width:200px;height:200px">
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-8">
                          <input v-model="email" type="text" class="form-control" placeholder="Email" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">name</label>
                        <div class="col-sm-8">
                          <input v-model="name" type="text" class="form-control" placeholder="Name">
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" v-on:click="updateUser(uid)">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </transition>
    </div>
</template>

<style>
.modalfade-enter-active, .modalfade-leave-active{
  transition: opacity .5s
}
.modalfade-enter, .modalfade-leave-to{
  opacity: 0
}
</style>

<script>
import firebase from '../firebase';
const db_users = firebase.database().ref('users');
    export default {
        mounted() {
          db_users.orderByValue().on("value", snapshot=>{
            let data = snapshot.val();
            this.arr = data;
          })
        },
        computed:{
          count(){
            return this.$store.state.count
          }
        },
        data(){
          return{
            image:'',
            arr: '',
            modalshow: false,
            email:'tes',
            name:'',
            uid:''
          }
        },
        methods:{
          modalShow(arr){
            this.modalshow = true
            this.email = arr.email;
            this.name = arr.name;
            this.uid = arr.uid;
          },
          hideModal(){
            this.modalshow = false
          },
          submitUser(){
            return this.$store.dispatch('createUser');
          },
          submitClick(){
            return this.$store.dispatch('increment')
          },
          removeImage(){
            this.image = ''
          },
          onFileChange(e){
            var files = e.target.files || e.dataTransfer.files;
            if(!files.length)
              return;
            this.createImage(files[0]);
          },
          createImage(file){
             var image = new Image();
             var reader = new FileReader();
             var vm = this;
             reader.onload = (e) => {
               vm.image = e.target.result;
             };
             reader.readAsDataURL(file);
          },
          imageClick(){
            alert('tes')
          },
          updateUser(uid){
            let self = this;
            db_users.orderByChild("uid").equalTo(uid).once("child_added", snapshot=>{
              snapshot.ref.update({ name: self.name })
            });
            this.modalshow = false
          }
        }
    }
</script>
