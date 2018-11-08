@section('search')

@if (isset($details))

<p> Les résultats pour votre recherche <b> {{$query}} </b> : </p>
<ul>
@foreach ($details as $post)
@if ($post->state_id == 2)
<li><a href="/post/{{$post->id}}">{{$post->titre}}</a></li>
   @endif
@endforeach
</ul>

{{-- 
{{$details->links()}} --}}

@endsection