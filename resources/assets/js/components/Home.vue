<template>
    <div class="container">
        <div class="row">
          <div class="btn-group" role="group">
            <button  v-on:click="loadData" type="button" class="btn btn-primary">Load data</button>
            <button v-on:click="userPage" type="button" class="btn btn-primary">Users</button>
            <button v-on:click="productPage" type="button" class="btn btn-primary">Product</button>
          </div>
        </div>
        <!-- <div class="row">
            <button v-on:click="loadData" type="button" class="btn btn-primary">Load data</button>
            <button v-on:click="loadUsers" type="button" class="btn btn-primary">Users</button>
        </div> -->
        <br />
        <div class="row">
          <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Slug</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(data, key) in userData">
                  <th scope="row">{{key+1}}</th>
                  <td>{{ data.name }}</td>
                  <td>{{ data.email }}</td>
                  <td>{{ data.slug }}</td>
                </tr>
              </tbody>
          </table>
        </div>
        <!-- <div class="row">
          <div class="editable"></div>
        </div> -->
        <div class="row">
          <medium-editor :text='text' :options='options' v-on:edit='processEditOperation' custom-tag='div'>
            </medium-editor>
        </div>
        <!-- <div class="row">
          <h1>Medium Editor</h1>
          <div class="editable">
              <h2>Font Awesome</h2>
              <p>My father’s family name being <a href="https://en.wikipedia.org/wiki/Pip_(Great_Expectations)">Pirrip</a>, and my Christian name Philip, my infant tongue could make of both names nothing longer or more explicit than Pip. So, I called myself Pip, and came to be called Pip.</p>
              <p>I give Pirrip as my father’s family name, on the authority of his tombstone and my sister,—Mrs. Joe Gargery, who married the blacksmith. As I never saw my father or my mother, and never saw any likeness of either of them (for their days were long before the days of photographs), my first fancies regarding what they were like were unreasonably derived from their tombstones...</p>
          </div>
        </div> -->
    </div>
</template>

<script>
    
    var text =
         '<p>A Vue 2 component for the the dead simple inline editor toolbar by <a href="https://yabwe.github.io/medium-editor/" target="_blank">yabwe</a>.</p>' +
         '<p><span class="highlight animated shake">Try highlighting this text.</span></p>'

    export default {

        mounted() {
            console.log('Component mounted.')
        },
        data(){
          return{
              text: text,
              userData: [],
              number: 0,
              message: [],
              activeColor: 'red',
              fontSize: 30
          }
        },
        methods:{
          processEditOperation: function (operation) {
            this.text = operation.api.origElements.innerHTML
          },
          changeColor(){
            this.activeColor = 'blue'
          },
          loadData:function(event){
          // GET /someUrl
            this.$http.get('/api/users').then(response => {

              // get body data
              this.userData = response.body;
            }, response => {
              // error callback
            });
          },
          userPage(){
            this.$router.push({path: 'user'});
          },
          productPage(){
            this.$router.push({path: 'product'});
          }
        }
    }
</script>
