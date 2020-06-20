<!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Admin</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">
		<meta name="csrf-token" value="{{ csrf_token() }}" />
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.css')}}" />
		<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.css')}}" />
		<link rel="stylesheet" href="{{asset('admin/assets/vendor/magnific-popup/magnific-popup.css')}}" />
		<link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}" />
		<link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}" />
		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{asset('admin/assets/stylesheets/theme.css')}}" />
		<link rel="stylesheet" href="{{asset('admin/assets/vendor/pnotify/pnotify.custom.css')}}" />
		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{asset('admin/assets/stylesheets/skins/default.css')}}" />
		<link rel="stylesheet" href="{{asset('admin/assets/vendor/isotope/jquery.isotope.css')}}" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{asset('admin/assets/stylesheets/theme-custom.css')}}">

		<!-- Head Libs -->
		<script src="{{asset('admin/assets/vendor/modernizr/modernizr.js')}}"></script>

		<script type="text/javascript">
			window.default_locale = "{{ str_replace('_', '-', app()->getLocale()) }}";
		</script>
	</head>
	<body>
		<section class="body">
					<!-- start: header -->
					<header class="header">
						<div class="logo-container">
							<a href="{{asset('/adminpanel')}}" class="logo">
								<img src="{{asset('admin/assets/images/logo.png')}}" height="35" alt="Porto Admin" />
							</a>
							<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
								<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
							</div>
						</div>

						<!-- start: search & user box -->
						<div class="header-right">

							<form action="pages-search-results.html" class="search nav-form">
								<div class="input-group input-search">
									<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
									</span>
								</div>
							</form>

							<span class="separator"></span>

							<ul class="notifications">
								<li>
									<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
										<i class="fa fa-tasks"></i>
										<span class="badge">3</span>
									</a>
									<div class="dropdown-menu notification-menu large">
										<div class="notification-title">
											<span class="pull-right label label-default">3</span>
											Tasks
										</div>

										<div class="content">
											<ul>
												<li>
													<p class="clearfix mb-xs">
														<span class="message pull-left">Generating Sales Report</span>
														<span class="message pull-right text-dark">60%</span>
													</p>
													<div class="progress progress-xs light">
														<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
													</div>
												</li>

												<li>
													<p class="clearfix mb-xs">
														<span class="message pull-left">Importing Contacts</span>
														<span class="message pull-right text-dark">98%</span>
													</p>
													<div class="progress progress-xs light">
														<div class="progress-bar" role="progressbar" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100" style="width: 98%;"></div>
													</div>
												</li>

												<li>
													<p class="clearfix mb-xs">
														<span class="message pull-left">Uploading something big</span>
														<span class="message pull-right text-dark">33%</span>
													</p>
													<div class="progress progress-xs light mb-xs">
														<div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;"></div>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</li>
								<li>
									<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
										<i class="fa fa-envelope"></i>
										<span class="badge">4</span>
									</a>

									<div class="dropdown-menu notification-menu">
										<div class="notification-title">
											<span class="pull-right label label-default">230</span>
											Messages
										</div>
										<div class="content">
											<ul>
												<li>
													<a href="#" class="clearfix">
														<figure class="image">
															<img src="{{asset('admin/assets/images/!sample-user.jpg')}}" alt="Joseph Doe Junior" class="img-circle" />
														</figure>
														<span class="title">Joseph Doe</span>
														<span class="message">Lorem ipsum dolor sit.</span>
													</a>
												</li>
												<li>
													<a href="#" class="clearfix">
														<figure class="image">
															<img src="{{asset('admin/assets/images/!sample-user.jpg')}}" alt="Joseph Junior" class="img-circle" />
														</figure>
														<span class="title">Joseph Junior</span>
														<span class="message truncate">Truncated message. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam, nec venenatis risus. Vestibulum blandit faucibus est et malesuada. Sed interdum cursus dui nec venenatis. Pellentesque non nisi lobortis, rutrum eros ut, convallis nisi. Sed tellus turpis, dignissim sit amet tristique quis, pretium id est. Sed aliquam diam diam, sit amet faucibus tellus ultricies eu. Aliquam lacinia nibh a metus bibendum, eu commodo eros commodo. Sed commodo molestie elit, a molestie lacus porttitor id. Donec facilisis varius sapien, ac fringilla velit porttitor et. Nam tincidunt gravida dui, sed pharetra odio pharetra nec. Duis consectetur venenatis pharetra. Vestibulum egestas nisi quis elementum elementum.</span>
													</a>
												</li>
												<li>
													<a href="#" class="clearfix">
														<figure class="image">
															<img src="{{asset('admin/assets/images/!sample-user.jpg')}}" alt="Joe Junior" class="img-circle" />
														</figure>
														<span class="title">Joe Junior</span>
														<span class="message">Lorem ipsum dolor sit.</span>
													</a>
												</li>
												<li>
													<a href="#" class="clearfix">
														<figure class="image">
															<img src="{{asset('admin/assets/images/!sample-user.jpg')}}" alt="Joseph Junior" class="img-circle" />
														</figure>
														<span class="title">Joseph Junior</span>
														<span class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam.</span>
													</a>
												</li>
											</ul>

											<hr />

											<div class="text-right">
												<a href="#" class="view-more">View All</a>
											</div>
										</div>
									</div>
								</li>
										<li id="notification">
											<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
												<i class="fa fa-bell"></i>
												<span class="badge">@{{i}}</span>
											</a>

											<div class="dropdown-menu notification-menu">
												<div class="notification-title">
													<span class="pull-right label label-default">@{{i}}</span>
													Alerts
												</div>

												<div class="content">
													<ul >
														<li v-for="real in real_time_message">
															<a href="#" class="clearfix">
																<div class="image">
																	<i class="fa fa-thumbs-down bg-danger"></i>
																</div>
																<span class="title">@{{real}}</span>
																<span class="message">@{{ date}}</span>
															</a>
														</li>
													</ul>

													<hr />

													<div class="text-right">
														<a href="#" class="view-more">View All</a>
													</div>
												</div>
											</div>

										</li>
							</ul>

							<span class="separator"></span>

							<div id="userbox" class="userbox">
								<a href="#" data-toggle="dropdown">
									<figure class="profile-picture">
										<img src="{{asset('admin/assets/images/!logged-user.jpg')}}" alt="Joseph Doe" class="img-circle" data-lock-picture="{{asset('admin/assets/images/!logged-user.jpg')}}" />
									</figure>
									<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
										<span class="name">{{Auth::user()->name}}</span>
										<span class="role">administrator</span>
									</div>

									<i class="fa custom-caret"></i>
								</a>

								<div class="dropdown-menu">
									<ul class="list-unstyled">
										<li class="divider"></li>
										<li>
											<a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>
										</li>
										<li>
											<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
										</li>
										<li>
											<a role="menuitem" tabindex="-1" href="{{ route('logout') }}"  onclick="event.preventDefault();
																		 document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a>
											 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
														@csrf
												</form>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- end: search & user box -->
					</header>
					<!-- end: header -->

					<!-- navabar  -->
					<div class="inner-wrapper">
						<!-- start: sidebar -->
						<aside id="sidebar-left" class="sidebar-left">

							<div class="sidebar-header">
								<div class="sidebar-title">
									Navigation
								</div>
								<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
									<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
								</div>
							</div>

							<div class="nano">
								<div class="nano-content">
									<nav id="menu" class="nav-main" role="navigation">
										<ul class="nav nav-main">
											<li @if($main_active == 'home') class="nav-active" @endif>
												<a href="{{asset(App::getLocale().'/adminpanel')}}">
													<i class="fa fa-home" aria-hidden="true"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li class="nav-parent @if($main_active == 'category') nav-active @endif">
												<a>
													<i class="fa fa-bars" aria-hidden="true"></i>
													<span>Category</span>
												</a>
												<ul class="nav nav-children">
													<li @if($sub_active == 'category') class="nav-active" @endif>
														<a href="{{asset(App::getLocale().'/adminpanel/categorys')}}">
															<i class="fa fa-bars" aria-hidden="true"></i>
															 Category
														</a>
													</li>
													<li @if($sub_active == 'sub_category') class="nav-active" @endif>
														<a href="{{asset(App::getLocale().'/adminpanel/sub_categorys')}}">
															<i class="fa fa-bars" aria-hidden="true"></i>
															 Sub Category
														</a>
													</li>
												</ul>
											</li>
											<li @if($main_active == 'product') class="nav-active" @endif>
												<a href="{{asset(App::getLocale().'/adminpanel/product')}}">
													<i class="fa fa-tachometer" aria-hidden="true"></i>
													<span>Product</span>
												</a>
											</li>
											<li @if($main_active == 'about') class="nav-active" @endif>
												<a href="{{asset(App::getLocale().'/adminpanel/about')}}">
													<i class="fa fa-send" aria-hidden="true"></i>
													<span>About</span>
												</a>
											</li>
											<li @if($main_active == 'people') class="nav-active" @endif>
												<a href="{{asset(App::getLocale().'/adminpanel/peoples')}}">
													<i class="fa fa-user" aria-hidden="true"></i>
													<span>Our People</span>
												</a>
											</li>
											<li class="nav-parent @if($main_active == 'main_blog') nav-active @endif">
												<a>
													<i class="fa fa-paw" aria-hidden="true"></i>
													<span>Blog</span>
												</a>
												<ul class="nav nav-children">
													<li @if($sub_active == 'blog_category') class="nav-active" @endif>
														<a href="{{asset(App::getLocale().'/adminpanel/blog_categorys')}}">
															<i class="fa fa-qrcode" aria-hidden="true"></i>
															 Blog Category
														</a>
													</li>
													<li @if($sub_active == 'tag') class="nav-active" @endif>
														<a href="{{asset(App::getLocale().'/adminpanel/blog_tags')}}">
															<i class="fa fa-qrcode" aria-hidden="true"></i>
															 Blog Tag
														</a>
													</li>
													<li @if($sub_active == 'blog') class="nav-active" @endif>
														<a href="{{asset(App::getLocale().'/adminpanel/blogs')}}">
															<i class="fa fa-qrcode" aria-hidden="true"></i>
															 Blog Content
														</a>
													</li>
												</ul>
											</li>
										</ul>
									</nav>
								</div>

							</div>

						</aside>
						<!-- end: sidebar -->

						<section role="main" class="content-body">
							<header class="page-header">
								@yield('menu-header')
								<!-- <h2>Menu Collapsed Layout</h2>
								<div class="right-wrapper pull-right">
									<ol class="breadcrumbs">
										<li>
											<a href="index.html">
												<i class="fa fa-home"></i>
											</a>
										</li>
										<li><span>Layouts</span></li>
										<li><span>Menu Collapsed</span></li>
									</ol>

									<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
								</div> -->
							</header>

							<!-- start: page -->
		          @yield('content')
							<!-- end: page -->
						</section>
					</div>
					<!-- end navabar -->

					<!-- notification -->
					<aside id="sidebar-right" class="sidebar-right">
						<div class="nano">
						<div class="nano-content">
							<a href="#" class="mobile-close visible-xs">
								Collapse <i class="fa fa-chevron-right"></i>
							</a>

							<div class="sidebar-right-wrapper">

								<div class="sidebar-widget widget-calendar">
									<h6>Upcoming Tasks</h6>
									<div data-plugin-datepicker data-plugin-skin="dark" ></div>

									<ul>
										<li>
											<time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
											<span>Company Meeting</span>
										</li>
									</ul>
								</div>

								<div class="sidebar-widget widget-friends">
									<h6>Friends</h6>
									<ul>
										<li class="status-online">
											<figure class="profile-picture">
												<img src="{{asset('admin/assets/images/!sample-user.jpg')}}" alt="Joseph Doe" class="img-circle">
											</figure>
											<div class="profile-info">
												<span class="name">Joseph Doe Junior</span>
												<span class="title">Hey, how are you?</span>
											</div>
										</li>
										<li class="status-online">
											<figure class="profile-picture">
												<img src="{{asset('admin/assets/images/!sample-user.jpg')}}" alt="Joseph Doe" class="img-circle">
											</figure>
											<div class="profile-info">
												<span class="name">Joseph Doe Junior</span>
												<span class="title">Hey, how are you?</span>
											</div>
										</li>
										<li class="status-offline">
											<figure class="profile-picture">
												<img src="{{asset('admin/assets/images/!sample-user.jpg')}}" alt="Joseph Doe" class="img-circle">
											</figure>
											<div class="profile-info">
												<span class="name">Joseph Doe Junior</span>
												<span class="title">Hey, how are you?</span>
											</div>
										</li>
										<li class="status-offline">
											<figure class="profile-picture">
												<img src="{{asset('admin/assets/images/!sample-user.jpg')}}" alt="Joseph Doe" class="img-circle">
											</figure>
											<div class="profile-info">
												<span class="name">Joseph Doe Junior</span>
												<span class="title">Hey, how are you?</span>
											</div>
										</li>
									</ul>
								</div>

							</div>
						</div>
					</div>
					</aside>
					<!-- end notification -->


			<!-- Modal Animation -->
			<div id="modalAnim" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
				@yield('form')
			</div>

			<div id="modalFullColorDanger" class="modal-block modal-full-color modal-block-danger mfp-hide">
				<form class="form-group" action="#" method="post" id="delete_form">
					@csrf
					<input type="hidden" name="_method" value="delete" />
					<section class="panel">
						<header class="panel-heading">
							<h2 class="panel-title">Danger Delete!</h2>
						</header>
						<div class="panel-body">
							<div class="modal-wrapper">
								<div class="modal-icon">
									<i class="fa fa-times-circle"></i>
								</div>
								<div class="modal-text">
									<h4>Are You Sure ?</h4>
								</div>
							</div>
						</div>
						<footer class="panel-footer">
							<div class="row">
								<div class="col-md-12 text-right">
									<button class="btn btn-default">submit</button>
									<button class="btn btn-default modal-dismiss">Cancel</button>
								</div>
							</div>
						</footer>
					</section>
				</form>
			</div>
			<!-- Vendor -->
			<script src="{{asset('admin/assets/vendor/jquery/jquery.js')}}"></script>
			<script src="{{asset('admin/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
			<script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
			<script src="{{asset('admin/assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
			<script src="{{asset('admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
			<script src="{{asset('admin/assets/vendor/magnific-popup/magnific-popup.js')}}"></script>
			<script src="{{asset('admin/assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>

			<!-- Specific Page Vendor -->
			<script src="{{asset('admin/assets/vendor/jquery-validation/jquery.validate.js')}}"></script>
			<script src="{{asset('admin/assets/javascripts/theme.js')}}"></script>
			<script src="{{asset('admin/assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
			<script src="{{asset('admin/assets/vendor/pnotify/pnotify.custom.js')}}"></script>
			<script src="{{asset('admin/assets/javascripts/ui-elements/examples.modals.js')}}"></script>
			<!-- Theme Base, Components and Settings -->
			<script src="{{asset('admin/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
			<!-- <script src="https://maps.google.com/maps/api/js?sensor=false"></script>
			<script src="{{asset('admin/assets/javascripts/maps/snazzy.themes.js')}}"></script> -->
			<script src="{{asset('admin/assets/javascripts/maps/examples.map.builder.js')}}"></script>
			<!-- Theme Custom -->
			<script src="{{asset('admin/assets/javascripts/theme.js')}}"></script>
			<script src="{{asset('admin/assets/javascripts/theme.custom.js')}}"></script>
			<script src="{{asset('admin/assets/vendor/pnotify/pnotify.custom.js')}}"></script>
			<script src="{{asset('admin/assets/javascripts/ui-elements/examples.notifications.js')}}"></script>
			<script src="{{asset('admin/assets/vendor/isotope/jquery.isotope.js')}}"></script>
			<!-- Theme Initialization Files -->
			<script src="{{asset('admin/assets/javascripts/theme.init.js')}}"></script>
			<script src="{{asset('admin/assets/javascripts/forms/examples.validation.js')}}"></script>

			<!-- vue script framework -->
			<script src="{{asset('js/app.js')}}"></script>
			<script type="text/javascript">
			$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});
				function send_url(url){
					console.log('hello');
					$('#delete_form').attr('action',url);
				}
					new Vue({
					el:'#notification',
					data:{
						mesage:'hello',
			      real_time_message:[],
			      i:1,
			      date:moment().format('LT')
					},
					created:function created(){

				    var _this=this;
				    Echo.channel('notify')
				      .listen('MessageEvent', (e) => {
				        _this.real_time_message.push(e.message)
								console.log('ok');
				          var notice = new PNotify({
				          title: 'hello',
				          text: 'Check me out! I\'m a notice.',
				          type: 'success',
				          hide: false,
				          buttons: {
				            closer: false,
				            sticker: false
				          }
				        });
				        notice.get().click(function() {
				          notice.remove();
				        });
				      });
				  }
				});
			</script>
			@yield('script')
		</section>
	</body>
</html>
