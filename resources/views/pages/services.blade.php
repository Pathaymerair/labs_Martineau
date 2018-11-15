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
        @foreach ($services as $service)
        @if ($service->state_id < 3)
            <div class="col-xs-4">
                <div class="sv-card">
                    <div class="card-text">
                           
                                    <div class="icon-box text-center">
                                            <div class="icon ">
                                                <i class="{{$service->icon->svg}}"></i> 
                                            </div>
                                        </div>
                                
                        <h2>{{$service->serviceTitre}}</h2>
                        {!!$service->serviceDesc!!}
                        <div class="col-xs-6">
                                <form action="/service/edit/{{$service->id}}" method="GET">
                                    @csrf
                                    <button class="btn-warning btn">Edit</button>
                                    </form>
                        </div>
                        <div class="col-xs-6">
                                <form action="/service/delete/{{$service->id}}" method="POST">
                                    @csrf
                                    <button class="btn-danger btn">Delete</button>
                                </form>
                        </div>
                    </div>
                </div>
                

            </div>
            @endif
        @endforeach
    </div>
</div>
@stop