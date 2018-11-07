@extends('adminlte::page')


@section('content')

<div class="container">
    
    
    

    <h1>Create Tag</h1>
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
    <form action="/tag/create" method="POST">
        @csrf
            <div class="form-group">
                <label for="nameTag">Tag Name</label>
                <input type="text" id='nameTag' name='nameTag' class='form-control' value='{{ old('nameTag')}}'>
            </div>
            <button class="btn btn-success">Submit</button>
        </form>

    <h1>Tags</h1>
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

            @foreach ($tags as $tag)
                
            <tr>
              <th scope="row">{{$tag->id}}</th>

              <td>{{$tag->nameTag}}</td>
              <td>{{$tag->user->name}}</td>
                <td>{{$tag->state->etat}}</td>
              <td>
                  @can('tags', $tag->id)
                  <form action="/tag/edit/{{$tag->id}}" method="GET">
                @csrf
                <button class="btn btn-warning">Edit</button>
                </form>
                @endcan
              </td>
              <td>
                    @can('tags', $tag->id)
                  <form action="/tag/delete/{{$tag->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                
                </form>
                @endcan
              </td>
            </tr>

            @endforeach

        </tbody>
      </table>
</div>


@stop