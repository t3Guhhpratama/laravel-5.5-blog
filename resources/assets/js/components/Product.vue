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
           <button v-on:click="show = !show">
             Toggle
           </button>
           <transition name="fade">
             <p v-if="show">
               <img src="images/hospital.jpeg" class="figure-img img-fluid rounded" style="width: 200px; height: 200px;">
             </p>
           </transition>
        </div>
        <!-- <div class="row">
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
        </div> -->
    </div>
</template>
<script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.min.js"></script>
<style>
  .fade-enter-active, .fade-leave-active {
  transition: opacity .5s
  }
  .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0
  }
</style>
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
        data(){
          return{
            show: false
          }
        },
        methods: {
          clickProduct(event) {
            console.log(event.name);
            this.$store.dispatch('productSelectCommit', event);
          },
          beforeEnter: function (el) {
            this.style.opacity = 0
          },
          enter: function (el, done) {
            Velocity(el, { opacity: 1, fontSize: '1.4em' }, { duration: 300 })
            Velocity(el, { fontSize: '1em' }, { complete: done })
          },
          leave: function (el, done) {
            Velocity(el, { translateX: '15px', rotateZ: '50deg' }, { duration: 600 })
            Velocity(el, { rotateZ: '100deg' }, { loop: 2 })
            Velocity(el, {
              rotateZ: '45deg',
              translateY: '30px',
              translateX: '30px',
              opacity: 0
            }, { complete: done })
          }
        }
    }
</script>
