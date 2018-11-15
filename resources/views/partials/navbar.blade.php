@section('navbar')

<header class="header-section">
    <div class="logo">
        <img src="img/logo.png" alt=""><!-- Logo -->
    </div>
    <!-- Navigation -->
    <div class="responsive myDiv"><i class="fa fa-bars"></i></div>
    <nav>
        <ul class="menu-list nav">
            <li class="toggle active"><a href="/" >Main</a></li>
            <li class='toggle'><a href="/service" >Services</a></li>
            <li class='toggle'><a href="/blog" >Blog</a></li>
            <li class='toggle'><a href="/contact" >Contact</a></li>
            <li class='toggle'><a href="home" >Home</a></li>
        </ul>
    </nav>
</header>


{{-- <script>
window.ready(function() {
    document.getElementById('#nav').onclick = function(){
        $(".nav > li").removeClass('active');
        $(this).addClass('active');
    }
});
</script> --}}
@endsection