@extends('adminlte::page')


@section('content')

<div class="container">
    <h1>Create Role</h1>
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
    <form action="/roles/create" method="POST">
        @csrf
            <div class="form-group">
                <label for="roleName">roleName</label>
                <input type="text" id='roleName' name='roleName' class='form-control'>
            </div>
            <div class="form-group">
                <label for="roleSlug">roleSlug</label>
                <input type="text" id='roleSlug' name='roleSlug' class='form-control'>
            </div>
            <button class="btn btn-success">Submit</button>
        </form>

    <h1>Roles</h1>
    <ul>
        @foreach ($roles as $role)
            <li>{{$role->roleName}} 
                <form action="roles/{{$role->id}}/delete" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
                </form>
                <form action="roles/{{$role->id}}/edit" method="GET">
                    @csrf
                    <button class="btn btn-warning">Edit</button>
                </form>

            </li>
        @endforeach
    </ul>
</div>


@stop