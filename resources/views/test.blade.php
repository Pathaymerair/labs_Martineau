@extends('layouts.app')



@if (isset($details))

<p> Les résultats pour votre recherche <b> {{$query}} </b> : </p>

@foreach ($details as $post)
<a href="/post/{{$post->id}}">{{$post->titre}}</a>
   
@endforeach

{{$details->links()}}

@endif