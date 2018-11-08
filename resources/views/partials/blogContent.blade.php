@section('blogContent')

<!-- page section -->
<div class="page-section spad">
    <div class="container">
        <div class="row">
@if (\Session::has('ded'))
<div class="alert alert-danger text-white">
<p>{{ \Session::get('ded') }} <i class="close icon" data-dismiss='alert'></i></p>

</div><br />
@endif
            <div class="col-md-8 col-sm-7 blog-posts">
                <!-- Post item -->
                
                @foreach ($posts as $post)
                    @if ($post->state_id == 2)
                <div class="post-item">
                    <div class="post-thumbnail">
                        <img src="/img/blog/{{$post->image}}" alt="">
                        <div class="post-date">
                            <h2>{{$post->created_at->format('d')}}</h2>
                            <h3>{{$post->created_at->format('M Y')}}</h3>
                        </div>
                    </div>
                    <div class="post-content">
                        <h2 class="post-title">{{$post->titre}}</h2>
                        <div class="post-meta">
                            <a href="">@foreach($post->categorie as $cate)
                                <span>{{$cate->nameCatego}} |</span>
                                @endforeach</a>
                            <a href="">@foreach($post->tag as $tag)
                                <span>{{$tag->nameTag}}</span>
                            @endforeach</a>
                            <a href="">
                        
                                    {{$post->comment->where('state_id', 2)->count()}} comment(s)                              
                            
                         </a>
                        </div>
                        <p>{{ substr($post->body, 0, 100) }}</p>
                        <a href="/post/{{$post->id}}" class="read-more">Read More</a>
                    </div>
                </div>
                @endif
                @endforeach
                <!-- Post item -->
                
                
                <!-- Pagination -->
                {{$posts->links()}}
             
            </div>
            <!-- Sidebar area -->
            <div class="col-md-4 col-sm-5 sidebar">
                <!-- Single widget -->
                <div class="widget-item">
                    <form action="/search" class="search-form" method="POST" role='search'>
                        @csrf
                        <input type="text" name='search' placeholder="{{$titles[0]->searchPlaceholder}}">
                        <button class="search-btn"><i class="flaticon-026-search"></i></button>
                    </form>
                </div>
                <!-- Single widget -->
                <div class="widget-item">
                    <h2 class="widget-title">{{$titles[0]->categoriesTitle}}</h2>
                    <ul>
                        @foreach ($categories as $cate)
                            @if ($cate->state_id == 2)
                        <li><form action="/categorie/search" method="GET">
                            @csrf
                            <input type="hidden" value='{{$cate->nameCatego}}' name='searchCategorie'>
                                    <a onclick="event.target.parentElement.submit();" style="cursor: pointer;">
                                            {{$cate->nameCatego}}
                            </a>
                            </form>
                            
                            
                            {{-- <a href="#">{{$cate->nameCatego}}</a> --}}
                        
                        
                        </li>
                            @endif
                        @endforeach

                    </ul>
                </div>
                <!-- Single widget -->
                <div class="widget-item">
                    <h2 class="widget-title">{{$titles[0]->instaTitle}}</h2>
                    <ul class="instagram">
                        @foreach($instas as $insta)
                        <li><img src="img/instagram/nm/{{$insta->instaImg}}" alt=""></li>

                        @endforeach
                    </ul>
                </div>
                <!-- Single widget -->
                <div class="widget-item">
                    <h2 class="widget-title">{{$titles[0]->tagsTitle}}</h2>
                    <ul class="tag">
                        @foreach ($tags as $tag)
                            @if ($tag->state_id == 2)
                            <li>
                                <form action="/tag/search" method="GET">
                                    @csrf
                                    <input type="hidden" value='{{$tag->nameTag}}' name='searchTag'>
                                            <a onclick="event.target.parentElement.submit();" style="cursor: pointer;">
                                        {{$tag->nameTag}}
                                    </a>
                                    </form>
                            </li>
                        @endif
                        @endforeach

                    </ul>
                </div>
                <!-- Single widget -->
                <div class="widget-item">
                    <h2 class="widget-title">{{$titles[0]->quoteTitle}}</h2>
                    <div class="quote">
                        <span class="quotation">‘​‌‘​‌</span>
                        <p>{{$titles[0]->quoteDesc}}</p>
                    </div>
                </div>
                <!-- Single widget -->
                <div class="widget-item">
                    <h2 class="widget-title">{{$titles[0]->addTitle}}</h2>
                    <div class="add">
                        <a href=""><img src="img/add/nm/{{$titles[0]->addImage}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page section end-->

@endsection