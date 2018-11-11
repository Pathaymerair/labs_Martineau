@extends('layouts.app')


<div id="preloder">
		<div class="loader">
			<img src="img/logo.png" alt="">
			<h2>Loading.....</h2>
		</div>
	</div>

@include('partials.navbar')

@include('partials.intro')

@include('partials.about')

@include('partials.testimonials')

@include('partials.services')

@include('partials.team')

@include('partials.promotion')

@include('partials.contact')

@include('partials.footer')


