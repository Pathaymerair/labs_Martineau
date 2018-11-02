@extends('adminlte::page')

@section('content')

<div class="container">
        @if (\Session::has('up'))
            <div class="alert alert-success">
                <p>{{ \Session::get('up') }} <i class="close icon" data-dismiss='alert'></i></p>
                
            </div><br />
            @endif
            <h1 class='mt-5'>Add an instagram item</h1>
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }} <i class="close icon" data-dismiss='alert'></i></p>
        
    </div><br />
    @endif
    @if (\Session::has('ded'))
    <div class="alert alert-danger">
        <p>{{ \Session::get('ded') }} <i class="close icon" data-dismiss='alert'></i></p>
        
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
    <form action="/insta/create" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="instaImg">
            <input type="file" name='instaImg' id='instaImg'>
        </label>
        </div>
        <button class="btn btn-success">Submit</button>
    </form>
    <div class="row bg-black mt-5">
        @foreach ($instas as $insta)
            @if ($insta->state_id == 1 || $insta->state_id == 2)
        <div class="col-xs-4">
            <img src="/img/instagram/thumb/{{$insta->instaThumb}}" alt="">
        </div>
        <div class="col-xs-1">
            <form action="/insta/edit/{{$insta->id}}" method="GET">
            @csrf
            <button class="btn btn-warning">Edit</button></form>
        </div>
        <div class="col-xs-1">
                <form action="/insta/delete/{{$insta->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
            </div>
            @endif
        @endforeach
    </div>
    
</div>


@stop