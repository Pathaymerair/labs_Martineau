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
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,700|Roboto:300,400,700" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
    <link rel="stylesheet" href="/css/style.css"/>
    
 

</head>
<body>
   


    @yield('navbar')
    @yield('intro')
    @yield('blogHeader')
    @yield('servicesHeader')
    @yield('contactHeader')
    @yield('about')
    @yield('search')
    @yield('blogContent')
    @yield('postBlog')
    @yield('sidebar')
    @yield('map')
    @yield('testimonials')
    @yield('services')
    @yield('team')
    @yield('features')
    @yield('promotion')
    @yield('projetsCards')
    @yield('newsletter')
    @yield('contact')
    @yield('footer')

    



    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>

    
    
</body>
</html>
