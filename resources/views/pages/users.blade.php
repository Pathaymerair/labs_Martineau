@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Image de profil</th>
                <th scope="col">Name</th>
                <th scope="col">Role</th>
                <th scope="col">Profil</th>
                
                <th scope="col">Edit</th>
               
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
    
                @foreach ($users as $user)
                    @if ($user->state_id !== 3)
                <tr>
                  <th scope="row">{{$user->id}}</th>
                  <td>
                      @if ($user->image_id)
                      <img src="img/team/thumb/{{$user->imageUser->imageUserThumbnail}}" alt="">
                      @endif
                </td>
     
                  <td>{{$user->name}}</td>
                  <td>{{$user->role->roleName}}</td>
                  <td>
                      @can('profil', $user->id)
                        <form action="profil/{{$user->id}}" method='GET'>
                            @csrf
                                <button class="btn btn-success">
                                    Profil
                                </button>
                        </form>
                      
                        @endcan
                  </td>
                  
                  <td>
                        @can('profil', $user->id)
                      <form action="/user/edit/{{$user->id}}" method="GET">
                    @csrf
                    <button class="btn btn-warning">Edit</button>
                    </form>
                    @endcan
                  </td>
                  
                  <td>
                        @can('profil', $user->id)
                      <form action="/user/delete/{{$user->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    
                    </form>
                    @endcan
                  </td>
                </tr>
                @endif
                @endforeach
    
            </tbody>
          </table>
    </div>


    <h1 class='mt-5'>Create new User</h1>


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


    <form action="/user/create" method="POST">
        @csrf
            <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" id='name' name='name' class='form-control' placeholder="name">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" id='email' name='email' class='form-control' placeholder="email">
            </div>
            <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id='password' name='password' class='form-control' placeholder='password'>
            </div>
            <div class="form-group">
                    <label for="exampleFormControlSelect1">Example select</label>
                    <select class="form-control" id="exampleFormControlSelect1" name='role_id'>
                        @foreach ($roles as $role)
                        <option value='{{$role->id}}'>{{$role->roleName}}</option>
                        @endforeach
                    </select>
                  </div>
            <button class="btn btn-success">Submit</button>
        </form>
@stop


