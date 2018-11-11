@extends('adminlte::page')


@section('content')

<div class="container">
    
    
    

    <h1>Update Tag</h1>
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
    <form action="/tag/update/{{$tag->id}}" method="POST">
        @csrf
            <div class="form-group">
                <label for="nameTag">Tag Name</label>
                <input type="text" id='nameTag' name='nameTag' class='form-control' value='{{$tag->nameTag}}'>
            </div>
            <div class="form-group">
                <label for="state_id">Etat
                <select name="state_id" id="state_id">
                    @foreach ($states as $state)
                        <option value="{{$state->id}}" {{$tag->state_id == $state->id ? 'selected' : ''}}>{{$state->etat}}</option>
                    @endforeach
                </select>
            </label>
            </div>
            <button class="btn btn-success">Submit</button>
        </form>


</div>


@stop