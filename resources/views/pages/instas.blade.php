@extends('adminlte::page')

@section('content')

<div class="container">
        @if (\Session::has('up'))
            <div class="alert bg-success">
                <p class="text-white"><b>{{ \Session::get('up') }}</b> <i class="close icon" data-dismiss='alert'></i></p>
                
            </div><br />
            @endif
            <h1 class='mt-5'>Add an instagram item</h1>
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
    <form action="/insta/create" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="instaImg">
            <input type="file" name='instaImg' id='instaImg'>
        </label>
        </div>
        <button class="btn btn-success">Submit</button>
    </form>
    <div class="row  mt-5 ">
        @foreach ($instas as $insta)
            @if ($insta->state_id == 1 || $insta->state_id == 2)
        <div class="col-xs-3 ml-2 bg-light mt-3">
            <img class='text-center align-center' src="/img/instagram/thumb/{{$insta->instaThumb}}" alt="">
            <div class="row text-center mt-2">
                    <form action="/insta/edit/{{$insta->id}}" method="GET">
                        @csrf
                        <button class="btn btn-warning">Edit</button></form>
                   
                            <form action="/insta/delete/{{$insta->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger ml-5">Delete</button>
                        </form>
            </div>
        </div>
     
        
           
            @endif
        @endforeach
    </div>
    
</div>


@stop