@section('features')

<!-- features section -->
<div class="team-section spad" id='team-section'>
    <div class="overlay"></div>
    <div class="container">
        <div class="section-title">
            <h2>{{$titles[0]->introSlogan}} <span>{{$titles[0]->overIntroSlogan}}</span> {{$titles[0]->introSloganDeux}}</h2>
        </div>
        <div class="row">
            <!-- feature item -->
            <div class="col-md-4 col-sm-4 features">
                @foreach ($group[0] as $project)
                    
                <div class="icon-box light left">
                    <div class="service-text">
                        <h2>{{$project->projectTitre}}</h2>
                        <p>{{$project->projectDesc}}</p>
                    </div>
                    <div class="icon">
                        <i class="{{$project->icon->svg}}"></i>
                    </div>
                </div>
                @endforeach

            </div>
            <!-- Devices -->
            <div class="col-md-4 col-sm-4 devices">
                <div class="text-center">
                    <img src="img/device.png" alt="">
                </div>
            </div>
            <!-- feature item -->
            <div class="col-md-4 col-sm-4 features">
                @foreach ($group[1] as $project)
                    
                <div class="icon-box light">
                    <div class="icon">
                        <i class="{{$project->icon->svg}}"></i>
                    </div>
                    <div class="service-text">
                        <h2>{{$project->projectTitre}}</h2>
                        <p>{{$project->projectDesc}}</p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="text-center mt100">
            <a href="#services-card-section" class="site-btn">{{$titles[0]->introButton}}</a>
        </div>
    </div>
</div>
<!-- features section end-->

@endsection