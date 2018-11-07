@extends('layouts.app')

<header class="header-section">
<div class="logo">
<img src="img/logo.png" alt=""><!-- Logo -->
</div>
<!-- Navigation -->
<div class="responsive"><i class="fa fa-bars"></i></div>
<nav>
<ul class="menu-list">
<li ><a href="/">Home</a></li>
<li class="active"><a href="/service">Services</a></li>
<li ><a href="/blog">Blog</a></li>
<li><a href="/contact">Contact</a></li>
@if (Auth::user())
<li><a href="/home">Home</a></li>
@endif
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