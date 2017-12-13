<template>
  <ais-index
    app-id="N40D9JHVMN"
    api-key="6cfda334ecafdd4fdeeaccdbf52598d6"
    index-name="contacts"
    :search-store="searchStore"
  >
    <ais-search-box>
      <div class="input-group">
        <ais-input placeholder="Search contacts" :class-names="{'ais-input': 'form-control'}"></ais-input>
      </div>
    </ais-search-box>
    <ais-results inline-template>
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
