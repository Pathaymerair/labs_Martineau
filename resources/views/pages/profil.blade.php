@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')



<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
@endif
        <form role="form" action='/profil/update/{{$user->id}}' method="POST" enctype="multipart/form-data">
            @csrf
          <div class="box-body">


            @if ($user->profil->profilLastName)
            <div class="form-group">
                <label for="profilLastName">Nom</label>
                <input type="text" class="form-control" id="profilLastName" placeholder="Entrer name" name='profilLastName'  value="{{$user->profil->profilLastName}}">
            </div>
            @else
            <div class="form-group">
                <label for="profilLastName">Nom</label>
                <input type="text" class="form-control" id="profilLastName" placeholder="Entrer name" name='profilLastName'  value="{{{ old('profilLastName') }}}">
            </div>
            @endif

            @if ($user->profil->profilFirstname)
            <div class="form-group">
              <label for="profilFirstname">prenom</label>
              <input type="text" class="form-control" id="profilFirstname" placeholder="Entrer prenom" name='profilFirstname'  value="{{$user->profil->profilFirstname}}">
            </div>
            @else
            <div class="form-group">
                <label for="profilFirstname">prenom</label>
                <input type="text" class="form-control" id="profilFirstname" placeholder="Entrer prenom" name='profilFirstname'  value="{{ old('profilFirstname') }}">
              </div>
            @endif

              @if ($user->profil->profilJob)
            <div class="form-group">
              <label for="profilJob">Position dans l'entreprise</label>
              <input type="text" class="form-control" id="profilJob" placeholder="profilJob" name='profilJob' value='{{$user->profil->profilJob}}'>
            </div>
            @else
            <div class="form-group">
                <label for="profilJob">Position dans l'entreprise</label>
                <input type="text" class="form-control" id="profilJob" placeholder="profilJob" name='profilJob'>
              </div>
            @endif

            @if ($user->profil->profilDesc)
            <div class="form-group">
                    <label for='profilDesc'>Description</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name='profilDesc'>{{$user->profil->profilDesc}}</textarea>
                </div>
              @else
              <div class="form-group">
                  <label for='profilDesc'>Description</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..." name='profilDesc'>{{ old('profilDesc') }}</textarea>
            </div>
              @endif
        @if ($user->image_id)
                <div class="form-group">
                  <label for="exampleInputFile">Photo de profil</label>
                  <input type="file" id="exampleInputFile" name='image_id' value='{{$user->image_id}}'>
                </div>
              @else
              <div class="form-group">
                  <label for="exampleInputFile">Photo de profil</label>
                  <input type="file" id="exampleInputFile" name='image_id'>
                </div>
              @endif
          </div>
          <!-- /.box-body -->
        
          <div class="box-footer">
            <button type="submit" class="btn btn-primary" >Submit</button>
          </div>
        </form>
    

</div>

@stop