Desktop<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>
                    <button type="button" class="btn">
                      get
                    </button>
                    <div class="card-body">
                        I'm an example component.

                    </div>

                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
  data(){
    return{
      mesage:'hello'
    }
  },
  props:['items'],
  methods:{
    getitems(){
      this.cats.push(this.items);
      // axios.post('https://localhost:8000/api/map/distance', {'mail':distance_miles})
      //   .then(
      //           response => console.log(response.data)
      //       ).catch(
      //           error => console.log(error)
      //       )
    }
  },
  mounted() {
      console.log('Component mounted.');
  }
}
</script>
