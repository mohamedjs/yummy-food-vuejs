@extends('front.layouts.layout')

@section('content')
			<section class="customers-layout register-layout">
				<div class="customers-wrapper">
					<div class="container">
						<div class="row">
							<div class="customers-inner">
								<div class="customers-content">
									<div id="register" class="customers">
										<h2>Register</h2>
										<form method="post" action="{{url('register')}}" accept-charset="UTF-8">
											@csrf
											<div class="clearfix large_form form-item">
												<input type="text" value="" placeholder="First Name" name="name" class="text" size="30">
											</div>
											<div class="clearfix large_form form-item">
												<input type="email" value="" placeholder="Email" name="email" class="text" size="30">
											</div>
											<div class="clearfix large_form form-password form-item">
												<input type="password" value="" placeholder="Password" name="password" class="password text" size="30">
												<span class="cs-icon icon-eye"></span>
											</div>
											<div class="action_bottom">
												<input class="_btn" type="submit" value="Create">
												<span class="note"><span class="or">or</span><a href="{{url('login')}}">Return to Login</a></span>
											</div>
										</form>
									</div>
									<!-- #register -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
@endsection
