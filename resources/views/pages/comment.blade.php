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
        <table class="table table-dark" id='table'>
            <thead>
              <tr>
              
     
                <th scope="col" onclick="sortTable(0)">Post Title <i class="fas fa-sort"></i></th>
                <th scope="col" onclick="sortTable(1)">Auteur <i class="fas fa-sort"></i></th>
                <th scope="col" onclick="sortTable(2)">State <i class="fas fa-sort"></i></th>
                <th scope="col">Répondre</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>

              </tr>
            </thead>
            <tbody>
    
                @foreach ($comments as $comment)
                @if ($comment->state_id < 3)
                <tr>
       

             
                  <td><a href="/post/{{$comment->post->id}}">{{$comment->post->titre}}</a></td>
                  <td>{{$comment->name}}</td>
                  <td>{{$comment->state->etat}}</td>
                  <td> <a href="/comment/answer/{{$comment->id}}"> Répondre </a></td>
                  <td>
                      @can('comments', $comment->id)  
                      <form action="/comment/{{$comment->id}}/edit" method="GET">
                          @csrf
                          <button class="btn btn-warning">Edit</button>
                      </form>
                      @endcan
                  </td>
                  <td>
                        @if (Auth::user()->id == $comment->user_id || Auth::user()->role_id == 1)
                    <form action="/comment/delete/{{$comment->id}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger">Delete</button>
                  </form>
                  @endif
                </td>

                </tr>
                @endif
                @endforeach
    
            </tbody>
          </table>
          {{$comments->links()}} 
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