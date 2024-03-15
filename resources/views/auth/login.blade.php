@extends('layouts.app', ['title' => 'Login'])
@section('content')
	<div class="d-flex justify-content-center vh-100 align-items-center">
    	<div class="w-100 p-4 bg-white shadow rounded" style="max-width: 35rem;">
      		@if(!session()->has('success'))
        		<h2>Login</h1>
        		<form action="{{ route('login') }}" method="post" class="mt-4">
	          		@csrf
	          		<div class="form-group mb-3">
		            	<label for="email" class="block">Email</label>
		            	<input type="email" name="email" id="email" class="form-control" required />
		            	@error('email')
		              		<p class="text-danger">{{ $message }}</p>
		            	@enderror
		          	</div>
	          		<button type="submit" class="btn btn-primary">Login</button>
        		</form>
      		@else
        		<p>Please click the link sent to your email to finish logging in.</p>
      		@endif
    	</div>
  	</div>
@endsection