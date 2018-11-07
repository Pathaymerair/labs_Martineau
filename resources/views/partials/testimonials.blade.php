@section('testimonials')

<!-- Testimonial section -->
<div class="testimonial-section pb100">
    <div class="test-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-4">
                <div class="section-title left">
                    <h2>{{$titles[0]->testiTitle}}</h2>
                </div>
                <div class="owl-carousel" id="testimonial-slide">
                    <!-- single testimonial -->
                    @foreach($testimonials as $testi)
                    <div class="testimonial">
                        <span>‘​‌‘​‌</span>
                        <p>{{$testi->testiDesc}}</p>
                        <div class="client-info">
                            <div class="avatar">
                                <img src="img/avatar/{{$testi->client->clientImg}}" alt="">
                            </div>
                            <div class="client-name">
                                <h2>{{$testi->client->clientName}}</h2>
                                <p>{{$testi->client->clientCompany}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial section end-->

@endsection