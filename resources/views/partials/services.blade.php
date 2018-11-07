@section('services')

<!-- Services section -->
<div class="services-section spad">
    <div class="container">
        <div class="section-title dark">
            <h2>{{$titles[0]->servicesTitle}} <span>{{$titles[0]->overServicesTitle}}</span> {{$titles[0]->servicesTitleDeux}}</h2>
        </div>
        <div class="row">
            <!-- single service -->
            @foreach ($services as $service)
                @if ($service->state_id < 3)
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <div class="icon">
                        <i class="{{$service->icon->svg}}"></i>
                    </div>
                    <div class="service-text">
                        <h2>{{$service->serviceTitre}}</h2>
                        <p>{{$service->serviceDesc}}</p>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            
        <div class="text-center">
            @if (Route::currentRouteName() == 'service')
                        {{$services->links()}}
                        <div class="text-center">
                            <a href="#team-section" class="site-btn">{{$titles[0]->servicesButton}}</a>
                        </div>
            @else 
            {{$services->links()}}
                        <div class="text-center">
                            <a href="/service" class="site-btn">{{$titles[0]->servicesButton}}</a>
                        </div>
            @endif
        </div>
    </div>
</div>
<!-- services section end -->

@endsection