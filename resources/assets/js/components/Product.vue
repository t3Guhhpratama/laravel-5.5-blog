<template>
    <div class="container">
        <div class="row">
          <div class="col-4" v-for="product in products"  :key="product.id">
            <figure class="figure" v-on:click="clickProduct(product)">
              <img src="images/hospital.jpeg" class="figure-img img-fluid rounded" style="width: 200px; height: 200px;">
               <figcaption class="figure-caption text-right">{{product.name}}</figcaption>
            </figure>
          </div>
        </div>
        <div class="row">
          <div class="input-group">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Add!</button>
            </span>
            <input type="text" class="form-control" placeholder="Add name" aria-label="Search for...">
          </div>
        </div>
        <br />
        <div class="row">
          <ul class="list-group">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
          </ul>
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
