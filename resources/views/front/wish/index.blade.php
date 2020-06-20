@extends('front.layouts.layout')

@section('content')
<div id="app" style="display:none;"></div>
<div id="app_wish" v-cloak>
  <section class="heading-content">
    <div class="heading-wrapper">
      <div class="container">
        <div class="row">
          <div class="page-heading-inner heading-group">
            <div class="breadcrumb-group">
              <h1 class="hidden">Wish List</h1>
              <div class="breadcrumb clearfix">
                <span itemscope="" itemtype="#"><a :href="base_uri" title="Fast Food" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a>
                </span>
                <span class="arrow-space"></span>
                <span itemscope="" itemtype="#">
                  <a :href="url" title="cart" itemprop="url"><span itemprop="title">Wish List</span></a>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="cart-content">
    <div class="cart-wrapper">
      <div class="container">
        <div class="row">
          <div id="shopify-section-cart-template" class="shopify-section">
            <span class="wishlist-count">@{{products.length}} Saved products</span>
            <div class="cart-inner">
              <div id="cart">
                <div class="cart-form">

                    <svg v-if="loading" style="width: 100px;margin-left: 40%;" version="1.1" id="L1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
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
                    <table v-if="!loading">
                      <thead>
                        <tr>
                          <th class="image" colspan="2">Product</th>
                          <th class="price">Price</th>
                          <th class="qty">Quantity</th>
                          <th class="total">Total</th>
                          <th class="remove">Remove</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="product in products">
                          <td class="image">
                            <div class="product_image">
                              <a :href="base_uri+'/product/'+product.product_id">
                                <vue-load-image>
                                   <img slot="image" width="100%" height="200px" :src="url_image+'admin/product/'+product.image" :alt="product.product_name"/>
                                   <img slot="preloader" :src="url_image+'svg/image-loader.8402b89.gif'" class="img-responsive"/>
                                   <div slot="error">about</div>
                                 </vue-load-image>
                              </a>
                            </div>
                          </td>
                          <td class="image-info">
                            <div class="product_name">
                              <a :href="base_uri+'/product/'+product.product_id">
                                @{{product.product_name}}
                              </a>
                              <div class="group_mobile">
                                <span class="price-mobile"><span class="money" :data-currency-usd="product.price">@{{product.price}}$</span></span>
                                <div class="quantity-mobile">
                                  <div class="quantity-wrapper">
                                    <div class="wrapper">
                                      <span class="quantity-title">Quantity</span>
                                      <input type="text" size="4" :value="product.quantity" @input="change_quan" @change="change_quantity(product._id)"  class="tc item-quantity-mobile quantity-value">
                                    </div>
                                    <button class="btn btn-danger" style="width:100%" type="submit">Add To Cart</button>
                                    <!--End wrapper-->
                                  </div>
                                </div>
                              </div>
                              <div class="group_mobile">
                                <div class="remove-mobile">
                                  <a href="#" class="cart"><span class="lnr lnr-trash"></span></a>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="price"><span class="money" :data-currency-usd="product.price">@{{product.price}}$</span></td>
                          <td class="qty">
                            <form  :action="base_uri+'cart'" method="post">
                              @csrf
                              <input type="hidden" name="product_id" :value="product.product_id">
                              <input type="hidden" name="price" :value="product.price">
                              <input type="hidden" name="size" :value="product.size">
                              <div class="quantity-wrapper">
                                <div class="wrapper">
                                  <input type="text" size="4" name="quantity" :value="product.quantity"  class="tc item-quantity quantity-value">
                                </div>
                                <button class="btn btn-danger" style="width:100%" type="submit">Add To Cart</button>
                                <!--End wrapper-->
                              </div>
                            </form>

                            <!--End quantily wrapper-->
                          </td>
                          <td class="total title-1"><span class="money" :data-currency-usd="product.total_price">@{{product.total_price}}$</span></td>
                          <td class="remove"><a href="#" @click.prevent="remove_wish(product._id)" class="cart"><span class="lnr lnr-trash"></span></a></td>
                        </tr>
                        <tr class="summary">
                          <td class="total_label" colspan="5">Subtotal</td>
                          <td class="price" colspan="1"><span class="total"><strong><span class="money" :data-currency-usd="sub_total">@{{sub_total}}$</span></strong>
                            </span>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<style media="screen">
.wishlist-count{
  text-align: center;
  text-transform: uppercase;
  color: #444;
  display: block;
  margin-bottom: 20px;
  font-weight: 600;
}
[v-cloak] > * { display: none; }
[v-cloak]::before {
  content: '';
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

</style>

@endsection
@section('script')
<script type="text/javascript">
  const new_vus = new Vue({
    el:"#app_wish",
    data:{
      products:[],
      check_out:{'info': '' , 'ship_val':'' , 'stata' : '' , 'zip' : '' , 'city' : ''},
      sub_total:'',
      quantity:0,
      loading:false,
      url:'{{asset(App::getLocale()."/wishlist")}}/',
      url_image: '{{asset("/")}}',
      base_uri:'{{asset(App::getLocale()."/")}}/',
    },
    methods:{
      get_wish(){
        var _this = this;
        this.loading = true;
        axios.get(this.url+'get/data').then(function(response){
          _this.products = response.data.products
          _this.sub_total= response.data.sub_total
          _this.loading = false;
        })
      },
      remove_wish(id){
        var _this = this;
        this.loading = true;
        axios.delete(this.url+id).then(function(response){
          _this.get_wish()
        })
      }
    },
    mounted(){
      this.get_wish();
    }

  })
</script>
<script>
  $(window).ready(function($) {
    $(".quantity-mobile input").change(function() {
      var qty = $(this).val();
      $(this).parents('tr').find('.item-quantity').val(qty);
    });
  });
</script>
@endsection
