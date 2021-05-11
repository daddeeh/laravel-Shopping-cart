@extends('layouts.loginform')

@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h1>Sign Up</h1>
		@if(count($errors) > 0)
		  <div class="alert alert-danger">
		  	@foreach($errors->all() as $error)
		  	<p> {{ $error }} </p>
		  	@endforeach
		  </div>
		@endif
		<form action="{{ route('user.signup')}} "  method="post" class="register-form" id="register-form">
			<div class="form-group">
				  <label for="email"><i class="zmdi zmdi-email"></i></label>
				<input type="text" id="email" name="email" placeholder="Your Email">
			</div>
			<div class="form-group">
			  <label for="pass"><i class="zmdi zmdi-lock"></i></label>
				<input type="password" id="password" name="password" placeholder="Password">
			</div>
			<div class="form-group">
					<input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
					<label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
			</div>
			<button type="submit" class="btn btn-primary">Sign up</button>
			{{ csrf_field() }}
		</form>
		<div class="signup-image">
				<a href="{{ url('user/signin') }}" class="signup-image-link">I am already a member</a>
		</div>
	</div>
</div>
@endsection
