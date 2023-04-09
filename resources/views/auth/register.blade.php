@extends('layouts.app')

@section('content')
<div class="signup-form">
    <form action="{{'/register'}}" method="post">
        @csrf
		<h2>Register</h2>
		<p class="hint-text">Create your account. It's free and only takes a minute.</p>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required">
                    @error('first_name')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
				<div class="col"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required">
                    @error('last_name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
			</div>        	
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
            @error('email')
            <div class="text-danger">{{$message}}</div>
        @enderror
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            @error('password')
            <div class="text-danger">{{$message}}</div>
        @enderror
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required="required">
        </div>        
        <div class="form-group">
			<label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
        </div>
    </form>
	<div class="text-center">Already have an account? <a href="#">Sign in</a></div>
</div>
@endsection