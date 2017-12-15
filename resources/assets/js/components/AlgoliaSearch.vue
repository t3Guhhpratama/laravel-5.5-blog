<template>
  <ais-index
    app-id="N40D9JHVMN"
    api-key="6cfda334ecafdd4fdeeaccdbf52598d6"
    index-name="contacts"
  >
    <ais-search-box>
      <div class="input-group">
        <ais-input placeholder="Search contacts" :class-names="{'ais-input': 'form-control'}"></ais-input>
         <span class="input-group-btn">
           <ais-clear :class-names="{'ais-clear': 'btn btn-primary'}"></ais-clear>
         </span>
      </div>
    </ais-search-box>

    <ais-results inline-template :results-per-page="1">
      <table-results></table-results>
    </ais-results>
  </ais-index>
  <!-- <div>
    {{ query }}
  </div> -->

</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    },
    data(){
      return{
      }
    },
    methods:{
    }
}
</script>
