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
                <img src="img/blog/{{$post->image}}" alt="">
                    <div class="form-group">
                            <label for="image">Image Article</label>
                            <input type="file" id="image" name='image'>
                    </div>
                <div class="post-date">
                    <div class="form-group">
                        <label for="date">Day</label>
                        <input type="number" min="1" max="31" id="date" name='date' value='{{$post->date}}'>
                </div>
                <div class="form-group">
                    <label for="month">Mois</label>
                    <input type="month" id="month" name='month' value='{{$post->month}}'>
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
                  
                          
                    {{-- <label for="body">Contenu Article</label>
                    <textarea name="body" id="body" cols="80" rows="10"></textarea> --}}

            </div>
            <div class="form-group">
                    <label for="state_id">Etat</label>
                    <select name="state_id" id="state_id">
                        @foreach ($states as $state)
                            <option value="{{$state->id}}">{{$state->etat}}</option>
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