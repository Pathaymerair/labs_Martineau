@extends('adminlte::page')

@section('content')

<div class="container">


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


<div class="container">
  
        <form class="form-class" action='/comment/{{$comment->id}}' method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Nom</label>
                                <input type="text" name="name" placeholder="Your name" class='form-control' value='{{$comment->name}}'>
                        </div>
                        
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                                <input type="email" name="email" placeholder="Your email" class='form-control' value='{{$comment->email}}'>
                        </div>
                        
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="subject">Sujet</label>
                                <input type="text" name="subject" placeholder="Subject" class='form-control' value='{{$comment->subject}}'>
                        </div>
                        
                        <textarea name="msg" placeholder="Message" rows="20" cols="70">{{$comment->msg}}</textarea>
                    </div>
                    <div class="form-group">
                            <label for="state_id">Etat</label>
                            <select name="state_id" id="state_id">
                                @foreach ($states as $state)
                                    <option value="{{$state->id}}" {{$comment->state_id == $state->id ? 'selected' : ''}}>{{$state->etat}}</option>
                                @endforeach
                            </select>
                        </div>
                    <button class="btn btn-success">submit</button>
                </div>
            </form>
       
</div>


@stop