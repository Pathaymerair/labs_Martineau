@section('projetsCards')

<!-- services card section-->
<div class="services-card-section spad" id='services-card-section'>
    <div class="container">
        <div class="row">
@foreach ($group[0] as $project)

    
<div class="col-md-4 col-sm-6">
    <div class="sv-card">
        <div class="card-img">
            <img src="/img/projects/nm/{{$project->projectImg}}" alt="">
        </div>
        <div class="card-text">
            <h2>{{$project->projectTitre}}</h2>
            {!!$project->projectDesc!!}
        </div>
    </div>
</div>
@endforeach


        </div>
    </div>
</div>
<!-- services card section end-->

@endsection