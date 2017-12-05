<template>
 <div class="col-md-6 offset-md-3">
    <div class="row">
      <div class="input-group">
        <input v-model="name" type="text" class="form-control" placeholder="Input data" aria-label="Search for...">
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
        console.log('Component mounted.')
    },
    data(){
      return{
        name:'',
        items:[{id:1,name: 'Angular', done: false}],
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
        this.nextTodoId = this.nextTodoId-1
        console.log(data.id);
      }
    }
}
</script>
