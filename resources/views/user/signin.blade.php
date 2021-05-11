@extends('layouts.loginform')

@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h1>Sign In</h1>
		@if(count($errors) > 0)
		  <div class="alert alert-danger">
		  	@foreach($errors->all() as $error)
		  	<p> {{ $error }} </p>
		  	@endforeach
		  </div>
		@endif
		<form action="{{ route('user.signin')}}" method="post" class="register-form" id="login-form">
			<div class="form-group">
				<label for="email"><i class="zmdi zmdi-email"></i></label>
				<input type="text" id="email" name="email" placeholder="Your Email">
			</div>
			<div class="form-group">
				<label for="password"><i class="zmdi zmdi-lock"></i></label>
				<input type="password" id="password" name="password" placeholder="Password">
			</div>
			<div class="form-group">
					<input type="checkbox" name="remember" id="remember" class="agree-term" />
					<label for="remember" class="label-agree-term"><span><span></span></span>Remember me</label>

					</div>
			<button type="submit" class="btn btn-primary">Sign In</button>
			{{ csrf_field() }}
		</form>
		<div class="social-login">
				<span class="social-label">Or login with</span>
				<ul class="socials">
						<li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
						<li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
						<li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
				</ul>
		</div>
	</div>
</div>
@endsection
