<template>

</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    },
    data(){
      return{
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

      }
    }
}
</script>
