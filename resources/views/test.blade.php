<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <title>Labs - Design Studio</title>
	<meta charset="UTF-8">
	<meta name="description" content="Labs - Design Studio">
	<meta name="keywords" content="lab, onepage, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    	<!-- Favicon -->
	{{-- <link href="img/favicon.ico" rel="shortcut icon"/> --}}

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,700|Roboto:300,400,700" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="/css/flaticon.css"/>
	<link rel="stylesheet" href="/css/magnific-popup.css"/>
	<link rel="stylesheet" href="/css/owl.carousel.css"/>
    <link rel="stylesheet" href="/css/style.css"/>


</head>

<body>

        <div id="preloder">
                <div class="loader">
                    <img src="img/logo.png" alt="">
                    <h2>Loading.....</h2>
                </div>
            </div>

<header class="header-section">
<div class="logo">
<img src="/img/logos/thumb/{{$titles->logo}}" alt=""><!-- Logo -->
</div>
<!-- Navigation -->
<div class="responsive"><i class="fa fa-bars"></i></div>
<nav>
<ul class="menu-list">
<li ><a href="/">Home</a></li>
<li><a href="/service">Services</a></li>
<li class="active"><a href="/blog">Blog</a></li>
<li><a href="/contact">Contact</a></li>
@if (Auth::user())
<li><a href="/home">Home</a></li>
@endif
</ul>
</nav>
</header>



<div class="page-top-section">
    <div class="overlay"></div>
    <div class="container text-right">
        <div class="page-info">
            <h2>{{$titles->blogPage}}</h2>
            <div class="page-links">
                <a href="#">{{$titles->homeRef}}</a>
                <span>{{$titles->blogRef}}</span>
            </div>
        </div>
    </div>
</div>

<div class="page-section spad">
    <div class="container">
        <div class="row">
@if (\Session::has('ded'))
<div class="alert alert-danger text-white">
<p>{{ \Session::get('ded') }} <i class="close icon" data-dismiss='alert'></i></p>

</div><br />
@endif
            <div class="col-md-8 col-sm-7 blog-posts mt-5">
                <!-- Post item -->
                
                @if (isset($details))

<h1 class='text-center'> Les résultats pour votre recherche <b> {{$query}} </b> : </h1>
<ul class=''>
@foreach ($details as $post)
@if ($post->state_id == 2)
<div class="post-item ">
    <div class="post-thumbnail">
        <img src="/img/blog/{{$post->image}}" alt="">
        <div class="post-date">
            <h2>{{$post->created_at->format('d')}}</h2>
            <h3>{{$post->created_at->format('M Y')}}</h3>
        </div>
    </div>
    <div class="post-content">
        <h2 class="post-title">{{$post->titre}}</h2>
        <div class="post-meta">
            <a href="">{{$post->user->name}}</a>
            <a href="">
                @foreach($post->tag as $tag)
                <span>{{$tag->nameTag}}</span>
            @endforeach
        </a>
            <a href="">
        
                    {{$post->comment->where('state_id', 2)->count()}} comment(s)                              
            
         </a>
        </div>
        <p>{!! substr($post->body, 0, 100) !!}</p>
        <a href="/post/{{$post->id}}" class="read-more">Read More</a>
    </div>
</div>
   @endif
@endforeach
</ul>
@endif
                <!-- Post item -->
                
                
                <!-- Pagination -->
              
             
            </div>
<div class="col-md-4 col-sm-5 sidebar">
    <!-- Single widget -->
    <div class="widget-item">
        <form action="/search" class="search-form" method="POST" role='search'>
            @csrf
            <input type="text" name='search' placeholder="{{$titles->searchPlaceholder}}">
            <button class="search-btn"><i class="flaticon-026-search"></i></button>
        </form>
    </div>
    <!-- Single widget -->
    <div class="widget-item">
        <h2 class="widget-title">{{$titles->categoriesTitle}}</h2>
        <ul>
            @foreach ($categories as $cate)
        @if ($cate->state_id == 2)
    <li><form action="/categorie/search" method="GET">
        @csrf
        <input type="hidden" value='{{$cate->nameCatego}}' name='searchCategorie'>
                <a onclick="event.target.parentElement.submit();" style="cursor: pointer;">
                        {{$cate->nameCatego}}
        </a>
        </form>
    </li>
        @endif
    @endforeach

        </ul>
    </div>
    <!-- Single widget -->
    <div class="widget-item">
        <h2 class="widget-title">{{$titles->instaTitle}}</h2>
        <ul class="instagram">
            @foreach($instas as $insta)
    <li><img src="/img/instagram/nm/{{$insta->instaImg}}" alt=""></li>

    @endforeach
        </ul>
    </div>
    <!-- Single widget -->
    <div class="widget-item">
        <h2 class="widget-title">{{$titles->tagsTitle}}</h2>
        <ul class="tag">
            @foreach ($tags as $tag)
        @if ($tag->state_id == 2)
        <li>
            <form action="/tag/search" method="GET">
                @csrf
                <input type="hidden" value='{{$tag->nameTag}}' name='searchTag'>
                        <a onclick="event.target.parentElement.submit();" style="cursor: pointer;">
                    {{$tag->nameTag}}
                </a>
                </form>
        </li>
    @endif
    @endforeach
        </ul>
    </div>
    <!-- Single widget -->
    <div class="widget-item">
        <h2 class="widget-title">{{$titles->quoteTitle}}</h2>
        <div class="quote">
            <span class="quotation">‘​‌‘​‌</span>
            <p>{{$titles->quoteDesc}}</p>
        </div>
    </div>
    <!-- Single widget -->
    <div class="widget-item">
        <h2 class="widget-title">{{$titles->addTitle}}</h2>
        <div class="add">
            <a href=""><img src="/img/add/nm/{{$titles->addImage}}" alt=""></a>
        </div>
    </div>
</div>
</div>
</div>
</div>

<!-- page section end-->


<!-- newsletter section -->
<div class="newsletter-section spad">
<div class="container">
<div class="row">
    <div class="col-md-3">
        <h2>{{$titles->newsletterTitle}}</h2>
    </div>
    <div class="col-md-9">
        <!-- newsletter form -->
        <form class="nl-form" action="/news/create" method="POST">
            @csrf
            <input type="text" name='newsMail' placeholder="{{$titles->newsletterPlaceholder}}" value='{{old('newsMail')}}'>
            <button class="site-btn btn-2">{{$titles->newsletterButton}}</button>
        </form>
    </div>
</div>
</div>
</div>
<!-- newsletter section end-->


<!-- Footer section -->
<footer class="footer-section">
<h2>{{$titles->copyright}} <a href="https://colorlib.com" target="_blank">{{$titles->copyrightName}}</a></h2>

</footer>
<!-- Footer section end -->


<!-- Scripts -->

<script src="{{ asset('/js/app.js') }}" defer></script>

</body>


