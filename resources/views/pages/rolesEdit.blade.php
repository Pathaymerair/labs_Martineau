@extends('adminlte::page')


@section('content')

<div class="container">
    <h1>Create Role</h1>
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
    <form action="/roles/update/{{$role->id}}" method="POST">
        @csrf
            <div class="form-group">
                <label for="roleName">roleName</label>
                <input type="text" id='roleName' name='roleName' class='form-control' value='{{$role->roleName}}'>
            </div>
            <div class="form-group">
                <label for="roleSlug">roleSlug</label>
                <input type="text" id='roleSlug' name='roleSlug' class='form-control' value='{{$role->roleSlug}}'>
            </div>
            <button class="btn btn-success">Submit</button>
        </form>

</div>


@stop