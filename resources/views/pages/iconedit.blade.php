@extends('adminlte::page')


@section('content')

<div class="container">
    <h1>Create icon</h1>
    @if (\Session::has('success'))
    <div class="alert bg-success">
        <p class="text-white"><b>{{ \Session::get('success') }} </b><i class="close icon" data-dismiss='alert'></i></p>
        
    </div><br />
    @endif
    @if (\Session::has('ded'))
    <div class="alert bg-danger">
        <p class="text-white"><b>{{ \Session::get('ded') }} </b><i class="close icon" data-dismiss='alert'></i></p>
        
    </div><br />
    @endif
    <div class="icon-box">
        <div class="icon">
            <i class="{{$icon->svg}}"></i>

        </div>

    </div>
    <form action="/icon/update/{{$icon->id}}" method="POST">
        @csrf

            <div class="form-group">
                <label for="svg">iconName</label>
                <input type="text" id='svg' name='svg' class='form-control' value='{{$icon->svg}}'>
            </div>
            <div class="form-group">
                <label for="svgSlug">roleSlug</label>
                <input type="text" id='svgSlug' name='svgSlug' class='form-control' value='{{$icon->svgSlug}}'>
            </div>
            <button class="btn btn-success">Submit</button>
        </form>


</div>
    



@stop