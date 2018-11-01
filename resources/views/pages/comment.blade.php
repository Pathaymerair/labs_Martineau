@extends('adminlte::page')

@section('content')

<div class="container">


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


<div class="container">
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
     
                <th scope="col">Post</th>
                <th scope="col">Auteur</th>
                <th scope="col">State</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>

              </tr>
            </thead>
            <tbody>
    
                @foreach ($comments as $comment)
                <tr>
                  <th scope="row">{{$comment->id}}</th>

             
                  <td><a href="/post/{{$comment->post->id}}">{{$comment->post->titre}}</a></td>
                  <td>{{$comment->user->name}}</td>
                  <td>{{$comment->state->etat}}</td>

                  <td>
                      <form action="/comment/{{$comment->id}}/edit" method="GET">
                          @csrf
                          <button class="btn btn-warning">Edit</button>
                      </form>
                  </td>
                  <td>
                    <form action="/comment/delete/{{$comment->id}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger">Delete</button>
                  </form>
                </td>

                </tr>
           
                @endforeach
    
            </tbody>
          </table>
    </div>


@stop