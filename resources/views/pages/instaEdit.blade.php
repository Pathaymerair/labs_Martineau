@extends('adminlte::page')

@section('content')

<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
@endif
    <form action="/insta/update/{{$insta->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="instaImg">
            <input type="file" name='instaImg' id='instaImg'>
        </label>
        </div>
        <button class="btn btn-success">Submit</button>
    </form>

    
</div>


@stop