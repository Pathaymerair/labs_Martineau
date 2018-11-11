@extends('layouts.app')


<div id="preloder">
		<div class="loader">
			<img src="img/logo.png" alt="">
			<h2>Loading.....</h2>
		</div>
	</div>

@include('partials.navbar')

@include('partials.servicesHeader')

@include('partials.services')

@include('partials.features')

@include('partials.projetsCards')

@include('partials.newsletter')

@include('partials.contact')

@include('partials.footer')

