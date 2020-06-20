@extends('front.layouts.layout')

@section('content')
<div id="app" style="display:none"></div>
<div id="shopify-section-1507179171162" class="shopify-section index-section index-section-slideshow">
    <div data-section-id="1507179171162" data-section-type="slideshow-section">
        <section class="home-slideshow-layout">
            <div class="home-slideshow-wrapper">
                <div class="group-home-slideshow">
                    <div class="home-slideshow-inner">
                        <div class="home-slideshow-content slideshow_1507179171162">
                            <ul>
                              @foreach($products->shuffle()->take(3) as $product)
                              <li data-transition="random-static" data-masterspeed="2000" data-saveperformance="on">
                                <img src="{{asset('admin/product/'.$product->images[0]->image)}}" data-lazyload="{{asset('admin/product/'.$product->images[0]->image)}}" alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                                <div class="slideshow-caption position-left transition-fade">
                                  <div class="group">
                                    <a href="collections.html">
                                      <img src="{{asset('admin/product/'.$product->images[0]->image)}}" alt="" />
                                    </a>
                                    <a class="_btn" href="{{asset(App::getLocale().'/category/'.$product->category->_id)}}">Find out more!</a>
                                  </div>
                                </div>
                              </li>
                              @endforeach
                            </ul>
                            <div class="tp-bannertimer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div id="shopify-section-1509012157667" class="shopify-section index-section index-section-banner">
  <div data-section-id="1509012157667" data-section-type="banner-section">
    <section class="home-banslider-layout">
      <div class="container">
        <div class="row">
          <div class="home-banslider-inner">
            <div class="home-banslider-content">
              @foreach($categorys as $cat)
              @if(count($cat->sub_category)>0 || !$cat->category)
              <div class="banslider-item not-animated" data-animate="zoomIn" data-delay="100">
                <a href="{{asset(App::getLocale().'/category/'.$cat->_id)}}">
                  <img src="{{asset('admin/category/'.$cat->category_icon)}}" height="200px" alt="" title="">
                </a>
              </div>
              @endif
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<div id="shopify-section-1509012338884" class="shopify-section index-section index-section-welcome">
          <div data-section-id="1509012338884" data-section-type="welcome-section">
              <section class="home-welcome-layout not-animated" data-animate="zoomIn" data-delay="200">
                  <div class="container">
                      <div class="row">
                          <div class="home-welcome-inner">
                              <h2 class="page-title">Welcome to {{$about->company_name}}!</h2>
                              <div class="home-welcome-content">
                                  <span class="welcome-caption">
                                    {{$about->about_us}}
                                  </span>
                                  <img class="welcome-banner" src="{{$about->image}}" alt="" title="">
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
          </div>
      </div>
@foreach($categorys->shuffle() as $category)
@if(!$category->category)
  <!-- not have parent but have child -->
  @if(count($category->sub_category) > 0)
    <div class="shopify-section index-section index-section-product">
      <div data-section-id="1509012370397" data-section-type="product-section">
        <section class="home-product-layout">
          <div class="container">
            <div class="row">
              <div class="banner-product-title not-animated" data-animate="fadeInUp" data-delay="200" style="background-image:  url({{asset('admin/category/'.$category->category_icon)}});">
                <div class="title-content">
                  <h2>{{$category->category_name}}</h2>
                </div>
              </div>
              <div class="home-product-inner">
                <div class="home-product-content">
                  @foreach($category->sub_category->shuffle() as $key => $sub)
                  @if(count($sub->products) > 0 && $key!=4)
                  @foreach($sub->products->shuffle()->take(1) as $product)
                  <div class="content_product col-sm-3 not-animated" data-animate="fadeInUp" data-delay="100">
                    <div class="row-container product list-unstyled clearfix product-circle">
                      <div class="row-left">
                        <a href="{{asset(App::getLocale().'/product/'.$product->_id)}}" class="hoverBorder container_item">
                          <div class="hoverBorderWrapper">
                            <img src="{{asset('admin/product/'.$product->images->shuffle()[0]->image)}}" style="height:200px" height="200px" class="img-responsive front" alt="Coke">
                            <div class="mask"></div>
                          </div>
                        </a>
                        <div class="hover-mask">
                          <div class="group-mask">
                            <div class="inner-mask">
                              <div class="group-actionbutton">
                                <ul class="quickview-wishlist-wrapper">
                                  <li class="wishlist wishlist-click-ajax" data-productid="{{$product->_id}}">
                                    <a title="Add To Wishlist"  class="wishlist wishlist-coke" data-wishlisthandle="coke"><span class="cs-icon icon-heart"></span></a>
                                  </li>
                                  <li class="quickview hidden-xs hidden-sm quickview-click-ajax" data-productid="{{$product->_id}}">
                                    <div class="product-ajax-cart">
                                      <span class="overlay_mask"></span>
                                      <div data-handle="coke" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
                                        <a class=""><span class="cs-icon icon-eye"></span></a>
                                      </div>
                                    </div>
                                  </li>
                                  <li class="compare compare-click-ajax" data-productid="{{$product->_id}}">
                                    <a title="Add To Cart"  class="compare compare-coke" data-comparehandle="coke"><span class="fa fa-shopping-cart"></span></a>
                                  </li>
                                </ul>
                              </div>
                              <form action="#" method="post">
                                <div class="effect-ajax-cart">
                                  <button class="_btn select-option" type="button" onclick="window.location='{{asset(App::getLocale().'/product/'.$product->_id)}}';" title="Show Product">Show Products</button>
                                </div>
                              </form>
                            </div>
                            <!--inner-mask-->
                          </div>
                          <!--Group mask-->
                        </div>
                        <div class="product-label">
                          <div class="label-element deal-label">
                            <span>{{$product->discount}}%</span>
                          </div>
                        </div>
                      </div>
                      <div class="row-right animMix">
                        <div class="rating-star">
                          <span class="spr-badge" data-rating="{{$product->rate($product->_id)->rate}}"><span class="spr-starrating spr-badge-starrating">
                            @for($i=0;$i<(int)$product->rate($product->_id)->rate;$i++)
                            <i class="spr-icon spr-icon-star" style=""></i>
                            @endfor
                            @for($i=0;$i<5-(int)$product->rate($product->_id)->rate;$i++)
                            <i class="spr-icon spr-icon-star spr-icon-star-empty" style=""></i>
                            @endfor
                          </span>
                          <span class="spr-badge-caption">{{$product->rate($product->_id)->count_user}} review</span>
                          </span>
                        </div>
                        <div class="product-title"><a class="title-5" href="{{asset(App::getLocale().'/product/'.$product->_id)}}">{{$product->product_name}}</a></div>
                        <div class="product-price">
                          <span class="price_sale"><span class="money" data-currency-usd="${{$product->price_small-($product->price_small*$product->discount/100)}}">${{$product->price_small-($product->price_small*$product->discount/100)}}</span></span>
                          <del class="price_compare"> <span class="money" data-currency-usd="${{$product->price_small}}">${{$product->price_small}}</span></del>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  @endif
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  @endif
  <!-- not have child and not have parent -->
  @if(count($category->products) > 0)
  <div class="shopify-section index-section index-section-product">
    <div data-section-id="1509012370397" data-section-type="product-section">
      <section class="home-product-layout">
        <div class="container">
          <div class="row">
            <div class="banner-product-title not-animated" data-animate="fadeInUp" data-delay="200" style="background-image:  url({{asset('admin/product/'.$category->products->shuffle()[0]->images->shuffle()[0]->image)}});">
              <div class="title-content">
                <h2>{{$category->category_name}}</h2>
              </div>
            </div>
            <div class="home-product-inner">
              <div class="home-product-content">
                @foreach($category->products->shuffle()->take(4) as $product)
                <div class="content_product col-sm-3 not-animated" data-animate="fadeInUp" data-delay="100">
                  <div class="row-container product list-unstyled clearfix product-circle">
                    <div class="row-left">
                      <a href="{{asset(App::getLocale().'/product/'.$product->_id)}}" class="hoverBorder container_item">
                        <div class="hoverBorderWrapper">
                          <img src="{{asset('admin/product/'.$product->images->shuffle()[0]->image)}}" style="height:200px" class="img-responsive front" alt="Coke">
                          <div class="mask"></div>
                        </div>
                      </a>
                      <div class="hover-mask">
                        <div class="group-mask">
                          <div class="inner-mask">
                            <div class="group-actionbutton">
                              <ul class="quickview-wishlist-wrapper">
                                <li class="wishlist wishlist-click-ajax" data-productid="{{$product->_id}}">
                                  <a title="Add To Wishlist" class="wishlist wishlist-coke" data-wishlisthandle="coke"><span class="cs-icon icon-heart"></span></a>
                                </li>
                                <li class="quickview hidden-xs hidden-sm quickview-click-ajax" data-productid="{{$product->_id}}">
                                  <div class="product-ajax-cart">
                                    <span class="overlay_mask"></span>
                                    <div data-handle="coke" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
                                      <a class=""><span class="cs-icon icon-eye"></span></a>
                                    </div>
                                  </div>
                                </li>
                                <li class="compare compare-click-ajax" data-productid="{{$product->_id}}">
                                  <a title="Add To Cart" class="compare compare-coke" data-comparehandle="coke"><span class="fa fa-shopping-cart"></span></a>
                                </li>
                              </ul>
                            </div>
                            <form action="#" method="post">
                              <div class="effect-ajax-cart">
                                <button class="_btn select-option" type="button" onclick="window.location='{{asset(App::getLocale().'/product/'.$product->_id)}}';" title="Show Product">Show Products</button>
                              </div>
                            </form>
                          </div>
                          <!--inner-mask-->
                        </div>
                        <!--Group mask-->
                      </div>
                      <div class="product-label">
                        <div class="label-element deal-label">
                          <span>{{$product->discount}}%</span>
                        </div>
                      </div>
                    </div>
                    <div class="row-right animMix">
                      <div class="rating-star">
                        <span class="spr-badge" data-rating="{{$product->rate($product->_id)->rate}}"><span class="spr-starrating spr-badge-starrating">
                          @for($i=0;$i<(int)$product->rate($product->_id)->rate;$i++)
                          <i class="spr-icon spr-icon-star" style=""></i>
                          @endfor
                          @for($i=0;$i<5-(int)$product->rate($product->_id)->rate;$i++)
                          <i class="spr-icon spr-icon-star spr-icon-star-empty" style=""></i>
                          @endfor
                        </span>
                        <span class="spr-badge-caption">{{$product->rate($product->_id)->count_user}} review</span>
                        </span>
                      </div>
                      <div class="product-title"><a class="title-5" href="{{asset(App::getLocale().'/product/'.$product->_id)}}">{{$product->product_name}}</a></div>
                      <div class="product-price">
                        <span class="price_sale"><span class="money" data-currency-usd="${{$product->price_small-($product->price_small*$product->discount/100)}}">${{$product->price_small-($product->price_small*$product->discount/100)}}</span></span>
                        <del class="price_compare"> <span class="money" data-currency-usd="${{$product->price_small}}">${{$product->price_small}}</span></del>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  @endif
@endif
@endforeach
<div id="shopify-section-1509012405077" class="shopify-section index-section index-section-banner">
  <div data-section-id="1509012405077" data-section-type="banner-section">
    <section class="home-banner-layout not-animated" data-animate="zoomIn" data-delay="200">
      <div class="container">
        <div class="row">
          <div class="home-banner-inner">
            <div class="home-banner-content">
              <a class="banner-image" href="{{asset(App::getLocale().'/contact')}}l">
                <img src="{{$about->image}}" alt="" title="">
              </a>
              <a class="banner-caption" href="{{asset(App::getLocale().'/contact')}}">
                <span class="banner-caption-group">
                  <span class="title">Free!</span>
                  <span class="caption">Home Delivery</span>
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<div id="shopify-section-1509012440185" class="shopify-section index-section index-section-gallery">
  <div data-section-id="1509012440185" data-section-type="banner-section">
    <section class="home-gallery-layout">
      <div class="container">
        <div class="row">
          <h2 class="page-title">Gallery</h2>
          <div class="home-gallery-inner">
            <div class="home-gallery-content">
              @foreach($products->shuffle()->take(6) as $product)
              <div class="gallery-item col-sm-4 not-animated" data-animate="fadeInUp" data-delay="100">
                <a class="home-gallery-lookbook" rel="lookbook" href="{{asset('admin/product/'.$product->images[0]->image)}}">
                  <img src="{{asset('admin/product/'.$product->images[0]->image)}}" width="100%" height="232px" alt="" title="">
                </a>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<div id="shopify-section-1509012518613" class="shopify-section  index-section index-section-banner">
        <div data-section-id="1509012518613" data-section-type="banner-section">
          <section class="home-banner-layout not-animated" data-animate="zoomIn" data-delay="200">
            <div class="container">
              <div class="row">
                <div class="home-banner-inner">
                  <div class="home-banner-content">
                    <a class="banner-image" href="super-deal.html">
                      <img src="{{$about->image}}" alt="" title="">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
@endsection

@section('script')
<script type="text/javascript">
$(window).on('load', function(){
  $('#body-first').addClass('index-template');
});
</script>
@endsection
