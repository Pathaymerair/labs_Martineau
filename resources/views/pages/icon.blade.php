@extends('adminlte::page')


@section('content')

<div class="container">
    <h1>Create icon</h1>
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
    <form action="/icon/create" method="POST">
        @csrf
            <div class="form-group">
                <label for="svg">iconName</label>
                <input type="text" id='svg' name='svg' class='form-control' value='{{old('svg')}}'>
            </div>
            <div class="form-group">
                <label for="svgSlug">roleSlug</label>
                <input type="text" id='svgSlug' name='svgSlug' class='form-control' value='{{old('svgSlug')}}'>
            </div>
            <button class="btn btn-success">Submit</button>
        </form>

    <h1>Icons Collection</h1>
  
    @foreach ($icons->chunk(3) as $chunk)
			<div class="row">
             
					@foreach ($chunk as $icon)
                    <div class="col-xs-4">
                            <div class="icon-box">
                                <div class="icon">
                                    <i class="{{$icon->svg}}"></i> 
                                </div>
                            </div>

                            <form action="/icon/edit/{{$icon->id}}" method="GET">
                                @csrf
                                <button class="btn btn-warning">Edit</button>
                            </form>
                            <form action="/icon/delete/{{$icon->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
					@endforeach
			
        </div>
        @endforeach
</div>



@stop