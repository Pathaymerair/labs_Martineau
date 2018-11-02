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
    <h1 class='mt-5'>Modify a carousel item</h1>
    <form action="/carou/update/{{$carou->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="carouImg">
            <input type="file" name='carouImg' id='carouImg'>
        </label>
        </div>
        <button class="btn btn-success">Submit</button>
    </form>
</div>


@stop