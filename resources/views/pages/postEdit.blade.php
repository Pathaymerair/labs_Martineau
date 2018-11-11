@extends('adminlte::page')

@section('content')

<div class="container">


    @if (\Session::has('success'))
    <div class="alert bg-success">
        <p class="text-white"><b>{{ \Session::get('success') }}</b> <i class="close icon" data-dismiss='alert'></i></p>
        
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



<!-- page section -->
<div class="page-section spad mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-7 blog-posts">
                    <!-- Post item -->
<form action="/posts/update/{{$post->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="post-item">
            <div class="post-thumbnail">
                <img src="/img/blog/{{$post->image}}" alt="">
                    <div class="form-group">
                            <label for="image">Image Article</label>
                            <input type="file" id="image" name='image'>
                    </div>
                    <div class="post-date">
                        <h2>{{$post->created_at->format('d M Y')}}</h2>
                        <div class="form-group">
                            <label for="created_at">Date</label>
                            <input type="date" id="created_at" name='created_at' value='{{ old('created_at', date('Y-m-d'))}}'>
                    </div>
                    </div>
            </div>
            <div class="post-content">
           
                <div class="form-group">
                        <label for="titre">Titre Article</label>
                        <input type="text" id="titre" name='titre' value='{{$post->titre}}'>
                </div>

                
            
                <div class="form-group">
                    <div >
                            <textarea name="body" id="body" cols="30" rows="10">
                                {{$post->body}}
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
<input type="checkbox" name='categorie_id[]' id='categorie_id' value='{{$categorie->id}}' @foreach($post->categorie as $cate)
{{$categorie->id == $cate->id ? 'checked' : ''}} @endforeach   >
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
                                      <input type="checkbox" name='tag_id[]' id='tag_id' value='{{$tag->id}}' @foreach($post->tag as $cate)
                                      {{$tag->id == $cate->id ? 'checked' : ''}} @endforeach   >
                                      # {{$tag->nameTag}}
                                    </label>
                                    @endif
                                @endforeach
                        </div>

                  </div>
            <div class="form-group mt-5">
                    <label for="state_id">Etat</label>
                    <select name="state_id" id="state_id">
                        @foreach ($states as $state)
                            <option value="{{$state->id}}" {{$post->state_id == $state->id ? 'selected' : ''}}>{{$state->etat}}</option>
                        @endforeach
                    </select>
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