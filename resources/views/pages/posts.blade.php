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
                <th scope="col">Date</th>
                <th scope="col">Titre</th>
                <th scope="col">Auteur</th>
                <th scope="col">State</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>

              </tr>
            </thead>
            <tbody>
    
                @foreach ($posts as $post)
                    @if ($post->state_id == 1 || $post->state_id == 2)
                <tr>
                  <th scope="row">{{$post->id}}</th>

                  <td>{{$post->created_at->format('d m y')}} </td>
                  <td><a href="/post/{{$post->id}}">{{$post->titre}}</a></td>
                  <td>{{$post->user->name}}</td>
                  <td>{{$post->state->etat}}</td>

                  <td>
                    @can('post', $post->id)
                      <form action="/post/edit/{{$post->id}}" method="GET">
                    @csrf
                    <button class="btn btn-warning">Edit</button>
                    </form>
                    @endcan
                  </td>
                  <td>
                    @can('post', $post->id)
                    <form action="/post/delete/{{$post->id}}" method="POST">
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
          {{$posts->links()}} 
    </div>

<!-- page section -->
<div class="page-section spad mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-7 blog-posts">
                    <!-- Post item -->
                    <h2>Create Post</h2>
<form action="/posts/create" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="post-item">
            <div class="post-thumbnail">
                    <div class="form-group">
                            <label for="image">Image Article</label>
                            <input type="file" id="image" name='image'>
                    </div>

               
            </div>
            <div class="post-content">
              
                <div class="form-group">
                        <label for="titre">Titre Article</label>
                        <input type="text" id="titre" name='titre' value='{{ old('titre')}}'>
                </div>

                <div class="form-group">
                        <div >
                                <textarea name="body" id="body" cols="30" rows="10">
                                        {{ old('body')}}
                                </textarea>
                            <script>
                                CKEDITOR.replace( 'body' );
                            </script> 
                            </div>

                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <h5>Catégories</h5>
                        @foreach ($categories as $categorie)
                        @if ($categorie->state_id == 2)
                            <label class="checkbox-inline">
                              <input type="checkbox" name='categorie_id[]' id='categorie_id' value='{{$categorie->id}}'>
                              {{$categorie->nameCatego}}
                            </label>
                            @endif
                              @endforeach
                        </div>
                        <div class="checkbox">
                            <h5>Tags</h5>
                                @foreach ($tags as $tag)
                                @if ($tag->state_id == 2)
                                    <label class="checkbox-inline">
                                      <input type="checkbox" name='tag_id[]' id='tag_id' value='{{$tag->id}}'>
                                      # {{$tag->nameTag}}
                                    </label>
                                    @endif
                                @endforeach
                        </div>

                  </div>
            </div>
        </div>

        <button class="btn btn-success">Submit</button>
</form>
                </div>
            </div>
        </div>
</div>

@stop