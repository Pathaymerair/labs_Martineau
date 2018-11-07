@extends('layouts.app')



@if (isset($details))

<p> Les résultats pour votre recherche <b> {{$query}} </b> : </p>
<ul>
@foreach ($details as $post)
<li><a href="/post/{{$post->id}}">{{$post->titre}}</a></li>
   
@endforeach
</ul>
{{-- 
{{$details->links()}} --}}

@endif