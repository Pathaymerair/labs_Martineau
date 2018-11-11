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
    <h1 class="mt-5">Create Testimonial</h1>
    <form action="/testimonial/create" method="POST">
    @csrf
    <div class="form-group">
        <div >
            <label for="testiDesc">
            <textarea name="testiDesc" id="testiDesc" cols="30" rows="10">
                            {{ old('testiDesc')}}
            </textarea>
            <script>
                    CKEDITOR.replace( 'testiDesc' );
            </script> 
            </label>
        </div>
    </div>
    <div class="form-group">
            <label>Client
            <select multiple="client_id" class="form-control" name='client_id'>
                    @foreach ($clients as $client)
                    @if ($client->state_id == 2 || $client->state_id == 1)
                    <option value='{{$client->id}}' name='client_id' id='client_id'>{{$client->clientName}}{{$client->clientCompany}}</option>
                    @endif
                    @endforeach
            </select>
            </label>        
    </div>
<button class="btn btn-success">Create</button>
    </form>

    <h1 class="mt-5"> Testimonials</h1>
    <div class="row">
        @foreach ($testimonials as $testi)
        @if ($testi->state_id == 2 || $testi->state_id == 1)
            <div class="col-xs-4">
                {!!$testi->testiDesc!!}
                <form action="/testimonial/edit/{{$testi->id}}" method="GET">
                    @csrf
                    <button class="btn btn-warning">Edit</button>
                </form>
                <form action="/testimonial/delete/{{$testi->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
            @endif
        @endforeach
    </div>
</div>

@stop