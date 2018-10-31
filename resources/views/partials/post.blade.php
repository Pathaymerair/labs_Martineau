@section('post')

<div class="page-section spad">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-7 blog-posts">
                <!-- Single Post -->
                <div class="single-post">
                    <div class="post-thumbnail">
                        <img src="img/blog/{{$post->image}}" alt="">
                        <div class="post-date">
                            <h2>{{$post->date}}</h2>
                            <h3>{{$post->month}}</h3>
                        </div>
                    </div>
                    <div class="post-content">
                        <h2 class="post-title">{{$post->titre}}</h2>
                        <div class="post-meta">
                            <a href="">Loredana Papp</a>
                            <a href="">Design, Inspiration</a>
                            <a href="">2 Comments</a>
                        </div>
                        {{$post->body}}
                    </div>
                    <!-- Post Author -->
                    <div class="author">
                        <div class="avatar">
                            <img src="img/avatar/03.jpg" alt="">
                        </div>
                        <div class="author-info">
                            <h2>Lore Williams, <span>Author</span></h2>
                            <p>Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique. </p>
                        </div>
                    </div>
                    <!-- Post Comments -->
                    <div class="comments">
                        <h2>Comments (2)</h2>
                        <ul class="comment-list">
                            @foreach ($comments as $comment)
                            @if ($comment->post_id == $post->id && $comment->state_id == 2)
                            {{-- && $comment->state_id == 2 --}}
                                <li>
                                    @if ($comment->user_id)
                                    <div class="avatar">
                                        <img src="/img/team/thumb/{{$comment->user->imageUser->imageUserThumbnail}}" alt="">
                                    </div>
                                    @else
                                        <div class="avatar">
                                            <img src="/img/team/thumb/{{$comment->random->random}}" alt="">
                                        </div>
                                    @endif
                                    <div class="commetn-text">
                                        <h3>{{$comment->name}} | {{$comment->created_at}} | Reply</h3>
                                        <p>{{$comment->msg}} </p>
                                        @if ($comment->user_id = $comment->user->id || $comment->user->role_id == 1)
                                        <p><form action="/comment/delete/{{$comment->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                        </form></p>
                                        @endif
                                    </div>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <!-- Commert Form -->
                    <div class="row">
                        <div class="col-md-9 comment-from">
                            <h2>Leave a comment</h2>
                            @if (Auth::User())
                            <form class="form-class" action='/comment/create/{{$post->id}}' method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="text" name="name" placeholder="Your name" value='{{Auth::User()->name}}'>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" name="email" placeholder="Your email" value='{{Auth::User()->email}}'>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text" name="subject" placeholder="Subject">
                                            <textarea name="msg" placeholder="Message"></textarea>
                                            <button class="site-btn">send</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                            <form class="form-class" action='/comment/create/{{$post->id}}' method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="text" name="name" placeholder="Your name">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" name="email" placeholder="Your email">
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text" name="subject" placeholder="Subject">
                                            <textarea name="msg" placeholder="Message"></textarea>
                                            <button class="site-btn">send</button>
                                        </div>
                                    </div>
                                </form>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar area -->
            <div class="col-md-4 col-sm-5 sidebar">
                <!-- Single widget -->
                <div class="widget-item">
                    <form action="#" class="search-form">
                        <input type="text" placeholder="Search">
                        <button class="search-btn"><i class="flaticon-026-search"></i></button>
                    </form>
                </div>
                <!-- Single widget -->
                <div class="widget-item">
                    <h2 class="widget-title">Categories</h2>
                    <ul>
                        <li><a href="#">Vestibulum maximus</a></li>
                        <li><a href="#">Nisi eu lobortis pharetra</a></li>
                        <li><a href="#">Orci quam accumsan </a></li>
                        <li><a href="#">Auguen pharetra massa</a></li>
                        <li><a href="#">Tellus ut nulla</a></li>
                        <li><a href="#">Etiam egestas viverra </a></li>
                    </ul>
                </div>
                <!-- Single widget -->
                <div class="widget-item">
                    <h2 class="widget-title">Instagram</h2>
                    <ul class="instagram">
                        <li><img src="img/instagram/1.jpg" alt=""></li>
                        <li><img src="img/instagram/2.jpg" alt=""></li>
                        <li><img src="img/instagram/3.jpg" alt=""></li>
                        <li><img src="img/instagram/4.jpg" alt=""></li>
                        <li><img src="img/instagram/5.jpg" alt=""></li>
                        <li><img src="img/instagram/6.jpg" alt=""></li>
                    </ul>
                </div>
                <!-- Single widget -->
                <div class="widget-item">
                    <h2 class="widget-title">Tags</h2>
                    <ul class="tag">
                        <li><a href="">branding</a></li>
                        <li><a href="">identity</a></li>
                        <li><a href="">video</a></li>
                        <li><a href="">design</a></li>
                        <li><a href="">inspiration</a></li>
                        <li><a href="">web design</a></li>
                        <li><a href="">photography</a></li>
                    </ul>
                </div>
                <!-- Single widget -->
                <div class="widget-item">
                    <h2 class="widget-title">Quote</h2>
                    <div class="quote">
                        <span class="quotation">‘​‌‘​‌</span>
                        <p>Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique. Sed lacinia turpis at ultricies vestibulum.</p>
                    </div>
                </div>
                <!-- Single widget -->
                <div class="widget-item">
                    <h2 class="widget-title">Add</h2>
                    <div class="add">
                        <a href=""><img src="img/add.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page section end-->


@endsection