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
    <h1>Create service</h1>
    <form action="/service/create" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="serviceTitre"> Titre
                <input type="text" name="serviceTitre" id="serviceTitre" class='form-control' value='{{ old('serviceTitre')}}'>
            </label>
        </div>
        <div class="form-group">
                <label for="serviceDesc"> Content
                            <div >
                                    <textarea name="serviceDesc" id="serviceDesc" cols="100" rows="10" class='form-control'>
                                            {{ old('serviceDesc')}}
                                    </textarea>
                                <script>
                                    CKEDITOR.replace( 'serviceDesc' );
                                </script> 
                                </div>
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
                                    <input type="radio" name="icon_id" id="icon_id" value="{{$icon->id}}" checked="">
                                </label>
                            </div>
                        @endforeach
                    </div>
        </div>
        <button class="btn btn-success">Submit</button>
    </form>
</div>

@stop