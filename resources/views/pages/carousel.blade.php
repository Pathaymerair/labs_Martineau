@extends('adminlte::page')

@section('content')

<div class="container">
    @if (\Session::has('up'))
        <div class="alert bg-success" style='width:50%'>
            <p class="text-white"><b>{{ \Session::get('up') }} </b><i class="close icon" data-dismiss='alert'></i></p>
            
        </div><br />
    @endif
            <h1 class='mt-5'>Add a carousel item</h1>
    @if (\Session::has('success'))
    <div class="alert bg-success">
        <p class="text-white">{{ \Session::get('success') }} <i class="close icon" data-dismiss='alert'></i></p>
        
    </div><br />
    @endif
    @if (\Session::has('ded'))
    <div class="alert bg-danger">
        <p class="text-white"><b>{{ \Session::get('ded') }} </b><i class="close icon" data-dismiss='alert'></i></p>
        
    </div><br />
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
@endif
    <form action="/carou/create" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="carouImg">
            <input type="file" name='carouImg' id='carouImg'>
        </label>
        </div>
        <button class="btn btn-success">Submit</button>
    </form>
    <div class="row bg-black mt-5">
        @foreach ($carousels as $carou)
            
        <div class="col-xs-4">
            <img src="/img/carousel/thumb/{{$carou->carouThumb}}" alt="">
        </div>
        <div class="col-xs-1">
            <form action="/carou/edit/{{$carou->id}}" method="GET">
            @csrf
            <button class="btn btn-warning">Edit</button></form>
        </div>
        <div class="col-xs-1">
                <form action="/carou/delete/{{$carou->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button></form>
            </div>
        @endforeach
    </div>
    
</div>


@stop