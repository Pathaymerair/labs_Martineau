@extends('adminlte::page')


@section('content')

<div class="container">
    
    
    

    <h1>Update Categorie</h1>
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
    <form action="/categorie/update/{{$categorie->id}}" method="POST">
        @csrf
            <div class="form-group">
                <label for="nameCatego">Categorie Name</label>
                <input type="text" id='nameCatego' name='nameCatego' class='form-control' value='{{$categorie->nameCatego}}'>
            </div>
            <div class="form-group">
                <label for="state_id">Etat</label>
                <select name="state_id" id="state_id">
                    @foreach ($states as $state)
                        <option value="{{$state->id}}" {{$categorie->state_id == $state->id ? 'selected' : ''}}>{{$state->etat}}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success">Submit</button>
        </form>


</div>


@stop