<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                      <div class="row">
                        <form>
                          <div class="form-group">
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                          </div>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
