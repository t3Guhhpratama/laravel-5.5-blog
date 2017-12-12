<template>
 <div class="col-md-6 offset-md-3">
    <br />
    <div class="row">
      <div class="card col-12">
        <div class="card-body">
          <select class="custom-select" v-model="selected" >
            <option selected disabled>Select Item</option>
            <option v-for="item in items" v-model="item.id"
            v-bind:value="item">{{item.name}}</option>
          </select>
          <select class="custom-select">
            <option selected>Select Item</option>
            <option v-for="item in items2" v-model="item.id">{{item.name}}</option>
          </select>
          <span>Selected: {{ selected }}</span>
        </div>
      </div>
    </div>
    <br />
    <div class="row">
      <div class="input-group">
        <input v-model="name" @keyup.enter="addArray" type="text" class="form-control" placeholder="Input data" aria-label="Search for...">
        <span class="input-group-btn">
          <button class="btn btn-primary" type="button" v-on:click="addArray">add</button>
        </span>
      </div>
    </div>
        <div class="row">
            <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in items" :key="item.id">
                <th scope="row">{{item.id}}</th>
                <td><input type="checkbox" v-model="item.done"/></td>
                <td><span :class="{ taskDone:item.done}">{{item.name}}</span></td>
                <td><button class="btn btn-primary col-11">Edit</button></td>
                <td><button class="btn btn-primary col-8" v-on:click="deleteArray(item)">Delete</button></td>
              </tr>
            </tbody>
            </table>
        </div>
    </div>
</template>

<style>
.taskDone{
  text-decoration: line-through;
}
</style>

<script>
export default {
    mounted() {
         this.populate()
    },
    data(){
      return{
        selected:'',
        name:'',
        items:[{id:1,name: 'Angular', done: false}],
        items2:[],
        nextTodoId: 2
      }
    },
    methods:{
      addArray(e){
        if(this.name == ''){
          alert('Please input field');
        }else{
          let arr = {
            id:this.nextTodoId++,
            name: this.name,
            done: false
          }
          this.items.push(arr)
        }
      },
      deleteArray(data){
        this.items.splice(this.items.indexOf(data), 1)
      },
      selectClick(){
        console.log(this.items);
        this.items2 = this.items;
      },
       populate(){
         console.log('tes');
       }
    }
}
</script>
