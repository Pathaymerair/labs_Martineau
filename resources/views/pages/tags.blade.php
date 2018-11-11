@extends('adminlte::page')


@section('content')

<div class="container">
    
    
    

    <h1>Create Tag</h1>
    @if (\Session::has('success'))
    <div class="alert bg-success">
        <p class="text-white"><b>{{ \Session::get('success') }}</b> <i class="close icon" data-dismiss='alert'></i></p>
        
    </div><br />
    @endif
    @if (\Session::has('ded'))
    <div class="alert bg-danger">
        <p class="text-white"><b>{{ \Session::get('ded') }}</b> <i class="close icon" data-dismiss='alert'></i></p>
        
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
    <div class="alert bg-success">
        <p><b>{{ \Session::get('updated') }}</b> <i class="close icon" data-dismiss='alert'></i></p>
        
    </div><br />
    @endif
    <table class="table table-dark"id='table'>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col" onclick="sortTable(0)">Nom <i class="fas fa-sort"></i></th>
            <th scope="col" onclick="sortTable(1)">Auteur <i class="fas fa-sort"></i></th>
            <th scope="col" onclick="sortTable(2)">Etat <i class="fas fa-sort"></i></th>
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
      <div class="text-center">

          {{$tags->links()}}
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