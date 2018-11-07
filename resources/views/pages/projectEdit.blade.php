@extends('adminlte::page')


@section('content')

    @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }} <i class="close icon" data-dismiss='alert'></i></p>
        
    </div><br />
    @endif
    @if (\Session::has('ded'))
    <div class="alert alert-danger">
        <p>{{ \Session::get('ded') }} <i class="close icon" data-dismiss='alert'></i></p>
        
    </div><br />
    @endif

<div class="container">
    <h1>Update project</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
@endif
    <form action="/project/update/{{$project->id}}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="projectTitre"> Titre
                <input type="text" name="projectTitre" id="projectTitre" class='form-control' value='{{$project->projectTitre}}'>
            </label>
        </div>
        <div class="form-group">
                <label for="projectDesc"> Content
                            <div >
                                    <textarea name="projectDesc" id="projectDesc" cols="100" rows="10" class='form-control'>
                                            {{$project->projectDesc}}
                                    </textarea>
                                <script>
                                    CKEDITOR.replace( 'projectDesc' );
                                </script> 
                                </div>
                </label>
        </div>
        <div class="form-group">
                <label for="projectImg"> Image
                    <input type="file" name="projectImg" id="projectImg" class='form-control' value='{{ $project->projectImg}}'>
                </label>
        </div>

        <div class="container">
                <div class="row">
                        @foreach ($icons as $icon)
                            <div class="col-xs-4">
                                <div class="icon-box">
                                    <div class="icon">
                                        <i class="{{$icon->svg}}"></i> 
                                    </div>
                                </div>
                                <label>
                                    <input type="radio" name="icon_id" id="icon_id" value="{{$icon->id}}" {{$icon->id == $project->icon->id ? 'checked' : ''}}   >
                                </label>
                            </div>
                        @endforeach
                    </div>
        </div>
        <div class="form-group">
                <label for="state_id">Etat
                <select name="state_id" id="state_id">
                    @foreach ($states as $state)
                        <option value="{{$state->id}}">{{$state->etat}}</option>
                    @endforeach
                </select>
            </label>
            </div>
        <button class="btn btn-success">Submit</button>
    </form>
</div>

@stop