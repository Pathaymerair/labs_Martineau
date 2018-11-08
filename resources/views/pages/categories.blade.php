@extends('adminlte::page')


@section('content')

<div class="container">
    
    
    

    <h1>Create Categorie</h1>
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
    <form action="/categorie/create" method="POST">
        @csrf
            <div class="form-group">
                <label for="nameCatego">Categorie Name</label>
                <input type="text" id='nameCatego' name='nameCatego' class='form-control' value='{{ old('nameCatego')}}'>
            </div>
            <button class="btn btn-success">Submit</button>
        </form>

    <h1>Categories</h1>
    @if (\Session::has('updated'))
    <div class="alert alert-success">
        <p>{{ \Session::get('updated') }} <i class="close icon" data-dismiss='alert'></i></p>
        
    </div><br />
    @endif
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Auteur</th>
            <th scope="col">Etat</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($categories as $categorie)
                
            <tr>
              <th scope="row">{{$categorie->id}}</th>

              <td>{{$categorie->nameCatego}}</td>
              <td>{{$categorie->user->name}}</td>
                <td>{{$categorie->state->etat}}</td>
              <td>
                  @can('categories', $categorie->id)
                  <form action="/categorie/edit/{{$categorie->id}}" method="GET">
                @csrf
                <button class="btn btn-warning">Edit</button>
                </form>
                @endcan
              </td>
              <td>
                    @can('categories', $categorie->id)
                  <form action="/categorie/delete/{{$categorie->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                    @endcan
                </form>
              </td>
            </tr>

            @endforeach

        </tbody>
      </table>
      {{$categories->links()}}
</div>


@stop