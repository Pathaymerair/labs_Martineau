@section('intro')

<!-- Intro Section -->
<div class="hero-section">
    <div class="hero-content">
        <div class="hero-center">
            <img src="img/logos/nm/{{$titles[0]->bigLogo}}" alt="">
      
            <p>{{$titles[0]->slogan}}</p>
    
        </div>
    </div>
    <!-- slider -->
    <div id="hero-slider" class="owl-carousel">
        @foreach($carousels as $carousel)
        <div class="item  hero-item" data-bg="/img/carousel/nm/{{$carousel->carouImg}}"></div>

        @endforeach
    </div>
</div>
<!-- Intro Section -->

@endsection
