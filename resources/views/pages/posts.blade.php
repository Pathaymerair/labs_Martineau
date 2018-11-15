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


<div class="container">

          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Posts</h3>
    
                  <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
    
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover" id='table'>
                    <tbody><tr>
                      
                        <th scope="col" onclick="sortTable(0)">Date <i class="fas fa-sort"></i></th>
                        <th scope="col" onclick="sortTable(1)">Titre <i class="fas fa-sort"></i></th>
                        <th scope="col" onclick="sortTable(2)">Auteur <i class="fas fa-sort"></i></th>
                        <th scope="col" onclick="sortTable(3)">State <i class="fas fa-sort"></i></th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    @foreach ($posts as $post)
                    @if ($post->state_id == 1 || $post->state_id == 2)
                <tr>
                    <td>{{$post->created_at->format('d m y')}} </td>
                 

                  <td><a href="/post/{{$post->id}}">{{$post->titre}}</a></td>
                  <td>{{$post->user->name}}</td>
                  @if ($post->state_id == 2)
                  <td><span class="label label-success">{{$post->state->etat}}</span></td>
                    @elseif($post->state_id == 1)
                    <td><span class="label label-warning">{{$post->state->etat}}</span></td>
                    @endif

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
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
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
<div class="widget-item">
        <form action="/tag/create" method="POST">
            @csrf
            <input type="text" name='nameTag' placeholder="Enter new Tag">
            <button class="search-btn"><i class="fas fa-plus"></i></button>
        </form>
        <form action="/categorie/create" method="POST">
            @csrf
            <input type="text" name='nameCatego' placeholder="Enter new categorie">
            <button class="search-btn"><i class="fas fa-plus"></i></button>
        </form>
    </div>

                </div>
            </div>
        </div>
</div>


<script>

    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("table");
        switching = true;
        dir = "asc"; 
        while (switching) {
          switching = false;
          rows = table.rows;
          for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            if (dir == "asc") {
              if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                shouldSwitch = true;
                break;
              }
            } else if (dir == "desc") {
              if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                shouldSwitch = true;
                break;
              }
            }
          }
          if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount ++; 
          } else {
            if (switchcount == 0 && dir == "asc") {
              dir = "desc";
              switching = true;
            }
          }
        }
      }
    </script>  

@stop