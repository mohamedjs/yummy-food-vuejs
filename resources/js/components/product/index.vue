<template lang="html">
  <div class="media-gallery">
    <div class="inner-body mg-main">
      <div class="inner-toolbar clearfix">
        <ul>
          <li>
            <a href="#">
              <select class="form-control input-sm mb-md" @change="offset_number()" v-model="offset">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value ="50">50</option>
                <option value="100">100</option>
              </select>
            </a>
          </li>
          <li>
            <a href="#">
                <input type="text" class="form-control" @keyup="search()" v-model="search_key" name="q" id="q" placeholder="Search...">
            </a>
          </li>
          <li class="right" >
            <ul class="nav nav-pills nav-pills-primary">
              <li>
                <label>Filter:</label>
              </li>
              <li  >
                <a href="#">
                  <select class="form-control input-sm mb-md" @change="filter()" v-model="product_id">
                    <option v-for="cat in cats" :value="cat._id">{{cat.category_name}}</option>
                  </select>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <a :href="base_url+'/adminpanel/product/create'" class="mb-xs mt-xs mr-xs btn btn-success" > <i class="fa fa-plus"></i> Add Product</a>
      <div class="row mg-files">
        <svg v-if="loading" style="width: 100px;margin-left: 40%;" version="1.1" id="L1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
          <circle fill="none" stroke="#9A0000" stroke-width="6" stroke-miterlimit="15" stroke-dasharray="14.2472,14.2472" cx="50" cy="50" r="47" >
            <animateTransform
               attributeName="transform"
               attributeType="XML"
               type="rotate"
               dur="5s"
               from="0 50 50"
               to="360 50 50"
               repeatCount="indefinite" />
          </circle>
          <circle fill="none" stroke="#9A0000" stroke-width="1" stroke-miterlimit="10" stroke-dasharray="10,10" cx="50" cy="50" r="39">
              <animateTransform
                 attributeName="transform"
                 attributeType="XML"
                 type="rotate"
                 dur="5s"
                 from="0 50 50"
                 to="-360 50 50"
                 repeatCount="indefinite" />
          </circle>
          <g fill="#9A0000">
          <rect x="30" y="35" width="5" height="30">
            <animateTransform
               attributeName="transform"
               dur="1s"
               type="translate"
               values="0 5 ; 0 -5; 0 5"
               repeatCount="indefinite"
               begin="0.1"/>
          </rect>
          <rect x="40" y="35" width="5" height="30" >
            <animateTransform
               attributeName="transform"
               dur="1s"
               type="translate"
               values="0 5 ; 0 -5; 0 5"
               repeatCount="indefinite"
               begin="0.2"/>
          </rect>
          <rect x="50" y="35" width="5" height="30" >
            <animateTransform
               attributeName="transform"
               dur="1s"
               type="translate"
               values="0 5 ; 0 -5; 0 5"
               repeatCount="indefinite"
               begin="0.3"/>
          </rect>
          <rect x="60" y="35" width="5" height="30" >
            <animateTransform
               attributeName="transform"
               dur="1s"
               type="translate"
               values="0 5 ; 0 -5; 0 5"
               repeatCount="indefinite"
               begin="0.4"/>
          </rect>
          <rect x="70" y="35" width="5" height="30" >
            <animateTransform
               attributeName="transform"
               dur="1s"
               type="translate"
               values="0 5 ; 0 -5; 0 5"
               repeatCount="indefinite"
               begin="0.5"/>
          </rect>
          </g>
        </svg>
        <div class="isotope-item col-sm-6 col-md-4 col-lg-3" v-if="!loading" v-for="product in products">
          <div class="thumbnail">
            <div class="thumb-preview">
              <a class="thumb-image" :href="url_image+'admin/product/'+product.images[0].image">
                <vue-load-image>
                   <img slot="image" :src="url_image+'admin/product/'+product.images[0].image" class="img-responsive"/>
                   <img slot="preloader" :src="url_image+'svg/image-loader.8402b89.gif'" class="img-responsive"/>
                   <div slot="error">{{product.product_name}}</div>
                 </vue-load-image>

              </a>
              <div class="mg-thumb-options">
                <div class="mg-zoom"><i class="fa fa-trash-o" @click="delete_pro(product._id)"></i></div>
                <div class="mg-toolbar">
                  <div class="mg-option checkbox-custom checkbox-inline">
                    <input type="checkbox" id="file_2" value="1">
                    <label for="file_2">SELECT</label>
                  </div>
                  <div class="mg-group pull-right">
                    <a :href="base_url+'/adminpanel/product/'+product._id+'/edit'">EDIT</a>
                    <button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
                      <i class="fa fa-caret-up"></i>
                    </button>
                    <ul class="dropdown-menu mg-menu" role="menu">
                      <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                      <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <h5 class="mg-title text-semibold">{{product.product_name}}</h5>
            <div class="mg-description">
              <small class="pull-left text-muted">{{product.category.category_name}}</small>
              <small class="pull-right text-muted">{{product.created_at}}</small>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <ul class="pagination">
            <li :class="[ pagination.prev_page_url===null ? 'disabled' : '']">
                <a href="#" aria-label="Previous"
                   @click.prevent="changePage(pagination.prev_page_url)">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
            <li v-for="page in pagination.last_page"
            :class="[ page == pagination.current_page ? 'active' : '']">
                <a @click.prevent="changePage(pagination.path+'?page='+page)" href="#">{{ page }}</a>
            </li>
            <li :class="[ pagination.next_page_url===null ? 'disabled' : '']">
                <a href="#" aria-label="Next"
                   @click.prevent="changePage(pagination.next_page_url)">
                    <span aria-hidden="true">»</span>
                </a>
           </li>
       </ul>
     </nav>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      base_url:'',
      url_image:'',
      offset:'',
      search_key:'',
      cats:'',
      uri:'',
      product_id:'',
      loading:false,
      load:true,
      products:[],
      pagination:[]
    }
  },
  props:['url','url_images'],
  methods:{
    get_product(){
      this.loading = true;
      var uri=this.uri;
      var _this = this;
      axios.get(uri).then(function(response){
        _this.products=response.data.products.data;
        _this.pagination=response.data.products;
        _this.cats = response.data.cats;
        _this.loading = false;
      });
    },
    offset_number(){
      this.loading = true;
      var uri=this.base_url+'/adminpanel/product/filter/'+this.offset;
      var _this = this;
      axios.get(uri).then(function(response){
        _this.products=response.data.data;
        _this.pagination=response.data;
        _this.loading = false;
      });
    },
    search(){
      this.loading = true;
      var uri=this.base_url+'/adminpanel/product/search/'+this.search_key;
      var _this = this;
      axios.get(uri).then(function(response){
        _this.products=response.data.data;
        _this.pagination=response.data;
        _this.loading = false;
      });
    },
    filter(){
      this.loading = true;
      var uri=this.base_url+'/adminpanel/product/category/get/'+this.product_id;
      var _this = this;
      axios.get(uri).then(function(response){;
        _this.products=response.data.data;
        _this.pagination=response.data;
        _this.loading = false;
      });
    },
    changePage(uri){
      this.uri = uri ;
      this.get_product();
    },
    delete_pro(id){
      var uri=this.base_url+'/adminpanel/product/'+id;
      var _this = this;
      axios.delete(uri).then(function(response){
        _this.get_product();
      });
    }
  },

  mounted(){
    this.base_url=this.url
    this.url_image=this.url_images
    this.uri=this.base_url+'/adminpanel/products'
    this.get_product()
  }

}
</script>

<style lang="css">
.nav-pills li a{
  cursor: pointer;
}
</style>
