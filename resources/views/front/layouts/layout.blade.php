<!DOCTYPE html>
<html lang="en" class="no-js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="canonical" href="../index.html" />
	<meta name="theme-color" content="#7796A8">
	<meta name="description" content="" />
	<meta name="csrf-token" value="{{ csrf_token() }}" />
	<title>
	Fast Food
	</title>
	<link href="{{asset('front/assets/stylesheets/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
	<link href="{{asset('front/assets/stylesheets/fonts.googleapis.css')}}" rel="stylesheet" type="text/css" media="all">
	<link href="{{asset('front/assets/stylesheets/font-awesome.min.css')}}" rel="stylesheet" type="text/css" media="all">
	<link href="{{asset('front/assets/stylesheets/icon-font.min.css')}}" rel="stylesheet" type="text/css" media="all">
	<link href="{{asset('front/assets/stylesheets/social-buttons.css')}}" rel="stylesheet" type="text/css" media="all">
	<link href="{{asset('front/assets/stylesheets/cs.styles.css')}}" rel="stylesheet" type="text/css" media="all">
	<link href="{{asset('front/assets/stylesheets/font-icon.css')}}" rel="stylesheet" type="text/css" media="all">
	<link href="{{asset('front/assets/stylesheets/owl.carousel.min.css')}}" rel="stylesheet" type="text/css" media="all">
	<link href="{{asset('front/assets/stylesheets/spr.css')}}" rel="stylesheet" type="text/css" media="all">
	<link href="{{asset('front/assets/stylesheets/slideshow-fade.css')}}" rel="stylesheet" type="text/css" media="all">
	<link href="{{asset('front/assets/stylesheets/cs.animate.css')}}" rel="stylesheet" type="text/css" media="all">
	<link href="{{asset('front/assets/stylesheets/themepunch.revolution.css')}}" rel="stylesheet" type="text/css" media="all">
	<link href="{{asset('front/assets/stylesheets/jquery.fancybox.css')}}" rel="stylesheet" type="text/css" media="all">


</head>

<body class="fastfood_1" id="body-first">

	<!--Header-->
	<header id="top" class="header clearfix">
		<div id="shopify-section-theme-header" class="shopify-section">
			<div data-section-id="theme-header" data-section-type="header-section">
				<section class="main-header">
					<div class="main-header-wrapper">
						<div class="container clearfix">
							<div class="row">
								<div class="main-header-inner">
									<div class="nav-logo">
										<a href="{{asset(App::getLocale().'/')}}"><img src="{{asset('front/assets/images/logo.png')}}" alt="" title="Fast Food" /></a>
										<h1 style="display:none"><a href="{{asset(App::getLocale().'/')}}">Fast Food</a></h1>
									</div>
									<div class="nav-top">
										<div class="nav-menu">
											<ul class="navigation-links ">
												@foreach($categorys as $cat)
													@if(count($cat->sub_category) > 0)
													<li class="nav-item dropdown navigation">
														<a href="#" class="dropdown-toggle dropdown-link" data-toggle="dropdown">
															<span>{{$cat->category_name}}</span>
															<i class="fa fa-angle-down"></i>
															<i class="sub-dropdown1  visible-sm visible-md visible-lg"></i>
															<i class="sub-dropdown visible-sm visible-md visible-lg"></i>
														</a>
														<ul class="dropdown-menu">
															@foreach($cat->sub_category as $sub_category)
															<li class="li-sub-mega">
																<a tabindex="-1" href="{{asset(App::getLocale().'/category/'.$sub_category->_id)}}">{{$sub_category->category_name}}</a>
															</li>
															@endforeach
														</ul>
													</li>
													@elseif(!$cat->category)
													<li class="nav-item">
														<a href="{{asset(App::getLocale().'/category/'.$cat->_id)}}">
															<span>{{$cat->category_name}}</span>
														</a>
													</li>
													@endif
												@endforeach
											</ul>
										</div>
										<div class="nav-icon">
											<div class="m_search search-icon">
												<a href="#" data-toggle="modal" data-target="#lightbox-search">
													<i class="fa fa-search"></i>
												</a>
											</div>
											<div class="icon_cart">
												<div class="m_cart-group">
													<a class="cart dropdown-toggle dropdown-link" data-toggle="dropdown">
														<i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
														<i class="sub-dropdown visible-sm visible-md visible-lg"></i>
														<div class="num-items-in-cart">
															<div class="items-cart">
																<div class="num-items-in-cart">
																	<i class="fa fa-shopping-cart"></i>
																	<span class="cart_text">
																		Cart <span class="number">({{count($carts)}})</span>
																	</span>
																</div>
															</div>
														</div>
													</a>
													<div class="dropdown-menu cart-info">
														<div class="cart-content">
															<div class="text-items"><span>{{count($carts)}} item(s) in the shopping cart</span> <span class="cs-icon icon-close close-dropdown"></span> </div>
															<div class="items control-container">
																@foreach($carts->shuffle()->slice(0,4) as $cart)
																<div class="group_cart_item">
																	<div class="cart-left"><a class="cart-image" href="{{asset(App::getLocale().'/product/'.$cart->product_id)}}"><img src="{{asset('/admin/product/'.$cart->get_product($cart->product_id)->images[0]->image)}}" alt="{{$cart->get_product($cart->product_id)->product_name}}" title="{{$cart->get_product($cart->product_id)->product_name}}"></a></div>
																	<div class="cart-right">
																		<div class="cart-title"><a href="{{asset(App::getLocale().'/product/'.$cart->product_id)}}">{{$cart->get_product($cart->product_id)->product_name}} / {{$cart->size}}</a></div>
																		<div class="cart-price"><span class="money" data-currency-usd="${{$cart->total_price}}" data-currency="USD">${{$cart->total_price}}</span></div>
																		<div class="cart-qty">
																			<span class="quantity">Qty: {{$cart->quantity}}</span>
																			<a title="Add To Wishlist" class="wishlist-extra-crispy-1" href="#">
																				<span class="cs-icon icon-heart"></span>
																			</a>
																			<a class="cart-close" title="Remove" href="#">
																				<span class="cs-icon icon-bin"></span>
																			</a>
																		</div>
																	</div>
																</div>
																@endforeach
															</div>
															<div class="subtotal"><span>Subtotal:</span><span class="cart-total-right money" data-currency-usd="{{$sub_total}}$" data-currency="USD">{{$sub_total}}$</span></div>
															<div class="action"><button class="_btn" onclick="window.location.href='{{url(App::getLocale().'/cart')}}'">Proceed To Checkout</button><button class="_btn float-right" onclick="window.location.href='{{url(App::getLocale().'/wishlist')}}'">View Your Wish List</button></div>
														</div>
													</div>
												</div>
											</div>
											<div class="icon_accounts">
												@if(!Auth::user() || Auth::user()->user_type != 3)
												<div class="m_login-account">
													<span class="dropdown-toggle login-icon" data-toggle="dropdown">
														<i class="fa fa-ellipsis-v"></i>
														<i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
														<i class="sub-dropdown visible-sm visible-md visible-lg"></i>
													</span>
													<div class="m_dropdown-login dropdown-menu login-content">
														<div class="clearfix">
															<div class="login-register-content">
																<ul class="nav nav-tabs">
																	<li class="account-item-title active">
																		<a href="#account-login" data-toggle="tab">
																			Login
																		</a>
																	</li>
																	<li class="account-item-title">
																		<a href="#account-register" data-toggle="tab">
																			Register
																		</a>
																	</li>
																</ul>
																<div class="tab-content group_form">
																	<div class="tab-pane active account-item-content" id="account-login">
																		<form method="post" action="{{url('login')}}" accept-charset="UTF-8">
																			@csrf
																			<div class="clearfix large_form form-item">
																				<input type="email" value="" name="email" class="form-control" placeholder="Email Address *" />
																				@if ($errors->has('email'))
												                    <span class="invalid-feedback" role="alert">
												                        <strong>{{ $errors->first('email') }}</strong>
												                    </span>
												                @endif
																			</div>
																			<div class="clearfix large_form form-password form-item">
																				<input type="password" value="" name="password]" class="form-control password" placeholder="Password *" />
																				<span class="cs-icon icon-eye"></span>
																				@if ($errors->has('password'))
												                    <span class="invalid-feedback" role="alert">
												                        <strong>{{ $errors->first('password') }}</strong>
												                    </span>
												                @endif
																			</div>
																			<div class="action_bottom">
																				<button class="_btn" type="submit">Login</button>
																				<a href="{{ route('password.request') }}"><span class="red"></span> Forgot your password?</a>
																			</div>
																		</form>
																	</div>
																	<div class="tab-pane account-item-content " id="account-register">
																		<form method="post" action="{{url('register')}}" id="create_customer" accept-charset="UTF-8">
																			@csrf
																			<div class="clearfix large_form form-item">
																				<input placeholder="Name" type="text" value="" name="name" id="first_name" class="text" size="30" />
																				@if ($errors->has('name'))
												                    <span class="invalid-feedback" role="alert">
												                        <strong>{{ $errors->first('name') }}</strong>
												                    </span>
												                @endif
																			</div>
																			<div class="clearfix large_form form-item">
																				<input placeholder="Email" type="email" value="" name="email" id="email" class="text" size="30" />
																				@if ($errors->has('email'))
												                    <span class="invalid-feedback" role="alert">
												                        <strong>{{ $errors->first('email') }}</strong>
												                    </span>
												                @endif
																			</div>
																			<div class="clearfix large_form form-password form-item">
																				<input placeholder="Password" type="password" value="" name="password" id="password" class="password text" size="30" />
																				<span class="cs-icon icon-eye"></span>
																				@if ($errors->has('password'))
												                    <span class="invalid-feedback" role="alert">
												                        <strong>{{ $errors->first('password') }}</strong>
												                    </span>
												                @endif
																			</div>
																			<input type="hidden" name="user_type" value="2">
																			<div class="clearfix large_form form-password form-item">
																				<input placeholder="Confirm Password" type="password" value="" name="password-confirm"  id="password-confirm" class="password text" size="30" />
																				<span class="cs-icon icon-eye"></span>
																			</div>
																			<div class="action_bottom">
																				<button class="_btn" type="submit">Create</button>
																			</div>
																		</form>
																	</div>
																</div>
															</div>
															<ul class="wish-compare-content">
																<ul class="wish-compare-content">
																	<li class="link-item"><a href="{{url(App::getLocale().'/wishlist')}}">My Wishlist</a></li>
																	<li class="link-item"><a href="{{url(App::getLocale().'/cart')}}">My Cart</a></li>
																</ul>
															</ul>
															<ul class="currencies currencies-content">
																<li class="currency-USD active">
																	<a href="javascript:;">USD</a>
																	<input type="hidden" value="USD" />
																</li>
																<li class="currency-GBP">
																	<a href="javascript:;">GBP</a>
																	<input type="hidden" value="GBP" />
																</li>
																<li class="currency-EUR">
																	<a href="javascript:;">EUR</a>
																	<input type="hidden" value="EUR" />
																</li>
															</ul>
														</div>
													</div>
												</div>
												@endif
												@if(Auth::user() && Auth::user()->user_type == 3)
												<div class="m_login-account">
													<span class="dropdown-toggle login-icon" data-toggle="dropdown">
														<i class="fa fa-ellipsis-v"></i>
														<i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
														<i class="sub-dropdown visible-sm visible-md visible-lg"></i>
													</span>
													<div class="m_dropdown-login dropdown-menu login-content">
														<div class="clearfix">
															<ul class="account-content">
																<li class="avata-item">
																	<i class="fa fa-user" aria-hidden="true"></i>
																	<p class="user-name">{{Auth::user()->name}}</p>
																</li>
																<li class="link-item"><a href="{{asset(App::getLocale().'/profile')}}"><i class="fa fa-user"></i>My Account</a></li>
																<li class="link-item"><a href="{{asset(App::getLocale().'/cart')}}"><i class="fa fa-shopping-cart"></i>My orders</a></li>
																<li class="link-item"><a href="{{asset(App::getLocale().'/wishlist')}}"><i class="fa fa-heart"></i>My Wishlist</a></li>
																<li class="link-item"><a href="{{asset(App::getLocale().'/contact')}}"><i class="fa fa-life-ring"></i>Support</a></li>
																<li class="link-item">
																	<a role="menuitem" tabindex="-1" href="{{ route('logout') }}"  onclick="event.preventDefault();
																								 document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
																	 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
																				@csrf
																		</form>
																</li>
															</ul>
															<ul class="currencies currencies-content">
																<li class="currency-USD active">
																	<a href="javascript:;">USD</a>
																	<input type="hidden" value="USD">
																</li>
																<li class="currency-GBP">
																	<a href="javascript:;">GBP</a>
																	<input type="hidden" value="GBP">
																</li>
																<li class="currency-EUR">
																	<a href="javascript:;">EUR</a>
																	<input type="hidden" value="EUR">
																</li>
															</ul>
														</div>
													</div>
												</div>
												@endif
											</div>
										</div>
									</div>
									<div class="navMobile-navigation">
										<div class="navMobile-logo">
											<a href="{{asset(App::getLocale().'/')}}"><img class="header-logo-image" src="{{asset('front/assets/images/logo.png')}}" alt="" title="Fast Food" /></a>
										</div>
										<div class="group_mobile_right">
											<div class="nav-icon">
												<div class="m_search search-tablet-icon">
													<span class="dropdownMobile-toggle search-dropdown">
														<span class="icon-dropdown cs-icon icon-search" data-class="cs-icon icon-search"></span>
														<i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
														<i class="sub-dropdown visible-sm visible-md visible-lg"></i>
													</span>
													<div class="m_dropdown-search dropdown-menu search-content">
														<form class="search" action="">
															<input type="hidden" name="type" value="product" />
															<input type="text" name="q" class="search_box" placeholder="search our store" value="" />
															<span class="search-clear cs-icon icon-close"></span>
															<button class="search-submit" type="submit">
																<span class="cs-icon icon-search"></span>
															</button>
														</form>
													</div>
												</div>
												<div class="icon_cart">
													<div class="m_cart-group">
														<a class="cart dropdownMobile-toggle dropdown-link">
															<i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
															<i class="sub-dropdown visible-sm visible-md visible-lg"></i>
															<div class="num-items-in-cart">
																<div class="items-cart">
																	<div class="num-items-in-cart">
																		<span class="cs-icon icon-bag"></span>
																		<span class="cart_text">
																		<span class="number">2</span>
																		</span>
																	</div>
																</div>
															</div>
														</a>
														<div class="dropdown-menu cart-info">
															<div class="cart-content">
																<div class="text-items"><span>{{count($carts)}} item(s) in the shopping cart</span> <span class="cs-icon icon-close close-dropdown"></span> </div>
																<div class="items control-container">
																	@foreach($carts->shuffle()->slice(0,4) as $cart)
																	<div class="group_cart_item">
																		<div class="cart-left"><a class="cart-image" href="{{asset(App::getLocale().'/product/'.$cart->product_id)}}"><img src="{{asset('/admin/product/'.$cart->get_product($cart->product_id)->images[0]->image)}}" alt="{{$cart->get_product($cart->product_id)->product_name}}" title="{{$cart->get_product($cart->product_id)->product_name}}"></a></div>
																		<div class="cart-right">
																			<div class="cart-title"><a href="{{asset(App::getLocale().'/product/'.$cart->product_id)}}">{{$cart->get_product($cart->product_id)->product_name}} / {{$cart->size}}</a></div>
																			<div class="cart-price"><span class="money" data-currency-usd="${{$cart->total_price}}" data-currency="USD">${{$cart->total_price}}</span></div>
																			<div class="cart-qty">
																				<span class="quantity">Qty: {{$cart->quantity}}</span>
																				<a title="Add To Wishlist" class="wishlist-extra-crispy-1" href="#">
																					<span class="cs-icon icon-heart"></span>
																				</a>
																				<a class="cart-close" title="Remove" href="#">
																					<span class="cs-icon icon-bin"></span>
																				</a>
																			</div>
																		</div>
																	</div>
																	@endforeach
																</div>
																<div class="subtotal"><span>Subtotal:</span><span class="cart-total-right money" data-currency-usd="{{$sub_total}}$" data-currency="USD">{{$sub_total}}$</span></div>
																<div class="action"><button class="_btn" onclick="window.location.href='{{url(App::getLocale().'/cart')}}'">Proceed To Checkout</button><button class="_btn float-right" onclick="window.location.href='{{url(App::getLocale().'/wishlist')}}'">View Your Wish List</button></div>
															</div>
														</div>
													</div>
												</div>
												<div class="icon_accounts">
													@if(!Auth::user() || Auth::user()->user_type != 3)
													<div class="m_login-account">
														<span class="dropdown-toggle login-icon" data-toggle="dropdown">
															<i class="fa fa-ellipsis-v"></i>
															<i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
															<i class="sub-dropdown visible-sm visible-md visible-lg"></i>
														</span>
														<div class="m_dropdown-login dropdown-menu login-content">
															<div class="clearfix">
																<div class="login-register-content">
																	<ul class="nav nav-tabs">
																		<li class="account-item-title active">
																			<a href="#account-login" data-toggle="tab">
																				Login
																			</a>
																		</li>
																		<li class="account-item-title">
																			<a href="#account-register" data-toggle="tab">
																				Register
																			</a>
																		</li>
																	</ul>
																	<div class="tab-content group_form">
																		<div class="tab-pane active account-item-content" id="account-login">
																			<form method="post" action="{{url('login')}}" accept-charset="UTF-8">
																				@csrf
																				<div class="clearfix large_form form-item">
																					<input type="email" value="" name="email" class="form-control" placeholder="Email Address *" />
																					@if ($errors->has('email'))
													                    <span class="invalid-feedback" role="alert">
													                        <strong>{{ $errors->first('email') }}</strong>
													                    </span>
													                @endif
																				</div>
																				<div class="clearfix large_form form-password form-item">
																					<input type="password" value="" name="password]" class="form-control password" placeholder="Password *" />
																					<span class="cs-icon icon-eye"></span>
																					@if ($errors->has('password'))
													                    <span class="invalid-feedback" role="alert">
													                        <strong>{{ $errors->first('password') }}</strong>
													                    </span>
													                @endif
																				</div>
																				<div class="action_bottom">
																					<button class="_btn" type="submit">Login</button>
																					<a href="{{ route('password.request') }}"><span class="red"></span> Forgot your password?</a>
																				</div>
																			</form>
																		</div>
																		<div class="tab-pane account-item-content " id="account-register">
																			<form method="post" action="{{url('register')}}" id="create_customer" accept-charset="UTF-8">
																				@csrf
																				<div class="clearfix large_form form-item">
																					<input placeholder="Name" type="text" value="" name="name" id="first_name" class="text" size="30" />
																					@if ($errors->has('name'))
													                    <span class="invalid-feedback" role="alert">
													                        <strong>{{ $errors->first('name') }}</strong>
													                    </span>
													                @endif
																				</div>
																				<div class="clearfix large_form form-item">
																					<input placeholder="Email" type="email" value="" name="email" id="email" class="text" size="30" />
																					@if ($errors->has('email'))
													                    <span class="invalid-feedback" role="alert">
													                        <strong>{{ $errors->first('email') }}</strong>
													                    </span>
													                @endif
																				</div>
																				<div class="clearfix large_form form-password form-item">
																					<input placeholder="Password" type="password" value="" name="password" id="password" class="password text" size="30" />
																					<span class="cs-icon icon-eye"></span>
																					@if ($errors->has('password'))
													                    <span class="invalid-feedback" role="alert">
													                        <strong>{{ $errors->first('password') }}</strong>
													                    </span>
													                @endif
																				</div>
																				<input type="hidden" name="user_type" value="2">
																				<div class="clearfix large_form form-password form-item">
																					<input placeholder="Confirm Password" type="password" value="" name="password-confirm"  id="password-confirm" class="password text" size="30" />
																					<span class="cs-icon icon-eye"></span>
																				</div>
																				<div class="action_bottom">
																					<button class="_btn" type="submit">Create</button>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>
																<ul class="wish-compare-content">
																	<ul class="wish-compare-content">
																		<li class="link-item"><a href="{{url(App::getLocale().'/wishlist')}}">My Wishlist</a></li>
																		<li class="link-item"><a href="{{url(App::getLocale().'/cart')}}">My Cart</a></li>
																	</ul>
																</ul>
																<ul class="currencies currencies-content">
																	<li class="currency-USD active">
																		<a href="javascript:;">USD</a>
																		<input type="hidden" value="USD" />
																	</li>
																	<li class="currency-GBP">
																		<a href="javascript:;">GBP</a>
																		<input type="hidden" value="GBP" />
																	</li>
																	<li class="currency-EUR">
																		<a href="javascript:;">EUR</a>
																		<input type="hidden" value="EUR" />
																	</li>
																</ul>
															</div>
														</div>
													</div>
													@endif
													@if(Auth::user() && Auth::user()->user_type == 3)
													<div class="m_login-account">
														<span class="dropdown-toggle login-icon" data-toggle="dropdown">
															<i class="fa fa-ellipsis-v"></i>
															<i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
															<i class="sub-dropdown visible-sm visible-md visible-lg"></i>
														</span>
														<div class="m_dropdown-login dropdown-menu login-content">
															<div class="clearfix">
																<ul class="account-content">
																	<li class="avata-item">
																		<i class="fa fa-user" aria-hidden="true"></i>
																		<p class="user-name">{{Auth::user()->name}}</p>
																	</li>
																	<li class="link-item"><a href="{{asset(App::getLocale().'/profile')}}"><i class="fa fa-user"></i>My Account</a></li>
																	<li class="link-item"><a href="{{asset(App::getLocale().'/cart')}}"><i class="fa fa-shopping-cart"></i>My orders</a></li>
																	<li class="link-item"><a href="{{asset(App::getLocale().'/wishlist')}}"><i class="fa fa-heart"></i>My Wishlist</a></li>
																	<li class="link-item"><a href="{{asset(App::getLocale().'/contact')}}"><i class="fa fa-life-ring"></i>Support</a></li>
																	<li class="link-item">
																		<a role="menuitem" tabindex="-1" href="{{ route('logout') }}"  onclick="event.preventDefault();
																									 document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
																		 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
																					@csrf
																			</form>
																	</li>
																</ul>
																<ul class="currencies currencies-content">
																	<li class="currency-USD active">
																		<a href="javascript:;">USD</a>
																		<input type="hidden" value="USD">
																	</li>
																	<li class="currency-GBP">
																		<a href="javascript:;">GBP</a>
																		<input type="hidden" value="GBP">
																	</li>
																	<li class="currency-EUR">
																		<a href="javascript:;">EUR</a>
																		<input type="hidden" value="EUR">
																	</li>
																</ul>
															</div>
														</div>
													</div>
													@endif
												</div>

											</div>
											<div class="navMobile-menu">
												<div class="group_navbtn">
													<a href="javascript:void(0)" class="dropdown-toggle-navigation">
														<span class="cs-icon icon-menu"></span>
														<i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
														<i class="sub-dropdown visible-sm visible-md visible-lg"></i>
													</a>
													<div class="navigation_dropdown_scroll dropdown-menu">
														<ul class="navigation_links_mobile">
															@foreach($categorys as $cat)
																@if(count($cat->sub_category) > 0)
																<li class="nav-item navigation navigation_mobile">
																	<a href="#" class="menu-mobile-link">
																		{{$cat->category_name}}
																	</a>
																	<a href="javascript:void(0)" class="arrow_sub arrow">
																		<i class="arrow-plus"></i>
																	</a>
																	<ul class="menu-mobile-container" style="display: none;">
																		@foreach($cat->sub_category as $sub_category)
																		<li class=" li-sub-mega">
																			<a tabindex="-1" href="{{asset(App::getLocale().'/category/'.$sub_category->_id)}}">{{$sub_category->category_name}}</a>
																		</li>
																		@endforeach
																	</ul>
																</li>
																@else
																<li class="nav-item">
																	<a href="{{asset(App::getLocale().'/category/'.$cat->_id)}}">
																		{{$cat->category_name}}
																	</a>
																</li>
																@endif
															@endforeach
														</ul>
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

		</div>
	</header>
	<div class="fix-sticky"></div>

	<!-- Main Content -->
	<div class="page-container" id="PageContainer">
		<main class="main-content" id="MainContent" role="main">
		    @yield('content')
		</main>
	</div>

	<!-- Footer -->
	<footer class="footer">
		<div id="shopify-section-theme-footer" class="shopify-section">
			<section class="footer-information-block clearfix" >
				<div class="container">
					<div class="row">
						<div class="footer-information-inner">
							<div class="footer-information-content">
								<div class="information-item col-sm-4 not-animated" data-animate="fadeInUp" data-delay="200">
									<div class="about-content">
										<div class="logo-footer">
											<img src="{{asset('front/assets/images/logo_footer.png')}}" alt="" />
										</div>
										<div class="about-caption">
											{{$about->about_us}}
										</div>
										<div class="about-contact">
											<div class="item">
												<span class="cs-icon icon-marker"></span><address>{{$about->address}}</address>
											</div>
											<div class="item">
												<span class="cs-icon icon-phone"></span><a href="tel:(084)0123456789">{{$about->phone}}</a>
											</div>
											<div class="item">
												<span class="cs-icon icon-mail"></span><a href="{{$about->email}}">{{$about->email}}</a>
											</div>
										</div>
									</div>
								</div>
								<div class="blog-group col-sm-4 not-animated" data-animate="fadeInUp" data-delay="200">
									<h5 class="footer-title">Recent Post</h5>
									<div class="blog-content">
										@foreach($blogs->shuffle()->take(3) as $blog)
										<div class="blogs-item">
											<div class="blogs-left">
												<a class="blogs-img" href="{{asset(App::getLocale().'/article/'.$blog->_id)}}">
													<img src="{{$blog->image}}" alt="The art of food" />
												</a>
											</div>
											<div class="blogs-right">
												<a href="{{asset(App::getLocale().'/article/'.$blog->_id)}}" class="blogs-title clearfix">{{$blog->title}}</a>
												<span class="date">{{$blog->created_at->format('d M Y')}}</span>
											</div>
										</div>
										@endforeach
									</div>
									<div class="col-md-7 col-md-offset-5">
										<a href="{{asset(App::getLocale().'/articles')}}" class="btn btn-success">See More</a>
									</div>
								</div>
								<div class="social-payment-item col-sm-4 not-animated" data-animate="fadeInUp" data-delay="200">
									<h5 class="footer-title"> Follow Us</h5>
									<div class="social-content">
										<div class="social-caption">
											<a href="https://www.facebook.com/shopify" title="Fast Food on Facebook" class="icon-social facebook"><i class="fa fa-facebook"></i></a>
											<a href="https://twitter.com/shopify" title="Fast Food on Twitter" class="icon-social twitter"><i class="fa fa-twitter"></i></a>
											<a href="https://plus.google.com/+shopify" title="Fast Food on Google+" class="icon-social google-plus"><i class="fa fa-google-plus"></i></a>
											<a href="https://www.pinterest.com/shopify" title="Fast Food on Pinterest" class="icon-social pinterest"><i class="fa fa-pinterest"></i></a>
											<a href="https://instagram.com/shopify" title="Fast Food on Instagram" class="icon-social instagram"><i class="fa fa-instagram"></i></a>
											<a href="https://www.youtube.com/user/shopify" title="Fast Food on Youtube" class="icon-social youtube"><i class="fa fa-youtube"></i></a>
										</div>
									</div>
									<div class="payment-content ">
										<h5 class="footer-title">Payment Methods</h5>
										<div class="payment-caption">
											<span class="icon-cc icon-cc-discover" title="Discover"></span>
											<span class="icon-cc icon-cc-american" title="Amex"></span>
											<span class="icon-cc icon-cc-western" title="Western Union"></span>
											<span class="icon-cc icon-cc-paypal" title="PayPal"></span>
											<span class="icon-cc icon-cc-moneybookers" title="MoneyBookers"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="copy-right clearfix">
				<div class="copy-right-wrapper">
					<div class="copy-right-inner">
						<div class="footer_links">
							<ul>
								@foreach($categorys as $cat)
								@if(count($cat->sub_category) > 0 || !$cat->category)
								<li><a href="{{asset(App::getLocale().'/category/'.$cat->_id)}}" title="Home">{{$cat->category_name}}</a></li>
								@endif
								@endforeach
								<li><a href="{{url(App::getLocale().'/contact')}}" title="Contact">Contact</a></li>
								<li><a href="{{url(App::getLocale().'/about')}}" title="Contact">About Us</a></li>
								@if(Auth::user())
								<li><a href="{{url(App::getLocale().'/profile')}}" title="My account">My account</a></li>
								@endif
								<li><a href="{{ route('login') }}" title="Login">Login</a></li>
							</ul>
						</div>
						<div class="footer_copyright">Copyright &copy; 2017 <a href="{{asset(App::getLocale().'/')}}" title="">{{$about->company_name}}</a>. All Rights Reserved</div>
					</div>
				</div>
			</section>
		</div>
	</footer>

	<!-- Modal Search-->
	<div class="modal fade" id="lightbox-search" tabindex="-1" role="dialog" aria-labelledby="lightbox-search" aria-hidden="true" style="display: none;">
		<div class="modal-dialog animated" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span class="cs-icon icon-close"></span>
			</button>
					<h4 class="modal-title" id="myModalLabel">Search something</h4>
				</div>
				<div class="modal-body">
					<div id="search-info">
						<form class="search" action="" style="position: relative;">
							<input type="hidden" name="type" value="product">
							<input type="text" name="q" class="search_box" placeholder="search our store" value="" autocomplete="off">
							<span class="search-clear cs-icon icon-close" style="display: none;"></span>
							<button class="search-submit" type="submit">
								<span class="cs-icon icon-search"></span>
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div id="view-vue">
		<!-- Modal QuickView -->
		<div id="quick-shop-modal" class="modal quick-shop" role="dialog" aria-hidden="true" tabindex="-1" data-width="800" style="display: none;">
			<div class="modal-dialog fadeIn animated">
				<div class="modal-content">
					<div class="modal-header">
						<i class="close lnr lnr-cross btooltip" data-toggle="tooltip" data-placement="top" title="" data-dismiss="modal" aria-hidden="true" data-original-title="Close"></i>
					</div>
					<div class="modal-body">
						<div class="quick-shop-modal-bg" style="display: none;"></div>
						<div class="clearfix">
							<div class="col-md-6 product-image">
								<div id="quick-shop-image" class="product-image-wrapper">
									<div id="featuted-image" class="main-image featured">
										<img id="product_image_ajax" v-if="product" :src="image_url+'/admin/product/'+product.images[0].image" :alt="product.product_name">
									</div>
									<div id="gallery_main_qs" class="product-image-thumb gallery-images-layout" v-if="product">
										<div class="gallery-images-inner">
											<div class="show-image-load show-load-quick" style="display: none;">
												<div class="show-image-load-inner"><i class="fa fa-spinner fa-pulse fa-2x"></i></div>
											</div>
											<div id="product_gallery_ajax" class="qs-vertical-slider vertical-image-content">
												<div class="image-vertical image-thumb active">
													<a class="cloud-zoom-gallery" :href="image_url+'/admin/product/'+product.images[0].image" :data-image="image_url+'/admin/product/'+product.images[0].image" :data-zoom-image="image_url+'/admin/product/'+product.images[0].image">
														<img :src="image_url+'/admin/product/'+product.images[0].image" :alt="product.product_name">
													</a>
												</div>
												<div class="image-vertical image-thumb" v-for="image in product.images.slice(1)">
													<a class="cloud-zoom-gallery" :href="image_url+'/admin/product/'+image.image" :data-image="image_url+'/admin/product/'+image.image" :data-zoom-image="image_url+'/admin/product/'+image.image">
														<img :src="image_url+'/admin/product/'+image.image" :alt="product.product_name">
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 product-information">
								<div id="quick-shop-container">
									<h3 id="quick-shop-title product_name_ajax"><a v-if="product" :href="url+product._id">@{{product.product_name}}</a></h3>
									<div class="rating-star"><span class="shopify-product-reviews-badge" data-id="6537875078"></span></div>
									<div class="quick-shop-management" id="availability_ajax">
										<span class="management-title">Availability:</span>
										<div class="management-description">In-Stock</div>
									</div>
									<div class="description">
										<div id="quick-shop-description" class="text-left">
											<p id="product_description_ajax" v-if="product">@{{product.datiles}}</p>
										</div>
									</div>
									<form action="{{url(App::getLocale().'/cart')}}" method="post" class="variants" id="quick-shop-product-actions product_form_ajax" enctype="multipart/form-data">
										@csrf
										<input v-if="product" type="hidden" name="product_id" :value="product._id">
										<div id="quick-shop-variants-container" class="variants-wrapper">
											<div class="selector-wrapper variant-wrapper-size">
												<label for="quick-shop-variants-213223800871-option-0">Size</label>
												<select class="single-option-selector product_size_ajax" name="size"  @change="change_price(product._id)" v-model="size" placeholder="size type" data-option="option1" id="quick-shop-variants-213223800871-option-0">
													<option value="Small">Small</option>
													<option value="Medium">Medium</option>
													<option value="Large">Large</option>
												</select>
												<input type="hidden" class="price_input" name="price" value="1">
											</div>
											<!-- <div class="selector-wrapper variant-wrapper-topping">
												<label for="quick-shop-variants-213223800871-option-2">Topping</label>
												<select class="single-option-selector" name="topping_price" v-if="product" data-option="option3" id="quick-shop-variants-213223800871-option-2 product_toping_ajax">
													<option :value="topping._id" v-for="topping in product.toppings">@{{topping.topping_name}}</option>
												</select>
											</div> -->
										</div>
										<!-- <div class="swatch" id="show_swatch">
											<div id="show_swatch_detail_1 product_color_ajax" v-if="product"  class="swatch_quick color clearfix" data-option-index="1">
												<label>Color</label>
												<div id="element-color-Black" data-value="Black" class="swatch-element color Black available active">
													<div class="tooltip">@{{product.colors[0].color}}</div>
													<input id="swatch-quick-1-Black" type="radio" name="option-1" value="Black">
													<label id="label-color-Black" for="swatch-quick-1-Black" :style="'background-color:'+product.colors[0].color"><img class="crossed-out" src="{{asset('front/assets/images/logo_footer.png')}}" alt="image product"></label>
												</div>
												<div id="element-color-Black" data-value="Black" class="swatch-element color Black available active" v-for="color in product.colors.slice(1)">
													<div class="tooltip">@{{color.color}}</div>
													<input id="swatch-quick-1-Black" type="radio" name="option-1" value="Black">
													<label id="label-color-Black" for="swatch-quick-1-Black" :style="'background-color:'+color.color"><img class="crossed-out" src="{{asset('front/assets/images/logo_footer.png')}}" alt="image product"></label>
												</div>

											</div>
										</div> -->
										<div id="quick-shop-price-container" class="product-price">
											<span v-if="product" class="price" id="product_price_ajax"><span class="money money_change" :data-currency-usd="product.price_small" data-currency="USD">@{{product.price_small}}$</span></span>
										</div>
										<div class="others-bottom">
											<div class="purchase-section">
												<div class="quantity-wrapper clearfix">
													<div class="wrapper">
														<input id="quantity product_quantity_ajax"  type="text" name="quantity" value="1" maxlength="5" size="5" class="item-quantity">
														<div class="qty-btn-vertical">
															<span class="qty-down fa fa-chevron-down" title="Decrease" data-src="#quantity"></span>
															<span class="qty-up fa fa-chevron-up" title="Increase" data-src="#quantity"></span>
														</div>
													</div>
												</div>
												<div class="purchase">
													<button id="quick-shop-add" onclick="change_qs_quantity('-qs');" class="_btn add-to-cart" type="submit" name="add" style="opacity: 1;"><span class="cs-icon icon-cart"></span>Add to cart</button>
												</div>
											</div>
											<div class="comWish-content">

												<a href="{{url(App::getLocale().'/wishlist')}}" title="Add To Wishlist" class="wishlist wishlist-extra-crispy-1" data-wishlisthandle="extra-crispy-1">
													<span class="icon-small icon-small-heart"></span>
													<span class="_compareWishlist-text">Wishlist</span>
												</a>
												<a title="Send email" class="send-email">
													<span class="icon-small icon-small-email"></span>
													<span class="_compareWishlist-text">Send email</span>
												</a>
											</div>
										</div>
									</form>
									<div class="supports-fontface">
										<span class="social-title">Share this</span>
										<div class="quick-shop-social">
											<a target="_blank" href="#" class="share-facebook">
												<span class="fa fa-facebook"></span>
											</a>
											<a target="_blank" href="#" class="share-twitter">
												<span class="fa fa-twitter"></span>
											</a>
											<a target="_blank" href="#" class="share-pinterest">
												<span class="fa fa-pinterest"></span>
											</a>
											<a target="_blank" href="#" class="share-google">
												<!-- Cannot get Google+ share count with JS yet -->
												<span class="fa fa-google-plus"></span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal WishList -->
		<div class="wishlist-model" id="wishlist-vue">
			<div class="modal fade" id="modalwishlist1" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
				<div class="modal-dialog white-modal">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span class="cs-icon icon-close"></span>
							</button>
						</div>
						<div class="modal-body">
							<div class="modal-note wishlist-note">
								Added to <a href="wish-list.html">Wishlist</a>
							</div>
							<div class="modal-body-inner">
								<div class="modal-left wishlist-left">
									<div class="modal-product wishlist-product">
										<div class="product-left">
											<div  class="wishlist-image modal-image wishlist-image-213223800871">
												<img id="product_image_ajax" v-if="product" :src="image_url+'/admin/product/'+product.images[0].image" :alt="product.product_name">
											</div>
										</div>
									</div>
								</div>
								<div class="modal-right wishlist-right">
									<div class="wishlist-cart">
										<form action="{{url(App::getLocale().'/wishlist')}}" method="post" class="variants-form variants"  enctype="multipart/form-data">
											@csrf
											<input v-if="product" type="hidden" name="product_id" :value="product._id">
											<div class="form-left">
												<div class="selector-wrapper variant-wrapper-size">
													<label for="quick-shop-variants-213223800871-option-0">Size</label>
													<select class="single-option-selector product_size_ajax" v-model="size" placeholder="size type"  @change="change_price(product._id)" name="size" data-option="option1" id="quick-shop-variants-213223800871-option-0">
														<option value="Small">Small</option>
														<option value="Medium">Medium</option>
														<option value="Large">Large</option>
													</select>
													<input type="hidden" class="price_input" name="price" value="1">
												</div>
												<div class="quantity-content">
													<label>QTY</label>
													<input type="text" size="5" class="item-quantity item-quantity-qs" name="quantity" value="1">
												</div>
												<div class="product-right">
													<a v-if="product" :href="url+product._id">@{{product.product_name}}</a>
													<div v-if="product" class="wishlist-price wishlist-price-213223800871"><span class="price" id="product_pr"><span class="money money_change" :data-currency-usd="product.price_small" data-currency="USD">@{{product.price_small}}$</span></span>
													</div>
												</div>
											</div>
											<div class="form-right">
												<div class="others-bottom">
													<button type="submit" class="_btn btn-quick-shop" href="#">Add Wishlist</button>
													<a href="{{url(App::getLocale().'/cart')}}" class="_btn add-to-cart">Add to cart</a>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal Compare -->
		<div class="wishlist-model" id="compare-vue">
			<div class="modal fade" id="modalCompare" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
				<div class="modal-dialog white-modal">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span class="cs-icon icon-close"></span>
							</button>
						</div>
						<div class="modal-body">
							<div class="modal-note wishlist-note">
								Added to <a href="wish-list.html">Cart</a>
							</div>
							<div class="modal-body-inner">
								<div class="modal-left wishlist-left">
									<div class="modal-product wishlist-product">
										<div class="product-left">
											<div  class="wishlist-image modal-image wishlist-image-213223800871">
												<img id="product_image_ajax" v-if="product" :src="image_url+'/admin/product/'+product.images[0].image" :alt="product.product_name">
											</div>
										</div>
									</div>
								</div>
								<div class="modal-right wishlist-right">
									<div class="wishlist-cart">
										<form action="{{url(App::getLocale().'/cart')}}" method="post" class="variants-form variants"  enctype="multipart/form-data">
											@csrf
											<input v-if="product" type="hidden" name="product_id" :value="product._id">
											<div class="form-left">
												<div class="selector-wrapper variant-wrapper-size">
													<label for="quick-shop-variants-213223800871-option-0">Size</label>
													<select class="single-option-selector product_size_ajax" v-model="size" placeholder="size type" @change="change_price(product._id)" name="size" data-option="option1" id="quick-shop-variants-213223800871-option-0">
														<option value="Small">Small</option>
														<option value="Medium">Medium</option>
														<option value="Large">Large</option>
													</select>
													<input type="hidden" class="price_input" name="price" value="1">
												</div>
												<div class="quantity-content">
													<label>QTY</label>
													<input type="text" size="5" class="item-quantity item-quantity-qs" name="quantity" value="1">
												</div>
												<div class="product-right">
													<a v-if="product" :href="url+product._id">@{{product.product_name}}</a>
													<div v-if="product" class="wishlist-price wishlist-price-213223800871"><span class="price" id="product_pr"><span class="money money_change" :data-currency-usd="product.price_small" data-currency="USD">@{{product.price_small}}$</span></span>
													</div>
												</div>
											</div>
											<div class="form-right">
												<div class="others-bottom">
													<a class="_btn btn-quick-shop" href="{{url(App::getLocale().'/wishlist')}}">View Wishlist</a>
													<button type="submit" href="#" class="_btn add-to-cart">Add to cart</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Search-->
	<div class="modal fade" id="lightbox-search" tabindex="-1" role="dialog" aria-labelledby="lightbox-search" aria-hidden="true" style="display: none;">
		<div class="modal-dialog animated" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span class="cs-icon icon-close"></span>
			</button>
					<h4 class="modal-title" id="myModalLabel">Search something</h4>
				</div>
				<div class="modal-body">
					<div id="search-info">
						<form class="search" action="" style="position: relative;">
							<input type="hidden" name="type" value="product">
							<input type="text" name="q" class="search_box" placeholder="search our store" value="" autocomplete="off">
							<span class="search-clear cs-icon icon-close" style="display: none;"></span>
							<button class="search-submit" type="submit">
								<span class="cs-icon icon-search"></span>
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Float right icon -->
	<div class="float-right-icon">
		<ul>
			<li>
				<div id="scroll-to-top" data-toggle="" data-placement="left" title="Scroll to Top" class="off">
					<i class="fa fa-angle-up"></i>
				</div>
			</li>
		</ul>
	</div>

	<!-- vue script framework -->
	<script src="{{asset('js/app.js')}}"></script>
  <script type="text/javascript" src="{{asset('front/assets/javascripts/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('front/assets/javascripts/classie.js')}}"></script>
	<script type="text/javascript" src="{{asset('front/assets/javascripts/application-appear.js')}}"></script>
	<script type="text/javascript" src="{{asset('front/assets/javascripts/jquery.themepunch.plugins.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('front/assets/javascripts/jquery.themepunch.revolution.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('front/assets/javascripts/cs.script.js')}}"></script>
	<script type="text/javascript" src="{{asset('front/assets/javascripts/jquery.currencies.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('front/assets/javascripts/jquery.zoom.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('front/assets/javascripts/linkOptionSelectors.js')}}"></script>
	<script type="text/javascript" src="{{asset('front/assets/javascripts/owl.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('front/assets/javascripts/scripts.js')}}"></script>
	<script type="text/javascript" src="{{asset('front/assets/javascripts/social-buttons.js')}}"></script>
	<script type="text/javascript" src="{{asset('front/assets/javascripts/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('front/assets/javascripts/jquery.touchSwipe.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('front/assets/javascripts/jquery.fancybox.js')}}"></script>
	<script type="text/javascript">
		$(document).on('click','.quickview-click-ajax',function(){
			id = $(this).data('productid');
			$.get('{{asset(App::getLocale()."/product/get/")}}/'+id,function(response){
				window.product = response.product
			});
		});
		$(document).on('click','.compare-click-ajax',function(){
			id = $(this).data('productid');
			$.get('{{asset(App::getLocale()."/product/get/")}}/'+id,function(response){
				window.product = response.product
			});
		});
		$(document).on('click','.wishlist-click-ajax',function(){
			id = $(this).data('productid');
			$.get('{{asset(App::getLocale()."/product/get/")}}/'+id,function(response){
				window.product = response.product
			});
		});
	</script>
	<script type="text/javascript">
		 const vue_app_1 =  new Vue({
			el:'#view-vue',
			data:{
				text:'hello',
				image_url:"{{asset('/')}}/",
				url:"{{asset(App::getLocale().'/product')}}/",
				product:window.product,
				size:'',
				price:''
			},
			methods:{
				get_product(){
					this.product=window.product
					$("#gallery_main_qs .qs-vertical-slider").owlCarousel('update');

				},
				change_price(id){
					$.get('{{asset(App::getLocale()."/product/price/get")}}/'+id+'/'+this.size,function(response){
						this.price = response;
						$('.money_change').html(this.price+'$');
						$('.price_input').val(this.price);
					});
				}
			},
			mounted(){
				this.interval = setInterval(() => this.get_product(), 10);
				console.log('hello');
				if(this.product){
					this.price=this.product.price_small
				}
			}
		});


	</script>
	@yield('script')
	<script>
		function addaffix(scr) {
			if ($(window).innerWidth() >= 992) {
				if (scr > 153) {
					if (!$('#top').hasClass('affix')) {
						$('#top').addClass('affix').addClass('fadeInDown animated');
					}
				} else {
					if ($('#top').hasClass('affix')) {
						$('#top').removeClass('affix').removeClass('fadeInDown animated');
					}
				}
			} else if ($(window).innerWidth() < 992 && $(window).innerWidth() > 767) {
				if (scr > 95) {
					if (!$('#top').hasClass('affix')) {
						$('#top').addClass('affix').addClass('fadeInDown animated');
					}
				} else {
					if ($('#top').hasClass('affix')) {
						$('#top').removeClass('affix').removeClass('fadeInDown animated');
					}
				}
			} else {
				if (scr > 45) {
					if (!$('#top').hasClass('affix')) {
						$('#top').addClass('affix').addClass('');
					}
				} else {
					if ($('#top').hasClass('affix')) {
						$('#top').removeClass('affix').removeClass('');
					}
				}
			}
		}
		$(window).scroll(function() {
		"use strict";
			var scrollTop = $(this).scrollTop();
			addaffix(scrollTop);
		});
		$(window).resize(function() {
		"use strict";
			var scrollTop = $(this).scrollTop();
			addaffix(scrollTop);
		});
	</script>
</body>


</html>
