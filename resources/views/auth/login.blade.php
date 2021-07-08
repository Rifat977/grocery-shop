@extends('layouts.frontend.app')

@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css"  rel="stylesheet">
@endpush

@section('content')

<!-- login -->
<div class="w3_login">
			<h3>Sign In & Sign Up</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
					<div class="tooltip">Click Me</div>
				  </div>
				  <div class="form">
					<h2>Login to your account</h2>
					<form action="{{ route('login') }}" method="post">
                    @csrf
					  <input type="text" name="number" placeholder="Number" required=" ">
					  <input type="password" name="password" placeholder="Password" required=" ">
					  <input type="submit" value="Login">
					</form>
				  </div>
				  <div class="form">
					<h2>Create an account</h2>
	@if($errors->any())
	<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)
	<li>{{$error}}</li>
	@endforeach
	</ul>
	</div>
	@endif
					<form action="{{ route('register') }}" method="POST">
						@csrf
					  <input type="text" name="name" placeholder="Your Name" required=" ">
					  <input type="email" name="email" placeholder="Email Address" required=" ">
					  <input type="text" name="number" placeholder="Phone Number" required=" ">
					  <input type="password" name="password" placeholder="Password" required=" ">
					  <input type="password" name="password_confirmation" placeholder="Confirm Password" required=" ">
					  <input type="submit" value="Register">
					</form>
				  </div>
				  <div class="cta"><a href="#">Forgot your password?</a></div>
				</div>
			</div>
			<script>
				$('.toggle').click(function(){
				  // Switches the Icon
				  $(this).children('i').toggleClass('fa-pencil');
				  // Switches the forms  
				  $('.form').animate({
					height: "toggle",
					'padding-top': 'toggle',
					'padding-bottom': 'toggle',
					opacity: "toggle"
				  }, "slow");
				});
			</script>
		</div>
<!-- //login -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->

@endsection
