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
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in items" :key="item.id">
                <th scope="row">{{item.id}}</th>
                <td>{{item.name}}</td>
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
        name:'',
        items:[
          {
            id:1,
            name: 'Angular'
          },
          {
            id:2,
            name: 'React'
          },
          {
            id:3,
            name: 'PHP'
          },
          {
            id:4,
            name: 'Linux'
          },
          {
            id:5,
            name: 'Vuejs'
          }
        ]
      }
    },
    methods:{
      addArray(){
        if(this.name == ''){
          alert('Please input field');
        }else{
          let arr = {id:6,
          name: 'Vuejsfadfasd'}
          this.items.push(arr)
        }
        console.log(this.name);
      }
    }
}
</script>
