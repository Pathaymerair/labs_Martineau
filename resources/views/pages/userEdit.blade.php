@extends('adminlte::page')

@section('content_header')
    <h1>Modification de {{$user->name}}</h1>
@stop

@section('content')

<div class="container">
    <h1>Edit user</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
@endif
    <form action="/user/update/{{$user->id}}" method="POST">
        @csrf
            <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" id='name' name='name' class='form-control' value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="email">User email</label>
                <input type="email" id='email' name='email' class='form-control' value='{{$user->email}}'>
            </div>
            @can('superadmin')
            @if ($superadmin->count() > 1)
            <div class="form-group">
                    <label for="exampleFormControlSelect1">Example select</label>
                    <select class="form-control" id="exampleFormControlSelect1" name='role_id'>
                        @foreach ($roles as $role)
                        <option value='{{$role->id}}'{{$user->role_id == $role->id ? 'selected' : ''}}>{{$role->roleName}}</option>
                        @endforeach
                    </select>
                </div>
                @endif
                @endcan
            <button class="btn btn-success">Submit</button>
        </form>
</div>

@stop