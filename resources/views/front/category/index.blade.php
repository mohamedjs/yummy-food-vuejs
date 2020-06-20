@extends('front.layouts.layout')

@section('content')
<div id="app" style="display:none"></div>
<div id="vue-product" v-cloak>
  <section class="heading-content">
    <div class="heading-wrapper">
      <div class="container">
        <div class="row">
          <div class="page-heading-inner heading-group">
            <div class="breadcrumb-group">
              <h1 class="hidden">Category</h1>
              <div class="breadcrumb clearfix">
                <span itemscope="" itemtype="#"><a :href="base_uri" title="Fast Food" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a>
                </span>
                <span class="arrow-space"></span>
                <span itemscope="" itemtype="#">
                  <a :href="url+'/'+category._id" :title="category.category_name" itemprop="url"><span itemprop="title">@{{category.category_name}}</span></a>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="collection-layout">
    <div class="collection-wrapper">
      <div class="container">
        <div class="row">
          <div id="shopify-section-collection-template" class="shopify-section">
            <div class="collection-inner collection-sidebar">
              <!-- Tags loading -->
              <div id="tags-load" style="display:none;"><i class="fa fa-spinner fa-pulse fa-2x"></i></div>
              <div id="collection">
                <div class="clearfix">
                  <div class="collection-toolbar _mobile col-sm-9">
                    <a :href="base_uri" class="collection-banner-top">
                      <vue-load-image>
                         <img slot="image" :src="about.image" class="img-responsive"/>
                         <img slot="preloader" :src="url_image+'svg/image-loader.8402b89.gif'" class="img-responsive"/>
                         <div slot="error">about</div>
                       </vue-load-image>

                    </a>
                    <div class="group_toolbar">
                      <div class="group-left">
                        <div class="filter-mobile">
                          <a href="javascript:void(0)" class="filter-icon">
                            <span class="cs-icon icon-filter"></span>
                          </a>
                        </div>
                        <!-- Sort by -->
                        <div class="sortBy">
                          <div class="dropdown-toggle" data-toggle="dropdown">
                            <span class="toolbar-title">Sort by</span>
                            <button class="sortButton">
                              <span class="name">Featured</span><i class="fa fa-caret-down"></i>
                            </button>
                            <i class="sub-dropdown1"></i>
                            <i class="sub-dropdown"></i>
                          </div>
                          <div class="sortBox control-container dropdown-menu">
                            <ul class="sortForm list-unstyled option-set text-left list-styled" data-option-key="sortBy">
                              <li class="sort price-ascending"    @click="filter('price_small','asc')"><a href="#">Price, low to high</a></li>
                              <li class="sort price-descending"   @click="filter('price_small','asc')"><a href="#">Price, high to low</a></li>
                              <li class="sort title-ascending"    @click="filter('title','asc')"><a href="#">Alphabetically, A-Z</a></li>
                              <li class="sort title-descending"   @click="filter('title','desc')"><a href="#">Alphabetically, Z-A</a></li>
                              <li class="sort created-ascending"  @click="filter('created_at','asc')"><a href="#">Date, old to new</a></li>
                              <li class="sort created-descending" @click="filter('created_at','desc')"><a href="#">Date, new to old</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="collection-content">
                  <div class="collection-leftsidebar sidebar col-sm-3 clearfix">
                    <div class="collection-leftsidebar-group">
                      <div class="sidebar-block collection-block">
                        <h3 class="sidebar-title">
                          <span class="text">Categories</span>
                          <span class="cs-icon icon-minus"></span>
                        </h3>
                        <div class="sidebar-content">
                          <ul class="list-cat">
                            <li v-for="category in categorys" :class="[category._id === id? 'active' : '']"><a :href="url+'/'+category._id">@{{category.category_name}} </a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="sidebar-block latest-block">
                        <h3 class="sidebar-title">
                          <span class="text">LATEST</span>
                          <span class="cs-icon icon-minus"></span>
                        </h3>
                        <div class="sidebar-content">
                          <div class="latest-inner">
                            <div class="products-item" v-for="product in all_product">
                              <div class="row-container product-circle">
                                <div class="product home_product">
                                  <div class="row-left">
                                    <a :href="uri+product._id" class="container_item">
                                      <div class="hoverBorderWrapper">
                                        <vue-load-image>
                                           <img slot="image" :src="url_image+'admin/product/'+product.images[0].image" class="img-responsive"/>
                                           <img slot="preloader" :src="url_image+'svg/image-loader.8402b89.gif'" class="img-responsive"/>
                                           <div slot="error">@{{product.product_name}}</div>
                                         </vue-load-image>

                                        <div class="mask"></div>
                                      </div>
                                    </a>
                                  </div>
                                  <div class="row-right">
                                    <div class="product-title"><a class="title-5" href="product.html">@{{product.product_name}}</a></div>
                                    <div class="rating-star">
                                      <span class="spr-badge" :data-rating="product.rate">
                                        <span class="spr-starrating spr-badge-starrating">
                                          <i class="spr-icon spr-icon-star" style="" v-for="i in product.rate"></i>
                                          <i class="spr-icon spr-icon-star spr-icon-star-empty" style="" v-for="i in  getnumber(product.rate)"></i>
                                        </span>
                                        <span class="spr-badge-caption">@{{product.count_user}} review</span>
                                      </span>
                                    </div>
                                    <div class="product-price">
                                      <span class="price_sale"><span class="money" :data-currency-usd="product.price_small-(product.price_small*product.discount/100)" data-currency="USD">@{{product.price_small-(product.price_small*product.discount/100)}}$</span></span>
                                      <del class="price_compare"> <span class="money" :data-currency-usd="product.price_small" data-currency="USD">@{{product.price_small}}$</span></del>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- filter tags group -->
                      <div class="sidebar-block filter-block">
                        <h3 class="sidebar-title">
                          <span class="text">Color</span>
                          <span class="cs-icon icon-minus"></span>
                        </h3>
                        <div class="sidebar-content">
                          <ul class="filter-content filter-color">
                            <li v-for="product in all_product" :data-handle="product.colors[0].color" class="swatch-tag "><a href="#" @click="filter_by_color(product.colors[0]._id)" :title="'Narrow selection to products matching tag'+ product.colors[0].color"><span :style="'background-color:'+ product.colors[0].color" class="color-swatch btooltip" :title="product.colors[0].color"></span></a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="sidebar-block filter-block">
                        <h3 class="sidebar-title">
                          <span class="text">Size</span>
                          <span class="cs-icon icon-minus"></span>
                        </h3>
                        <div class="sidebar-content">
                          <ul class="filter-content ">
                            <li data-handle="small" @click="filter_by_size('small')"><a href="#" title="Narrow selection to products matching tag Small"><span class="fe-checkbox"></span> Small</a></li>
                            <li data-handle="medium" @click="filter_by_size('medium')"><a href="#" title="Narrow selection to products matching tag Medium"><span class="fe-checkbox"></span> Medium</a></li>
                            <li data-handle="large" @click="filter_by_size('large')"><a href="#" title="Narrow selection to products matching tag Large"><span class="fe-checkbox"></span> Large</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="sidebar-block filter-block">
                        <h3 class="sidebar-title">
                          <span class="text">Price</span>
                          <span class="cs-icon icon-minus"></span>
                        </h3>
                        <div class="sidebar-content">
                          <ul class="filter-content ">
                            <li data-handle="under-100" @click="filter_by_price('under-100')"><a href="#" title="Narrow selection to products matching tag Under $100"><span class="fe-checkbox"></span> Under $100</a></li>
                            <li data-handle="100-200"   @click="filter_by_price('100-200')"><a href="#" title="Narrow selection to products matching tag $100 - $200"><span class="fe-checkbox"></span> $100 - $200</a></li>
                            <li data-handle="above-200" @click="filter_by_price('above-200')"><a href="#" title="Narrow selection to products matching tag Above $200"><span class="fe-checkbox"></span> Above $200</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="sidebar-block filter-block">
                        <h3 class="sidebar-title">
                          <span class="text">Topping</span>
                          <span class="cs-icon icon-minus"></span>
                        </h3>
                        <div class="sidebar-content">
                          <ul class="filter-content ">
                            <li :data-handle="product.toppings[0].topping_name" v-for="product in all_product"><a @click="filter_by_topping(product.toppings[0]._id)" href="#" :title="'Narrow selection to products matching tag '+product.toppings[0].topping_name"><span class="fe-checkbox"></span>@{{product.toppings[0].topping_name}}</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="sidebar-block type-block">
                        <h3 class="sidebar-title">
                          <span class="text">Type List</span>
                          <span class="cs-icon icon-minus"></span>
                        </h3>
                        <div class="sidebar-content">
                          <ul class="type-content">
                            <!--type-->
                            <li :class="[category._id === id? 'active' : '']" v-for="category in categorys" v-if="!category.cat_id">
                              <a :href="url+'/'+category._id" title="Drink">@{{category.category_name}}</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="sidebar-block banner-block">
                        <div class="sidebar-content">
                          <a href="#">
                            <vue-load-image>
                               <img slot="image" :src="about.image" class="img-responsive"/>
                               <img slot="preloader" :src="url_image+'svg/image-loader.8402b89.gif'" class="img-responsive"/>
                               <div slot="error">about</div>
                             </vue-load-image>
                          </a>
                        </div>
                      </div>
                      <div class="sidebarMobile sidebar-bottom">
                        <button class="sidebarMobile-clear _btn">
                          Clear All
                        </button>
                        <button class="sidebarMobile-close _btn">
                          Apply &amp; Close
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="collection-mainarea  col-sm-9 clearfix">

                    <div class="collection-toolbar _desktop">
                      <a :href="base_uri" class="collection-banner-top">
                        <vue-load-image>
                           <img slot="image" :src="about.image" class="img-responsive"/>
                           <img slot="preloader" :src="url_image+'svg/image-loader.8402b89.gif'" class="img-responsive"/>
                           <div slot="error">about</div>
                         </vue-load-image>
                      </a>
                      <div class="group_toolbar">
                        <div class="group-left">
                          <div class="filter-mobile">
                            <a href="javascript:void(0)" class="filter-icon">
                              <span class="cs-icon icon-filter"></span>
                            </a>
                          </div>
                          <!-- Sort by -->
                          <div class="sortBy">
                            <div class="dropdown-toggle" data-toggle="dropdown">
                              <span class="toolbar-title">Sort by</span>
                              <button class="sortButton">
                                <span class="name">Featured</span><i class="fa fa-caret-down"></i>
                              </button>
                              <i class="sub-dropdown1"></i>
                              <i class="sub-dropdown"></i>
                            </div>
                            <div class="sortBox control-container dropdown-menu">
                              <ul class="sortForm list-unstyled option-set text-left list-styled" data-option-key="sortBy">
                                <li class="sort price-ascending"    @click="filter('price_small','asc')"><a href="#">Price, low to high</a></li>
                                <li class="sort price-descending"   @click="filter('price_small','asc')"><a href="#">Price, high to low</a></li>
                                <li class="sort title-ascending"    @click="filter('title','asc')"><a href="#">Alphabetically, A-Z</a></li>
                                <li class="sort title-descending"   @click="filter('title','desc')"><a href="#">Alphabetically, Z-A</a></li>
                                <li class="sort created-ascending"  @click="filter('created_at','asc')"><a href="#">Date, old to new</a></li>
                                <li class="sort created-descending" @click="filter('created_at','desc')"><a href="#">Date, new to old</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <!-- View as -->
                        <div class="grid_list">
                          <ul class="list-inline option-set hidden-xs" data-option-key="layoutMode">
                            <li data-option-value="fitRows" id="goGrid" class="active goAction" data-toggle="tooltip" data-placement="top" title="" data-original-title="Grid">
                              <i class="icon-small icon-small-grid"></i>
                            </li>
                            <li data-option-value="straightDown" id="goList" class="goAction" data-toggle="tooltip" data-placement="top" title="" data-original-title="List">
                              <i class="icon-small icon-small-list"></i>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="collection-items clearfix">
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
                      <div class="products" v-if="!loading">
                        <div class="product-item col-sm-4 " v-if="products" v-for="product in products">
                          <div class="product product-circle">
                            <div class="row-left">
                              <a :href="uri+product._id" class="hoverBorder container_item">
                                <div class="hoverBorderWrapper">
                                  <vue-load-image>
                                     <img slot="image" :src="url_image+'admin/product/'+product.images[0].image" class="img-responsive front" style="height:200px"/>
                                     <img slot="preloader" :src="url_image+'svg/image-loader.8402b89.gif'" class="img-responsive"/>
                                     <div slot="error">@{{product.product_name}}</div>
                                   </vue-load-image>
                                  <div class="mask"></div>
                                </div>
                              </a>
                              <div class="product-label">
                                <div class="label-element deal-label">
                                  <span>@{{product.discount}}%</span>
                                </div>
                              </div>
                              <div class="hover-mask grid-mode">
                                <div class="group-mask">
                                  <div class="inner-mask">
                                    <div class="group-actionbutton">
                                      <ul class="quickview-wishlist-wrapper">
                                        <li class="wishlist wishlist-click-ajax" :data-productid="product._id">
                                          <a title="Add To Wishlist" class="wishlist wishlist-coke" data-wishlisthandle="coke"><span class="cs-icon icon-heart"></span></a>
                                        </li>
                                        <li class="quickview hidden-xs hidden-sm quickview-click-ajax" :data-productid="product._id">
                                          <div class="product-ajax-cart">
                                            <span class="overlay_mask"></span>
                                            <div data-handle="coke" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
                                              <a class=""><span class="cs-icon icon-eye"></span></a>
                                            </div>
                                          </div>
                                        </li>
                                        <li class="compare compare-click-ajax" :data-productid="product._id">
                                          <a title="Add To Cart" class="compare compare-coke" data-comparehandle="coke"><span class="fa fa-shopping-cart"></span></a>
                                        </li>
                                      </ul>
                                    </div>
                                    <form action="#" method="post">
                                      <div class="effect-ajax-cart">
                                        <input type="hidden" name="quantity" value="1">
                                        <button class="_btn select-option" type="button" onclick="window.location='#" title="Select Option"><span class="cs-icon icon-menu"></span>Select options</button>
                                      </div>
                                    </form>
                                  </div>
                                  <!--inner-mask-->
                                </div>
                                <!--Group mask-->
                              </div>
                            </div>
                            <div class="row-right animMix">
                              <div class="grid-mode">
                                <div class="rating-star">
                                  <span class="spr-badge" :data-rating="product.rate">
                                    <span class="spr-starrating spr-badge-starrating">
                                      <i class="spr-icon spr-icon-star" style="" v-for="i in product.rate"></i>
                                      <i class="spr-icon spr-icon-star spr-icon-star-empty" style="" v-for="i in  getnumber(product.rate)"></i>
                                    </span>
                                    <span class="spr-badge-caption">@{{product.count_user}} review</span>
                                  </span>
                                </div>
                                <div class="product-title"><a class="title-5" :href="uri+product._id">@{{product.product_name}}</a></div>
                                <div class="product-price">
                                  <span class="price_sale"><span class="money" :data-currency-usd="product.price_small-(product.price_small*product.discount/100)" data-currency="USD">@{{product.price_small-(product.price_small*product.discount/100)}}$</span></span>
                                  <del class="price_compare"> <span class="money" :data-currency-usd="product.price_small" data-currency="USD">@{{product.price_small}}$</span></del>
                                </div>
                              </div>
                              <div class="list-mode hide">
                                <div class="list-collection-left">
                                  <div class="group">
                                    <div class="product-title"><a class="title-5" :href="uri+product._id">@{{product.product_name}}</a></div>
                                    <div class="rating-star">
                                      <span class="spr-badge" :data-rating="product.rate">
                                        <span class="spr-starrating spr-badge-starrating">
                                          <i class="spr-icon spr-icon-star" style="" v-for="i in product.rate"></i>
                                          <i class="spr-icon spr-icon-star spr-icon-star-empty" style="" v-for="i in  getnumber(product.rate)"></i>
                                        </span>
                                        <span class="spr-badge-caption">@{{product.count_user}} review</span>
                                      </span>
                                    </div>
                                  </div>
                                  <div class="product-price">
                                    <span class="price_sale"><span class="money" :data-currency-usd="product.price_small-(product.price_small*product.discount/100)" data-currency="USD">@{{product.price_small-(product.price_small*product.discount/100)}}$</span></span>
                                    <del class="price_compare"> <span class="money" :data-currency-usd="product.price_small" data-currency="USD">@{{product.price_small}}$</span></del>
                                  </div>
                                </div>
                                <div class="list-collection-right">
                                  <div class="product-description">
                                    @{{product.datiles.substring(0, 200)}}
                                  </div>
                                  <div class="group-actionbutton">
                                    <form class="product-addtocart" action="#" method="post">
                                      <div class="effect-ajax-cart">
                                        <input type="hidden" name="quantity" value="1">
                                        <button class="_btn select-option" type="button" onclick="window.location='#" title="Select Option"><span class="cart-title">Select options</span></button>
                                      </div>
                                    </form>
                                    <ul class="quickview-wishlist-wrapper">
                                      <li class="wishlist wishlist-click-ajax" :data-productid="product._id">
                                        <a title="Add To Wishlist" class="wishlist wishlist-coke" data-wishlisthandle="coke"><span class="cs-icon icon-heart"></span></a>
                                      </li>
                                      <li class="quickview hidden-xs hidden-sm quickview-click-ajax" :data-productid="product._id">
                                        <div class="product-ajax-cart">
                                          <span class="overlay_mask"></span>
                                          <div data-handle="coke" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
                                            <a class=""><span class="cs-icon icon-eye"></span></a>
                                          </div>
                                        </div>
                                      </li>
                                      <li class="compare compare-click-ajax" :data-productid="product._id">
                                        <a title="Add To Cart" class="compare compare-coke" data-comparehandle="coke"><span class="fa fa-shopping-cart"></span></a>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="collection-bottom-toolbar">
                      <div class="product-counter col-sm-6">
                        Items 1 to @{{pagination.last_page}} of @{{pagination.total}} total
                      </div>
                      <div class="product-pagination col-sm-6">
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
                                  <a @click.prevent="changePage(pagination.path+'?page='+page)" href="#">@{{ page }}</a>
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
                  </div>
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

  const app = new Vue({
    el:'#vue-product',
    data:{
      uri:"{{asset(App::getLocale().'/product')}}/",
      url:"{{asset(App::getLocale().'/category')}}",
      base_uri:"{{asset(App::getLocale().'/')}}",
      url_image:"{{asset('/')}}",
      url_get :"{{asset(App::getLocale().'/category/get/'.$id)}}",
      id:        "{{$id}}",
      category : [],
      categorys: [],
      type_list: [],
      about:     [],
      products:  [],
      pagination:[],
      loading:false,
      all_product:[]
    },
    methods:{
      get_item(){
        this.loading = true;
        var _this = this
        axios.get(this.url_get).then(function(response){
          _this.category = response.data.category
          _this.about    = response.data.about
          _this.categorys= response.data.categorys
          _this.all_product= _.shuffle(response.data.all_product)
          _this.products = _.shuffle(response.data.products.data)
          _this.pagination = response.data.products
          _this.loading = false;
        })

      },
      changePage(uri){
        this.url_get = uri ;
        this.get_item();
      },

      filter(column,sort_type){
        this.loading = true;
        var _this = this
        axios.get(this.url_get+'?column='+column+'&sort_type='+sort_type).then(function(response){
          _this.category = response.data.category
          _this.about    = response.data.about
          _this.categorys= response.data.categorys
          _this.all_product= _.shuffle(response.data.all_product)
          _this.products = _.shuffle(response.data.products.data)
          _this.pagination = response.data.products
          _this.loading = false;
        })
      },

      getnumber(num){
         return 5-num?5-num:5;
      }
    },
    created(){
      this.get_item()
      console.log(this.url_image+'svg/image-loader.8402b89.gif');
    }
  });
</script>
@endsection
