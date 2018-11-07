@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')



<div class="container">

        <h1 class='mt-5'>Update {{$client->clientName}}</h1>


        @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }} <i class="close icon" data-dismiss='alert'></i></p>
                    
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
    
    
        <form action="/client/update/{{$client->id}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="clientName">Client Name</label>
                    <input type="text" id='clientName' name='clientName' class='form-control' placeholder="clientName" value='{{$client->clientName}}'>
                </div>
                <div class="form-group">
                    <label for="clientCompany">client Company</label>
                    <input type="text" id='clientCompany' name='clientCompany' class='form-control' placeholder="Entreprise..." value='{{$client->clientCompany}}'>
                </div>
                <div class="form-group">
                        <label for="clientImg">Photo de profil Client</label>
                        <input type="file" id='clientImg' name='clientImg' class='form-control'>
                </div>
                <div class="form-group">
                        <label for="state_id">Validation</label>
                        <select name="state_id" id="state_id">
                            @foreach ($states as $state)
                                <option value="{{$state->id}}" {{$tag->state_id == $state->id ? 'selected' : ''}}>{{$state->etat}}</option>
                            @endforeach
                        </select>
                </div>

                <button class="btn btn-success">Submit</button>
            </form>
    </div>



@stop


