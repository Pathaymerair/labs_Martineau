@extends('layouts.app')


<div id="preloder">
		<div class="loader">
			<img src="img/logo.png" alt="">
			<h2>Loading.....</h2>
		</div>
	</div>

@include('partials.navbar')

@include('partials.blogHeader')

@include('partials.blogContent')

@include('partials.newsletter')

@include('partials.footer')
