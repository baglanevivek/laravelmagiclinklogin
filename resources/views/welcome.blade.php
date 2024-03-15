@extends('layouts.app', ['title' => 'Home'])
@section('content')
	<div class="d-flex justify-content-center vh-100 align-items-center">
    	<div class="w-100 p-4 bg-white shadow rounded" style="max-width: 35rem;">
      		<h2>Logged in as {{ Auth::user()->name }}</h2>
      		<a href="{{ route('logout') }}" class="text-indigo-600 inline-block underline mt-4">Logout</a>
    	</div>
  	</div>
@endsection