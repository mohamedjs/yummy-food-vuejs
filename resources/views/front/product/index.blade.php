@extends('front.layouts.layout')

@section('content')
<div id="app" style="display:none"></div>
  <section class="heading-content">
    <div class="heading-wrapper">
      <div class="container">
        <div class="row">
          <div class="page-heading-inner heading-group">
            <div class="breadcrumb-group">
              <h1 class="hidden">Category</h1>
              <div class="breadcrumb clearfix">
                <span itemscope="" itemtype="#"><a href="{{asset(App::getLocale().'/')}}" title="{{$about->company_name}}" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a>
                </span>
                <span class="arrow-space"></span>
                <span itemscope="" itemtype="#">
                  <a href="{{asset(App::getLocale().'/category/'.$category->_id)}}" title="{{$category->category_name}}" itemprop="url"><span itemprop="title">{{$category->category_name}}</span></a>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="product-detail-layout">
    <div class="product-detail-wrapper">
      <div class="container">
        <div class="row">
          <div id="shopify-section-product-template" class="shopify-section">
            <div class="product-detail-inner" itemscope="" itemtype="{{asset(App::getLocale().'/')}}">
              <meta itemprop="name" :content="{{$product->product_name}}">
              <meta itemprop="url"  :content="{{asset(App::getLocale().'/product/',$product->_id)}}">
              <meta itemprop="image" content="{{asset('admin/product/'.$product->images[0]->image)}}">
              <div class="product-detail-content col-sm-9">
                <div id="product" class="extra-crispy-1 detail-content">
                  <div class="col-md-12 info-detail-pro clearfix">
                    <div class="col-md-6" id="product-image">
                      <div id="featuted-image" class="image featured" style="position: static; overflow: visible;" >
                        <img  src="{{asset('admin/product/'.$product->images[0]->image)}}" class="zoomImg" alt="">
                      </div>
                      <div id="featuted-image-mobile" class="image featured-mobile">
                        @foreach($product->images->shuffle()->slice(1) as $key=>$images)
                        <div class="image-item">
                          <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox" >
                            <img src="{{asset('admin/product/'.$images->image)}}" alt="{{$product->product_name}}" data-item="$key" />
                          </a>
                        </div>
                        @endforeach
                      </div>
                      <div id="gallery-images" class="thumbs clearfix gallery-images-layout">
                        <div class="gallery-images-inner">
                          <div class="show-image-load show-load-detail" style="display: none;">
                            <div class="show-image-load-inner">
                              <i class="fa fa-spinner fa-pulse fa-2x"></i>
                            </div>
                          </div>
                          <div class="slider-3itemsc vertical-image-content">
                            <div class="image-vertical image active" >
                              <a href="{{asset('admin/product/'.$product->images[0]->image)}}" class="cloud-zoom-gallery">
                                <img src="{{asset('admin/product/'.$product->images[0]->image)}}" style="height:110px" alt="{{$product->product_name}}">
                              </a>
                            </div>
                            @foreach($product->images->slice(1) as $key=>$images)
                            <div class="image-vertical image">
                              <a href="{{asset('admin/product/'.$images->image)}}" class="cloud-zoom-gallery">
                                <img src="{{asset('admin/product/'.$images->image)}}" style="height:110px" alt="{{$product->product_name}}">
                              </a>
                            </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6" id="product-information">
                      <h1 itemprop="name" class="title">{{$product->product_name}}</h1>
                      <div class="rating-content">
                        <div class="rating-description">
                          <span class="spr-badge" data-rating="{{$product->rate($product->_id)->rate}}">
                          <span class="spr-starrating spr-badge-starrating rate_start">
                            @for($i=0;$i<(int)$product->rate($product->_id)->rate;$i++)
                            <i class="spr-icon spr-icon-star" style=""></i>
                            @endfor
                            @for($i=0;$i<5-(int)$product->rate($product->_id)->rate;$i++)
                            <i class="spr-icon spr-icon-star spr-icon-star-empty" style=""></i>
                            @endfor
                          </span>
                          <span class="spr-badge-caption"><span id="count_user_rate">{{$product->rate($product->_id)->count_user}}</span>  review</span>
                        </span>
                          <span class="review-link"><a href="#review">Write a review</a></span>
                        </div>
                      </div>

                      <form  action="#" method="post" class="variants">
                        <div class="product-options " itemprop="offers" itemscope="" itemtype="#">
                          <meta itemprop="priceCurrency" content="USD">
                          <link itemprop="availability" href="../../schema.org/InStock.html">
                          <div class="product-type">
                            <div class="select clearfix">
                              <div class="selector-wrapper variant-wrapper-size">
                                <label for="product-select-option-0">Size</label>
                                <select class="single-option-selector" data-option="option1" >
                                  <option value="Small">Small</option>
                                  <option value="Medium">Medium</option>
                                  <option value="Large">Large</option>
                                </select>
                              </div>
                              <div class="selector-wrapper variant-wrapper-topping">
                                <label for="product-select-option-2">Topping</label>
                                <select class="single-option-selector" data-option="option3" >
                                  @foreach($product->toppings as $topping)
                                  <option value="{{$topping->_id}}">{{$topping->topping_name}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="swatch-variant swatch color clearfix" data-option-index="1">
                              <label>Color</label>
                              @foreach($product->colors as $color)
                              <div data-value="{{$color->color}}" class="swatch-element color black available active">
                                <input  type="radio" name="option-1" value="Black">
                                <label data-toggle="tooltip" data-placement="top" data-original-title="{{$color->color}}" for="swatch-1-black" style="background-color: {{$color->color}}; border-color: {{$color->color}}">
                                  <img class="crossed-out" src="{{asset('front/assets/images/logo_footer.png')}}" alt="">
                                </label>
                              </div>
                              @endforeach
                            </div>
                          </div>
                          <div class="clearfix">
                            <div class="quantity-wrapper">
                              <label class="wrapper-title">Qty</label>
                              <div class="wrapper">
                                <input  type="text" name="quantity" value="1" maxlength="5" size="5" class="item-quantity">
                                <div class="qty-btn-vertical">
                                  <span class="qty-down fa fa-chevron-down" title="Decrease" data-src="#quantity">
                                  </span>
                                  <span class="qty-up fa fa-chevron-up" title="Increase" data-src="#quantity">
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="product-price">
                            <meta itemprop="price" content="{{$product->price_small-($product->price_small*$product->discount/100)}}">
                            <h2 class="price" id="price-preview"><span class="money" data-currency-usd="${{$product->price_small-($product->price_small*$product->discount/100)}}" data-currency="USD">${{$product->price_small-($product->price_small*$product->discount/100)}}</span></h2>
                          </div>
                          <div class="purchase-section multiple">
                            <div class="purchase">
                              <button id="add-to-cart" onclick="change_qs_quantity('');" class="_btn add-to-cart" type="submit" name="add"><span><i class="cs-icon icon-cart"></i>Add to cart</span></button>
                              <div id="cart-animation" style="display:none">1</div>
                            </div>
                          </div>
                        </div>
                      </form>
                      <div class="comWish-content">
                        <a title="Add To Cart" class="_compareWishlist compare compare-extra-crispy-1" data-comparehandle="extra-crispy-1">
                          <span class="icon-small icon-small-retweet"></span>
                          <span class="_compareWishlist-text">Compare</span>
                        </a>
                        <a title="Add To Wishlist" class="wishlist-extra-crispy-1" data-wishlisthandle="extra-crispy-1" href="#">
                          <span class="icon-small icon-small-heart"></span>
                          <span class="_compareWishlist-text">Wishlist</span>
                        </a>
                        <a title="Send email" class="send-email" href="#">
                          <span class="icon-small icon-small-email"></span>
                          <span class="_compareWishlist-text">Send email</span>
                        </a>
                      </div>
                      <div class="supports-fontface">
                        <span class="social-title">Share this</span>
                        <div class="social-sharing is-clean" data-permalink="#">
                          <a target="_blank" href="http://www.facebook.com/sharer.php?u=https://cs-fastfood.myshopify.com/products/extra-crispy-1" class="share-facebook">
                            <span class="fa fa-facebook"></span>
                          </a>
                          <a target="_blank" href="http://twitter.com/share?text=Extra%20Crispy&amp;url=https://cs-fastfood.myshopify.com/products/extra-crispy-1" class="share-twitter">
                            <span class="fa fa-twitter"></span>
                          </a>
                          <a target="_blank" href="../../pinterest.com/pin/create/button/indexb5c7.html?url=https://cs-fastfood.myshopify.com/products/extra-crispy-1&amp;media=http://cdn.shopify.com/s/files/1/2487/3424/products/13_1024x1024.jpg?v=1508991313&amp;description=Extra%20Crispy" class="share-pinterest">
                            <span class="fa fa-pinterest"></span>
                          </a>
                          <a target="_blank" href="http://plus.google.com/share?url=https://cs-fastfood.myshopify.com/products/extra-crispy-1" class="share-google">
                            <!-- Cannot get Google+ share count with JS yet -->
                            <span class="fa fa-google-plus"></span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="may-like-products col-sm-12">
                    <div class="sub-title">
                      <h2>You May Also Like</h2>
                    </div>
                    <div class="may-like-content-inner">
                      <div class="may-like-content">
                        @foreach($all_product->shuffle()->slice(0,4) as $pro)
                        <div class="content_product">
                          <div class="row-container product list-unstyled clearfix product-circle">
                            <div class="row-left">
                              <a href="{{asset(App::getLocale().'/product/'.$pro->_id)}}" class="hoverBorder container_item">
                                <div class="hoverBorderWrapper">
                                  <img src="{{asset('/admin/product/'.$pro->images[0]->image)}}" style="height:200px" class="img-responsive front" alt="{{$pro->product_name}}">
                                  <div class="mask"></div>
                                </div>
                              </a>
                              <div class="hover-mask">
                                <div class="group-mask">
                                  <div class="inner-mask">
                                    <div class="group-actionbutton">
                                      <ul class="quickview-wishlist-wrapper">
                                        <li class="wishlist wishlist-click-ajax" data-productid="{{$pro->_id}}">
                                          <a title="Add To Wishlist" class="wishlist wishlist-coke" data-wishlisthandle="coke"><span class="cs-icon icon-heart"></span></a>
                                        </li>
                                        <li class="quickview hidden-xs hidden-sm quickview-click-ajax" data-productid="{{$pro->_id}}">
                                          <div class="product-ajax-cart">
                                            <span class="overlay_mask"></span>
                                            <div data-handle="coke" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
                                              <a class=""><span class="cs-icon icon-eye"></span></a>
                                            </div>
                                          </div>
                                        </li>
                                        <li class="compare compare-click-ajax" data-productid="{{$pro->_id}}">
                                          <a title="Add To Cart" class="compare compare-coke" data-comparehandle="coke"><span class="fa fa-shopping-cart"></span></a>
                                        </li>
                                      </ul>
                                    </div>
                                    <form action="#" method="post">
                                      <div class="effect-ajax-cart">
                                        <input type="hidden" name="quantity" value="1">
                                        <button class="_btn add-to-cart" data-parent=".parent-fly" type="submit" name="add" title="Add To Cart">Add to cart</button>
                                      </div>
                                    </form>
                                  </div>
                                  <!--inner-mask-->
                                </div>
                                <!--Group mask-->
                              </div>
                              <div class="product-label">
                                <div class="label-element new-label">
                                  <span>{{$pro->discount}}%</span>
                                </div>
                              </div>
                            </div>
                            <div class="row-right animMix">
                              <div class="rating-star">
                                <span class="spr-badge" data-rating="{{$product->rate($product->_id)->rate}}"><span class="spr-starrating spr-badge-starrating">
                                  @for($i=0;$i<(int)$pro->rate($product->_id)->rate;$i++)
                                  <i class="spr-icon spr-icon-star" style=""></i>
                                  @endfor
                                  @for($i=0;$i<5-(int)$product->rate($pro->_id)->rate;$i++)
                                  <i class="spr-icon spr-icon-star spr-icon-star-empty" style=""></i>
                                  @endfor
                                </span>
                                <span class="spr-badge-caption">{{$pro->rate($product->_id)->count_user}} review</span>
                                </span>
                              </div>
                              <div class="product-title"><a class="title-5" href="{{asset(App::getLocale().'/product/'.$pro->_id)}}">{{$pro->product_name}}</a></div>
                              <div class="product-price">
                                <span class="price">
                                  <span class="money" data-currency-usd="${{$pro->price_small-($pro->price_small*$pro->discount/100)}}">${{$pro->price_small-($pro->price_small*$pro->discount/100)}}</span>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                  <div id="tabs-information" class="col-md-12 tabs-information">
                    <div class="col-md-12 tabs-title">
                      <ul class="nav nav-tabs tabs-left sideways">
                        <li class="active"><a href="#desc" data-toggle="tab">Description</a></li>
                        <li><a href="#review" data-toggle="tab">Reviews</a></li>
                        <li><a href="#shipping" data-toggle="tab">Shipping Details</a></li>
                        <li><a href="#payment" data-toggle="tab">Payment Info</a></li>
                      </ul>
                    </div>
                    <div class="col-md-12 tabs-content">
                      <div class="tab-content">
                        <div class="tab-pane active" id="desc">
                          <p>{{$product->datiles}}</p>
                        </div>
                        <div class="tab-pane fade " id="review">
                          <div id="customer_review">
                            <div class="preview_content">
                              <div id="shopify-product-reviews" data-id="6537875078">
                                <div class="spr-container">
                                  <div class="spr-header">
                                    <h2 class="spr-header-title">Customer Reviews</h2>
                                    <div class="spr-summary" itemscope="" itemtype="#">
                                      <meta itemprop="itemreviewed" content="Chanel, the cheetah">
                                      <meta itemprop="votes" content="1">
                                      <span itemprop="rating" itemscope="" itemtype="#" class="spr-starrating spr-summary-starrating rate-view rate_user">
                                        <meta itemprop="average" content="5.0">
                                        <meta itemprop="best" content="5">
                                        <meta itemprop="worst" content="1">
                                        @for($i=0;$i<(int)$product->rate($product->_id)->rate;$i++)
                                        <i class="spr-icon spr-icon-star" style=""></i>
                                        @endfor
                                        @for($i=0;$i<5-(int)$product->rate($product->_id)->rate;$i++)
                                        <i class="spr-icon spr-icon-star spr-icon-star-empty" style=""></i>
                                        @endfor

                                      </span>
                                      <span class="spr-summary-caption rate-caption">
                                        <span class="spr-summary-actions-togglereviews">Based on <span id="count_user_rate_2">{{$product->rate($product->_id)->count_user}}</span>  review</span>
                                      </span>
                                      <span class="spr-summary-actions">
                                        <a href="#" class="spr-summary-actions-newreview" onclick="active_review_form();return false">Write a review</a>
                                      </span>
                                    </div>
                                  </div>
                                  <div class="spr-content">
                                    <div class="spr-form" id="form_6537875078"  style="display: none;">
                                      <form class="new-review-form" id="form-submit" >
                                        <input type="hidden" name="product_id" value="{{$product->_id}}">
                                        @csrf
                                        <h3 class="spr-form-title">Write a review</h3>
                                        <fieldset class="spr-form-contact">
                                          <div class="spr-form-contact-name">
                                            <label class="spr-form-label" for="">Name</label>
                                            <input class="spr-form-input spr-form-input-text "  type="text" name="name" value="" placeholder="Enter your name">
                                          </div>
                                          <div class="spr-form-contact-email">
                                            <label class="spr-form-label" for="">Email</label>
                                            <input class="spr-form-input spr-form-input-email"  type="email" name="email" value="" placeholder="john.smith@example.com">
                                          </div>
                                        </fieldset>
                                        <fieldset class="spr-form-review">
                                          <div class="spr-form-review-rating">
                                            <label class="spr-form-label">Rating</label>
                                            <div class="spr-form-input spr-starrating ">
                                              <a href="#" class="spr-icon spr-icon-star spr-icon-star-empty" id="rate_click" data-value="1">&nbsp;</a>
                                              <a href="#" class="spr-icon spr-icon-star spr-icon-star-empty" id="rate_click" data-value="2">&nbsp;</a>
                                              <a href="#" class="spr-icon spr-icon-star spr-icon-star-empty" id="rate_click" data-value="3">&nbsp;</a>
                                              <a href="#" class="spr-icon spr-icon-star spr-icon-star-empty" id="rate_click" data-value="4">&nbsp;</a>
                                              <a href="#" class="spr-icon spr-icon-star spr-icon-star-empty" id="rate_click" data-value="5">&nbsp;</a>
                                            </div>
                                            <input type="hidden" class="rate" name="rate" value="">
                                          </div>
                                          <div class="spr-form-review-title">
                                            <label class="spr-form-label" for="">Review Title</label>
                                            <input class="spr-form-input spr-form-input-text"  type="text" name="review_title" value="" placeholder="Give your review a title">
                                          </div>
                                          <div class="spr-form-review-body">
                                            <label class="spr-form-label" for="">Body of Review <span class="spr-form-review-body-charactersremaining">(1500)</span></label>
                                            <div class="spr-form-input">
                                              <textarea class="spr-form-input spr-form-input-textarea"  name="body_of_review" rows="10" placeholder="Write your comments here"></textarea>
                                            </div>
                                          </div>
                                        </fieldset>
                                        <fieldset class="spr-form-actions">
                                          <input type="submit" class="spr-button spr-button-primary button button-primary btn btn-primary" value="Submit Review">
                                        </fieldset>
                                      </form>

                                    </div>
                                    <div class="spr-reviews add-user-review" >
                                      @foreach($product->rate_user($product->_id) as $review)
                                      <div class="spr-review" >
                                        <div class="spr-review-header">
                                          <span class="spr-starratings spr-review-header-starratings">
                                            @for($i=0;$i<(int)$review->rate;$i++)
                                            <i class="spr-icon spr-icon-star" style=""></i>
                                            @endfor
                                            @for($i=0;$i<5-(int)$review->rate;$i++)
                                            <i class="spr-icon spr-icon-star spr-icon-star-empty" style=""></i>
                                            @endfor
                                          </span>
                                          <h3 class="spr-review-header-title">{{$review->title}}</h3>
                                          <span class="spr-review-header-byline"><strong>{{$review->name}}</strong> on <strong>{{$review->created_at}}</strong></span>
                                        </div>
                                        <div class="spr-review-content">
                                          <p class="spr-review-content-body">{{$review->body}}</p>
                                        </div>
                                        <div class="spr-review-footer">
                                          <a href="#" class="spr-review-reportreview" onclick="SPR.reportReview(7003642);return false" id="report_7003642" data-msg="This review has been reported">Report as Inappropriate</a>
                                        </div>
                                      </div>
                                      @endforeach
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade " id="shipping">
                          <div class="shipping-item">
                            <p class="item-title">Returns Policy</p>
                            <p class="item-desc">
                            {{$about->policy}}
                            </p>
                          </div>
                          <div class="shipping-item">
                            <p class="item-title">Shipping</p>
                            <p class="item-desc">
                            {{$about->shipping}}
                            </p>
                          </div>
                        </div>
                        <div class="tab-pane fade " id="payment">
                        {{$about->payment_info}}
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="related-products col-sm-12">
                    <div class="sub-title">
                      <h2>Related products</h2>
                    </div>
                    <div class="group-related">
                      <div class="group-related-inner">
                        <div class="rp-slider">
                          @foreach($realted_product->shuffle()->take(4) as $prod)
                          <div class="row-container product list-unstyled clearfix product-circle">
                            <div class="row-left">
                              <a href="{{asset(App::getLocale().'/product/'.$prod->_id)}}" class="hoverBorder container_item">
                                <div class="hoverBorderWrapper">
                                  <img src="{{asset('admin/product/'.$prod->images[0]->image)}}" style="height:200px" class="img-responsive front" alt="{{$product->product_name}}">
                                  <div class="mask"></div>
                                </div>
                              </a>
                              <div class="hover-mask">
                                <div class="group-mask">
                                  <div class="inner-mask">
                                    <div class="group-actionbutton">
                                      <ul class="quickview-wishlist-wrapper">
                                        <li class="wishlist wishlist-click-ajax" data-productid="{{$prod->_id}}">
                                          <a title="Add To Wishlist" class="wishlist wishlist-coke" data-wishlisthandle="coke"><span class="cs-icon icon-heart"></span></a>
                                        </li>
                                        <li class="quickview hidden-xs hidden-sm quickview-click-ajax" data-productid="{{$prod->_id}}">
                                          <div class="product-ajax-cart">
                                            <span class="overlay_mask"></span>
                                            <div data-handle="coke" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
                                              <a class=""><span class="cs-icon icon-eye"></span></a>
                                            </div>
                                          </div>
                                        </li>
                                        <li class="compare compare-click-ajax" data-productid="{{$prod->_id}}">
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
                                  <span>{{$prod->discount}}%</span>
                                </div>
                              </div>
                            </div>
                            <div class="row-right animMix">
                              <div class="rating-star">
                                <span class="spr-badge" data-rating="{{$product->rate($prod->_id)->rate}}"><span class="spr-starrating spr-badge-starrating">
                                  @for($i=0;$i<(int)$prod->rate($prod->_id)->rate;$i++)
                                  <i class="spr-icon spr-icon-star" style=""></i>
                                  @endfor
                                  @for($i=0;$i<5-(int)$prod->rate($prod->_id)->rate;$i++)
                                  <i class="spr-icon spr-icon-star spr-icon-star-empty" style=""></i>
                                  @endfor
                                </span>
                                <span class="spr-badge-caption">{{$prod->rate($prod->_id)->count_user}} review</span>
                                </span>>
                              </div>
                              <div class="product-title"><a class="title-5" href="{{asset(App::getLocale().'/product/'.$prod->_id)}}">{{$product->product_name}}</a></div>
                              <div class="product-price">
                                <span class="price_sale"><span class="money" data-currency-usd="${{$prod->price_small-($prod->price_small*$prod->discount/100)}}">${{$prod->price_small-($prod->price_small*$prod->discount/100)}}</span></span>
                                <del class="price_compare"> <span class="money" data-currency-usd="${{$prod->price_small}}">${{$prod->price_small}}</span></del>
                              </div>
                            </div>
                          </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                    <!--END -->
                  </div>
                </div>
              </div>
              <div id="vue-product">
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
                              <div class="products-item" v-for="product in all_product.slice(0,4)">
                                <div class="row-container product-circle">
                                  <div class="product home_product">
                                    <div class="row-left">
                                      <a :href="uri+product._id" class="container_item">
                                        <div class="hoverBorderWrapper">
                                          <vue-load-image>
                                             <img slot="image" :src="url_image+'admin/product/'+product.images[0].image" class="not-rotation img-responsive"/>
                                             <img slot="preloader" :src="url_image+'svg/image-loader.8402b89.gif'" class="img-responsive"/>
                                             <div slot="error">@{{product.product_name}}</div>
                                           </vue-load-image>
                                          <div class="mask"></div>
                                        </div>
                                      </a>
                                    </div>
                                    <div class="row-right">
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
                              <li v-for="product in all_product.slice(0,14)" :data-handle="product.colors[0].color" class="swatch-tag "><a href="#" @click="filter_by_color(product.colors[0]._id)" :title="'Narrow selection to products matching tag'+ product.colors[0].color"><span :style="'background-color:'+ product.colors[0].color" class="color-swatch btooltip" :title="product.colors[0].color"></span></a></li>
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
                              <li :data-handle="product.toppings[0].topping_name" v-for="product in all_product.slice(0,5)"><a @click="filter_by_topping(product.toppings[0]._id)" href="#" :title="'Narrow selection to products matching tag '+product.toppings[0].topping_name"><span class="fe-checkbox"></span>@{{product.toppings[0].topping_name}}</a></li>
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
                            <a href="collections.html">
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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
      url_get :"{{asset(App::getLocale().'/product/get/'.$id)}}",
      id:        "{{$id}}",
      category : [],
      categorys: [],
      type_list: [],
      about:     [],
      product:   [],
      all_product:[]
    },
    methods:{
      get_item(){
        var _this = this
        axios.get(this.url_get).then(function(response){
          _this.category   = response.data.category
          _this.about      = response.data.about
          _this.categorys  = response.data.categorys
          _this.all_product= _.shuffle(response.data.all_product)
          _this.product    = response.data.product
        })
      },
      getnumber(num){
         return 5-num?5-num:5;
      }
    },
    created(){
      this.get_item()
    }
  });
</script>

<script>
  $('.review-link a').click(function(e) {
    e.preventDefault();
    $('html, body').animate({
      scrollTop: $("#tabs-information").offset().top - 120
    }, 800);
    $('.nav-tabs a[href="#review"]').tab('show');
    return false;
  });

  // $('#rate_click').click(function(e){
  //     e.preventDefault();
  //     $(this).removeClass('spr-icon-star-empty');
  //     rate_val = $(this).prop('data-value');
  //     $('.rate').val(rate_val);
  // })

  $(document).on('click','#rate_click',function(e){
    e.preventDefault();
    if($(this).hasClass("spr-icon-star-empty")){
      $(this).removeClass('spr-icon-star-empty');
      var rate_val = $(this).data('value');
      $('.rate').val(rate_val);
    }
    else{
      $(this).addClass('spr-icon-star-empty');
      $('.rate').val($('.rate').val()-1);
    }
  })

  $('#form-submit').submit(function(e){
    e.preventDefault();
    var x = '';
    $.post("{{asset(App::getLocale().'/product/rate/add')}}",$('.new-review-form').serialize(),function(response){
      for(i=0 ; i< parseInt(response.rate.rate); i++ ){
        x+='<i class="spr-icon spr-icon-star" style=""></i>';
        }
        for(i=0 ; i< 5-parseInt(response.rate.rate); i++ ){
          x+='<i class="spr-icon spr-icon-star spr-icon-star-empty" style=""></i>';
        }

        var n = '';
        for(i=0 ; i< parseInt(response.user[response.user.length-1].rate); i++ ){
         n+='<i class="spr-icon spr-icon-star" style=""></i>'
        }
        for(i=0 ; i< 5-parseInt(response.user[response.user.length-1].rate); i++ ){
        n+='<i class="spr-icon spr-icon-star spr-icon-star-empty" style=""></i>'
        }
        var y = '<div class="spr-review" >'+
                  '<div class="spr-review-header">'+
                    '<span class="spr-starratings spr-review-header-starratings">'+
                      n
                    +'</span>'+
                    '<h3 class="spr-review-header-title">'+response.user[response.user.length-1].title+'</h3>'+
                    '<span class="spr-review-header-byline"><strong>'+response.user[response.user.length-1].name+'</strong> on <strong>'+response.user[response.user.length-1].created_at.date+'</strong></span>'+
                  '</div>'+
                  '<div class="spr-review-content">'+
                    '<p class="spr-review-content-body">'+response.user[response.user.length-1].body+'</p>'+
                  '</div>'+
                  '<div class="spr-review-footer">'+
                    '<a href="#" class="spr-review-reportreview" onclick="SPR.reportReview(7003642);return false" id="report_7003642" data-msg="This review has been reported">Report as Inappropriate</a>+'
                  '</div>'+
                '</div>';

      $('.rate_user').html(x);
      $('.add-user-review').append(y);
      $('#count_user_rate').html(response.rate.count_user);
      $('#count_user_rate_2').html(response.rate.count_user);
      $("#form_6537875078").css('display','none');
    });
  });
</script>

<script>
  $(function() {
    $('.swatch-element').hover(
      function() {
        $(this).addClass("hovered");
      },
      function() {
        $(this).removeClass("hovered");
      });

    $(".swatch-element").click(function() {
      if (!$(this).hasClass('active')) {
        $(this).parent().find(".swatch-element.active").removeClass("active");
        $(this).addClass("active");
      }
    });
  });
</script>

<script type="text/javascript">
  function active_review_form(){
    if($("#form_6537875078").attr('style')=='display: none;'){
      $("#form_6537875078").css('display','block');
    }
    else {
      $("#form_6537875078").css('display','none');
    }
  }
  jQuery(document).ready(function($){
    $('#gallery-images div.image').on('click', function() {
      var $this = $(this);
      var parent = $this.parents('#gallery-images');
      parent.find('.image').removeClass('active');
      $this.addClass('active');
    });
  });
</script>
@endsection
