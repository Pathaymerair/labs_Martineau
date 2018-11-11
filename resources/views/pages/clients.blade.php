@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')



<div class="container">

        <h1 class='mt-5'>Create new Client</h1>


        @if (\Session::has('success'))
                <div class="alert bg-success">
                    <p class="text-white"><b>{{ \Session::get('success') }} </b><i class="close icon" data-dismiss='alert'></i></p>
                    
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
    
    
        <form action="/client/create" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="clientName">Client Name</label>
                    <input type="text" id='clientName' name='clientName' class='form-control' placeholder="clientName" value='{{ old('clientName')}}'>
                </div>
                <div class="form-group">
                    <label for="clientCompany">client Company</label>
                    <input type="text" id='clientCompany' name='clientCompany' class='form-control' placeholder="Entreprise..." value='{{ old('clientCompany')}}'>
                </div>
                <div class="form-group">
                        <label for="clientImg">Photo de profil Client</label>
                        <input type="file" id='clientImg' name='clientImg' class='form-control' value='{{ old('clientImg')}}'>
                </div>

                <button class="btn btn-success">Submit</button>
            </form>

        <table class="table table-dark mt-5">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Image de profil</th>
                <th scope="col">Name</th>
                <th scope="col">Entreprise</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
    
                @foreach ($clients as $client)
                    @if($client->state_id == 2 || $client->state_id == 1)
                <tr>
                  <th scope="row">{{$client->id}}</th>
                  <td>
                      @if ($client->clientImg)
                      <img src="img/avatar/{{$client->clientImg}}" alt="">
                      @endif
                </td>
                  <td>{{$client->nameClient}}</td>
                  <td>{{$client->clientCompany}}</td>
                  <td>
                        <form action="/client/edit/{{$client->id}}" method='GET'>
                            @csrf
                                <button class="btn btn-warning">
                                    Edit
                                </button>
                        </form>
                  </td>

                  <td>
                      <form action="/client/delete/{{$client->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    
                    </form>
                  </td>
                </tr>
                @endif
    
                @endforeach
    
            </tbody>
          </table>
    </div>



@stop


