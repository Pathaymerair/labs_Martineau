@extends('adminlte::page')
@section('title', 'Dashboard')



@section('content')


<div id="preloder">
		<div class="loader">
			<img src="img/logo.png" alt="">
			<h2>Loading.....</h2>
		</div>
	</div>

   @if (Auth::user()->role_id == 1)
   <div class="text-center mt-5">
       <h1>Bonjour {{Auth::user()->name}} !</h1>
       <p class='mt-5'>Il y a actuellement <a href="/comments">{{$comments->count()}}</a> commentaire non validé(s) !</p>
       <p>Il y a actuellement <a href="/posts">{{$posts->count()}}</a> article(s) non validé(s) !</p>
       <p>Il y a actuellement <a href="/categories">{{$categories->count()}}</a> categorie(s) non validée(s) !</p>
       <p>Il y a actuellement <a href="/tags">{{$tags->count()}}</a> tag(s) non validé(s) !</p>
       
   </div>
   @elseif (Auth::user()->role_id == 2)
   <h1>Bonjour {{Auth::user()->name}} !</h1>
 
    @else
    vous n'avez rien à faire ici ! è_é
   @endif
   
  
@stop