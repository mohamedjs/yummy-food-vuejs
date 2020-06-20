<!doctype html>
<html class="fixed">
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
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css')}}">

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

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{asset('admin/assets/stylesheets/theme-custom.css')}}">

		<!-- Head Libs -->
		<script src="{{asset('admin/assets/vendor/modernizr/modernizr.js')}}"></script>

	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
					</div>
					<div class="panel-body">
						<form action="{{url('login')}}" method="post">
              @csrf
							<div class="form-group mb-lg">
								<label>Username</label>
								<div class="input-group input-group-icon">
									<input name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
                <div class="col-md-12">
                  @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Password</label>
									<a href="{{ route('password.request') }}" class="pull-right">Lost Password?</a>
								</div>
								<div class="input-group input-group-icon">
									<input name="password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
                <div class="col-md-12">
                  @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="RememberMe" name="rememberme" type="checkbox" {{ old('remember') ? 'checked' : '' }}/>
										<label for="RememberMe">Remember Me</label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>

								</div>
							</div>

							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>or</span>
							</span>

							<div class="mb-xs text-center">
								<a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
								<a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
							</div>

							<p class="text-center">Don't have an account yet? <a href="{{route('register')}}">Sign Up!</a>

						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
			</div>
		</section>
		<!-- end: page -->

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
    <script src="{{asset('admin/assets/javascripts/theme.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
    <!-- Theme Custom -->
    <script src="{{asset('admin/assets/javascripts/theme.custom.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/pnotify/pnotify.custom.js')}}"></script>
    <script src="{{asset('admin/assets/javascripts/ui-elements/examples.notifications.js')}}"></script>
    <!-- Theme Initialization Files -->
    <script src="{{asset('admin/assets/javascripts/theme.init.js')}}"></script>
    <script src="{{asset('admin/assets/javascripts/forms/examples.validation.js')}}"></script>

	</body>
</html>
