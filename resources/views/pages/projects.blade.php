@extends('adminlte::page')


@section('content')

    @if (\Session::has('success'))
    <div class="alert bg-success">
        <p class="text-white"><b>{{ \Session::get('success') }}</b> <i class="close icon" data-dismiss='alert'></i></p>
        
    </div><br />
    @endif
    @if (\Session::has('ded'))
    <div class="alert bg-danger text-white">
        <p class="text-white"><b>{{ \Session::get('ded') }}</b> <i class="close icon" data-dismiss='alert'></i></p>
        
    </div><br />
    @endif

<div class="container">
    <div class="row">
        @foreach ($projects as $project)
            <div class="col-xs-4">
                <div class="sv-card">
                    <div class="card-img">
                        <img src="/img/projects/nm/{{$project->projectImg}}" alt="">
                    </div>
                    <div class="card-text">
                        <h2>{{$project->projectTitre}}</h2>
                        {!!$project->projectDesc!!}
                        <div class="col-xs-6">
                                <form action="/project/edit/{{$project->id}}" method="GET">
                                    @csrf
                                    <button class="btn-warning btn">Edit</button>
                                    </form>
                        </div>
                        <div class="col-xs-6">
                                <form action="/project/delete/{{$project->id}}" method="POST">
                                    @csrf
                                    <button class="btn-danger btn">Delete</button>
                                </form>
                        </div>
                    </div>
                </div>
                

            </div>
        @endforeach
    </div>
</div>
@stop