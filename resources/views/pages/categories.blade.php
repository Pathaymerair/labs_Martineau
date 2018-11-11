@extends('adminlte::page')


@section('content')

<div class="container">
    
    
    

    <h1>Create Categorie</h1>
    @if (\Session::has('success'))
    <div class="alert bg-success">
        <p class="text-white"><b>{{ \Session::get('success') }} </b><i class="close icon" data-dismiss='alert'></i></p>
        
    </div><br />
    @endif
    @if (\Session::has('ded'))
    <div class="alert bg-danger">
        <p class="text-white"><b>{{ \Session::get('ded') }}</b> <i class="close icon" data-dismiss='alert'></i></p>
        
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
        <p class="text-white">{{ \Session::get('updated') }} <i class="close icon" data-dismiss='alert'></i></p>
        
    </div><br />
    @endif
    <table class="table table-dark" id='table'>
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

            @foreach ($categories as $categorie)
                @if($categorie->state_id < 3)
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
            @endif
            @endforeach

        </tbody>
      </table>
      {{$categories->links()}}
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