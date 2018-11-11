@extends('layouts.app')


<div id="preloder">
		<div class="loader">
			<img src="img/logo.png" alt="">
			<h2>Loading.....</h2>
		</div>
	</div>

@include('partials.navbar')

@include('partials.contactHeader')

@include('partials.googleMap')

@include('partials.contact')

@include('partials.footer')

