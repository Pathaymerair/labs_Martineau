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
       
          <div class="box-body">

                <a href="/profil/edit/{{$user->id}}" class='text-black'>Edit profil</a>

    
                    <div class="row">
                        @if ($user->imageUser->imageUserThumbnail)
                <img src="/img/team/thumb/{{$user->imageUser->imageUserThumbnail}}" alt="">
                @endif
                            <h3>{{$user->profil->profilLastName}} {{$user->profil->profilFirstName}}</h3>
                    </div>
                    <hr>
                    <h4><b>{{$user->profil->profilFirstname}}'s' job is {{$user->profil->profilJob}}</b></h4>

                    <div class="text-center bg-light">{{$user->profil->profilDesc}}</div>
                    
          <!-- /.box-body -->
        </div>
        <div class="box-body" style='width: 50%'>
            <div class=" bg-info">
                <div class="text-center">
                    <h4 class="mt-5">Last activity!</h4>
                    <ul>
                    @foreach($comments as $comment)
                    <li> Left a comment on <a href="/post/{{$comment->post->id}}">{{$comment->post->titre}}</a> ! ({{$comment->created_at}})</li>
                    @foreach($posts as $post)
                    <li> Created <a href="/post/{{$post->id}}">{{$post->titre}}</a> ! ({{$post->created_at}})</li>
                    @endforeach
                    @endforeach
                </ul>
                </div>
            </div>
        </div>

@stop