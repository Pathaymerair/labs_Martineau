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
    <h1 class="mt-5">Update Testimonial</h1>
    <form action="/testimonial/update/{{$testimonial->id}}" method="POST">
    @csrf
    <div class="form-group">
        <div >
            <label for="testiDesc">
            <textarea name="testiDesc" id="testiDesc" cols="30" rows="10">
                            {{ $testimonial->testiDesc}}
            </textarea>
            <script>
                    CKEDITOR.replace( 'testiDesc' );
            </script> 
            </label>
        </div>
    </div>
    <div class="form-group">
            <label>Client
            <select multiple="client_id" class="form-control">
                    @foreach ($clients as $client)
                    <option value='{{$client->id}}' name='client_id'><span>{{$client->clientName}} </span><span>{{$client->clientCompany}}</span></option>
                    @endforeach
            </select>
            </label>        
    </div>
    <button class="btn btn-success">Submit</button>
    </form>
</div>

@stop