<template>
  <div>
    <form v-cloak>
      <h1>Services</h1>
      <ul>
        <li v-for="service in services" v-bind:class="{'active': service.active}"
        v-on:click="toggleActive(service)">
          {{service.name}} <span>{{service.price}}</span>
        </li>
      </ul>
      <div class="total">
        Total: <span>{{total()}}</span>
      </div>
    </form>
    <div class="tooltop" v-if="show_tooltip">
      <input type="text" v-model="text_content" />
    </div>
  </div>
</template>

<style>
  a, a:visited {
    outline:none;
    color:#389dc1;
  }

  a:hover{
    text-decoration:none;
  }

  section, footer, header, aside, nav{
    display: block;
  }

  form{
      background-color: #61a1bc;
      border-radius: 2px;
      box-shadow: 0 1px 1px #ccc;
      width: 400px;
      padding: 35px 60px;
      margin: 50px auto;
  }

  form h1{
      color:#fff;
      font-size:64px;
      font-family:'Cookie', cursive;
      font-weight: normal;
      line-height:1;
      text-shadow:0 3px 0 rgba(0,0,0,0.1);
  }

  form ul{
      list-style:none;
      color:#fff;
      font-size:18px;
      font-weight:bold;
      text-align: left;
      margin:20px 0 15px;
  }

  form ul li{
      padding:20px 10px;
      background-color:#e35885;
      margin-bottom:8px;
      box-shadow:0 1px 1px rgba(0,0,0,0.1);
      cursor:pointer;
  }

  form ul li span{
      float:right;
  }

  form ul li.active{
      background-color:#8ec16d;
  }

  div.total{
      border-top:1px solid rgba(255,255,255,0.5);
      padding:15px 30px;
      font-size:20px;
      font-weight:bold;
      text-align: left;
      color:#fff;
  }

  div.total span{
      float:right;
  }
</style>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    },
    data(){
      return{
        show_tooltip: true,
        text_content: 'Edit me.',
        services:[
          {
               name: 'Web Development',
               price: 300,
               active:true
           },{
               name: 'Design',
               price: 400,
               active:false
           },{
               name: 'Integration',
               price: 250,
               active:false
           },{
               name: 'Training',
               price: 220,
               active:false
           }
        ]
      }
    },
    methods:{
      toggleActive(s){
        s.active = !s.active;
      },
      total(){
        let total = 0
        this.services.forEach(function(s){
          if(s.active){
            total += s.price
          }
        })
        return total;
      }
    }
}
</script>
