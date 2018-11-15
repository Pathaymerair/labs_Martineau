@extends('layouts.app')


<div id="preloder">
		<div class="loader">
			<img src="img/logo.png" alt="">
			<h2>Loading.....</h2>
		</div>
	</div>

	<header class="header-section">
		<div class="logo">
			<img src="img/logo.png" alt=""><!-- Logo -->
		</div>
		<!-- Navigation -->
		<div class="responsive myDiv"><i class="fa fa-bars"></i></div>
		<nav>
			<ul class="menu-list nav">
				<li class="toggle"><a href="/" >Main</a></li>
				<li class='active'><a href="/service" >Services</a></li>
				<li class='toggle'><a href="/blog" >Blog</a></li>
				<li class='toggle'><a href="/contact" >Contact</a></li>
				<li class='toggle'><a href="home" >Home</a></li>
			</ul>
		</nav>
	</header>

@include('partials.servicesHeader')

@include('partials.services')

@include('partials.features')

@include('partials.projetsCards')

@include('partials.newsletter')

@include('partials.contact')

@include('partials.footer')

