<template>
    <div class="container">
        <div class="row">
          <div class="col-4" v-for="product in products"  :key="product.id">
            <figure class="figure" v-on:click="clickProduct(product)">
              <img src="images/hospital.jpeg" class="figure-img img-fluid rounded" style="width: 200px; height: 200px;">
               <figcaption class="figure-caption text-right">{{product.name}}</figcaption>
            </figure>
          </div>
          {{selectProduct}}
          <!-- <div class="col-4">
            <figure class="figure">
              <img src="images/hospital.jpeg" class="figure-img img-fluid rounded" style="width: 200px; height: 200px;">
               <figcaption class="figure-caption text-right">A caption for the above image.</figcaption>
            </figure>
          </div>
          <div class="col-4">
            <figure class="figure">
              <img src="images/hospital.jpeg" class="figure-img img-fluid rounded" style="width: 200px; height: 200px;">
               <figcaption class="figure-caption text-right">A caption for the above image.</figcaption>
            </figure>
          </div> -->
        </div>
    </div>
</template>

<script>
    export default {
        computed:{
          products(){
            return this.$store.state.products
          },
          selectProduct(){
            return this.$store.state.selectProduct
          }
        },
        methods: {
          clickProduct(event) {
            console.log(event.name);
            this.$store.dispatch('productSelectCommit', event);
          }
        }
    }
</script>
