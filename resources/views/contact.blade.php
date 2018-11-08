@extends('layouts.app')

<header class="header-section">
        <div class="logo">
            <img src="/img/logos/thumb/{{$titles[0]->logo}}" alt=""><!-- Logo -->
        </div>
        <!-- Navigation -->
        <div class="responsive"><i class="fa fa-bars"></i></div>
        <nav>
            <ul class="menu-list">
                <li ><a href="/">Home</a></li>
                <li><a href="/service">Services</a></li>
                <li><a href="/blog">Blog</a></li>
                <li class="active"><a href="/contact">Contact</a></li>
                @if (Auth::user())
                <li><a href="/home">Home</a></li>
                @endif
            </ul>
        </nav>
    </header>

@include('partials.contactHeader')

@include('partials.googleMap')

@include('partials.contact')

@include('partials.footer')