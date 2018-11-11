@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
        <h1>Images random</h1>
        @if (\Session::has('success'))
        <div class="alert bg-success">
            <p class="text-white"><b>{{ \Session::get('success') }}</b> <i class="close icon" data-dismiss='alert'></i></p>
            
        </div><br />
        @endif

        @if (\Session::has('ded'))
        <div class="alert bg-danger">
            <p class="text-white"><b>{{ \Session::get('ded') }}</b> <i class="close icon" data-dismiss='alert'></i></p>
            
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
        <h3>Add a new image.</h3>
        <form action="imagesRandom/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                    <label for="image_id">Nouvelle image random</label>
                    <input type="file" id="image_id" name='image_id'>
                  </div>
                  <button class="btn btn-success">Submit</button>
        </form>
        <h3 class='mt-5'>Images collection</h3>
        <div class="row">
                @foreach ($randoms as $random)
              
                    <div class="col-xs-4">
                            <img src="img/randoms/thumb/{{$random->randomThumb}}" alt="">
              
                            <form action="/delete/random/{{$random->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                            </form>
                    </div>
               
              

                @endforeach
              </div>
</div>
@stop


