@extends('adminlte::page')

@section('content')

<div class="container">


    @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }} <i class="close icon" data-dismiss='alert'></i></p>
        
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
        <div class="row">
                <div class="col-md-9 comment-from">
                    
<div class="container">
    <div class="bg-info">
        <p>{{$comment->name}} wrote:</p>
    <p class='text-center '>{{$comment->msg}}</p>
    </div>
</div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                    </div>
                    @endif
                    
                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }} <i class="close icon" data-dismiss='alert'></i></p>
                        
                    </div><br />
                    @endif
                    <h2 class='mt-5'>Answer to {{$comment->name}}'s comment !</h2>
                <form class="form-class" action="/comment/answer/create/{{$comment->id}}" method="POST">
                        @csrf
                        @if (Auth::user())
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" name="name" placeholder="Your name" value='{{auth::user()->name}}'>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="email" placeholder="Your email" value='{{auth::user()->email}}'>
                            </div>
                        @else
                        <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="name" placeholder="Your name">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="email" placeholder="Your email">
                                </div>
                        @endif
                            <div class="col-sm-12">
                                <input type="text" name="subject" placeholder="Subject">
                                <textarea name="msg" placeholder="Message"></textarea>
                                <button class="site-btn">send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</div>


@stop