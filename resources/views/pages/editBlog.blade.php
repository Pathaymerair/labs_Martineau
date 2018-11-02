@extends('adminlte::page')

@section('content')


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
<h1>Manage Blog Page</h1>
<form action="/updateBlogPage/{{$titles[0]->id}}" method="POST">
@csrf


<div class="page-top-section">
    <div class="overlay"></div>
    <div class="container text-right">
        <div class="page-info">
            <h2>{{$titles[0]->blogPage}}</h2>
            <div class="form-group">
                <label for="blogPage">blogPage</label>
                <input type="text" id='blogPage' name='blogPage' class='form-control' value="{{$titles[0]->blogPage}}">
            </div>
            <div class="page-links">
                <a href="#">{{$titles[0]->homeRef}}</a>
                <div class="form-group">
                    <label for="homeRef">homeRef</label>
                    <input type="text" id='homeRef' name='homeRef' class='form-control' value="{{$titles[0]->homeRef}}">
                </div>
                <span>{{$titles[0]->blogRef}}</span>
                <div class="form-group">
                    <label for="blogRef">blogRef</label>
                    <input type="text" id='blogRef' name='blogRef' class='form-control' value="{{$titles[0]->blogRef}}">
                </div>
            </div>
        </div>
    </div>
</div>



<!-- page section -->
<div class="page-section spad">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-7 blog-posts">
                <!-- Post item -->
                <div class="post-item">
                    <div class="post-thumbnail">
                        <img src="img/blog/blog-2.jpg" alt="">
                        <div class="post-date">
                            <h2>03</h2>
                            <h3>Nov 2017</h3>
                        </div>
                    </div>
                    <div class="post-content">
                        <h2 class="post-title">Just a simple blog post</h2>
                        <div class="post-meta">
                            <a href="">Loredana Papp</a>
                            <a href="">Design, Inspiration</a>
                            <a href="">2 Comments</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Phasellus vestibulum, quam tincidunt venenatis ultrices, est libero mattis ante, ac consectetur diam neque eget quam. Etiam feugiat augue et varius blandit. Praesent mattis, eros a sodales commodo.</p>
                        <a href="blog-post.html" class="read-more">Read More</a>
                    </div>
                </div>
                <!-- Post item -->
                <div class="post-item">
                    <div class="post-thumbnail">
                        <img src="img/blog/blog-1.jpg" alt="">
                        <div class="post-date">
                            <h2>03</h2>
                            <h3>Nov 2017</h3>
                        </div>
                    </div>
                    <div class="post-content">
                        <h2 class="post-title">Just a simple blog post</h2>
                        <div class="post-meta">
                            <a href="">Loredana Papp</a>
                            <a href="">Design, Inspiration</a>
                            <a href="">2 Comments</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Phasellus vestibulum, quam tincidunt venenatis ultrices, est libero mattis ante, ac consectetur diam neque eget quam. Etiam feugiat augue et varius blandit. Praesent mattis, eros a sodales commodo.</p>
                        <a href="blog-post.html" class="read-more">Read More</a>
                    </div>
                </div>
                <!-- Post item -->
                <div class="post-item">
                    <div class="post-thumbnail">
                        <img src="img/blog/blog-3.jpg" alt="">
                        <div class="post-date">
                            <h2>03</h2>
                            <h3>Nov 2017</h3>
                        </div>
                    </div>
                    <div class="post-content">
                        <h2 class="post-title">Just a simple blog post</h2>
                        <div class="post-meta">
                            <a href="">Loredana Papp</a>
                            <a href="">Design, Inspiration</a>
                            <a href="">2 Comments</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Phasellus vestibulum, quam tincidunt venenatis ultrices, est libero mattis ante, ac consectetur diam neque eget quam. Etiam feugiat augue et varius blandit. Praesent mattis, eros a sodales commodo.</p>
                        <a href="blog-post.html" class="read-more">Read More</a>
                    </div>
                </div>
                <!-- Pagination -->
                <div class="page-pagination">
                    <a class="active" href="">01.</a>
                    <a href="">02.</a>
                    <a href="">03.</a>
                </div>
            </div>
            <!-- Sidebar area -->
            <div class="col-md-4 col-sm-5 sidebar">
                <!-- Single widget -->
                <div class="widget-item">
                    
                        <input type="text" placeholder="{{$titles[0]->searchPlaceholder}}">
                        <button class="search-btn"><i class="flaticon-026-search"></i></button>
                        <div class="form-group">
                            <label for="searchPlaceholder">searchPlaceholder</label>
                            <input type="text" id='searchPlaceholder' name='searchPlaceholder' class='form-control' value="{{$titles[0]->searchPlaceholder}}">
                        </div>
                </div>
                <!-- Single widget -->
                <div class="widget-item">
                    <h2 class="widget-title">{{$titles[0]->categoriesTitle}}</h2>
                    <div class="form-group">
                        <label for="categoriesTitle">categoriesTitle</label>
                        <input type="text" id='categoriesTitle' name='categoriesTitle' class='form-control' value="{{$titles[0]->categoriesTitle}}">
                    </div>
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
                    <h2 class="widget-title">{{$titles[0]->instaTitle}}</h2>
                    <div class="form-group">
                        <label for="instaTitle">instaTitle</label>
                        <input type="text" id='instaTitle' name='instaTitle' class='form-control' value="{{$titles[0]->instaTitle}}">
                    </div>
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
                    <h2 class="widget-title">{{$titles[0]->tagsTitle}}</h2>
                    <div class="form-group">
                        <label for="tagsTitle">tagsTitle</label>
                        <input type="text" id='tagsTitle' name='tagsTitle' class='form-control' value="{{$titles[0]->tagsTitle}}">
                    </div>
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
                    <h2 class="widget-title">{{$titles[0]->quoteTitle}}</h2>
                    <div class="form-group">
                        <label for="quoteTitle">quoteTitle</label>
                        <input type="text" id='quoteTitle' name='quoteTitle' class='form-control' value="{{$titles[0]->quoteTitle}}">
                    </div>
                    <div class="quote">
                        <span class="quotation">‘​‌‘​‌</span>
                        <p>{{$titles[0]->quoteDesc}}</p>
                    </div>
                    <div class="form-group">
                        <label for="quoteDesc">quoteDesc</label>
                        <textarea name="quoteDesc" id="quoteDesc" cols="70" rows="10" class='form-control'>{{$titles[0]->quoteDesc}}</textarea>
                        
                    </div>
                </div>
                <!-- Single widget -->
                <div class="widget-item">
                    <h2 class="widget-title">{{$titles[0]->addTitle}}</h2>
                    <div class="form-group">
                        <label for="addTitle">addTitle</label>
                        <input type="text" id='addTitle' name='addTitle' class='form-control' value="{{$titles[0]->addTitle}}">
                    </div>
                    <div class="add">
                        <a href=""><img src="img/add.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page section end-->


<!-- newsletter section -->
<div class="newsletter-section spad">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>{{$titles[0]->newsletterTitle}}</h2>
                <div class="form-group">
                    <label for="newsletterTitle">newsletterTitle</label>
                    <input type="text" id='newsletterTitle' name='newsletterTitle' class='form-control' value="{{$titles[0]->newsletterTitle}}">
                </div>
            </div>
            <div class="col-md-9">
                <!-- newsletter form -->
                {{-- <form class="nl-form"> --}}
                    <input type="text" placeholder="{{$titles[0]->newsletterPlaceholder}}">
                    <div class="form-group">
                        <label for="newsletterPlaceholder">newsletterPlaceholder</label>
                        <input type="text" id='newsletterPlaceholder' name='newsletterPlaceholder' class='form-control' value="{{$titles[0]->newsletterPlaceholder}}">
                    </div>
                    <p class="site-btn btn-2">{{$titles[0]->newsletterButton}}</p>
                    <div class="form-group">
                        <label for="newsletterButton">newsletterButton</label>
                        <input type="text" id='newsletterButton' name='newsletterButton' class='form-control' value="{{$titles[0]->newsletterButton}}">
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
<!-- newsletter section end-->


	<!-- Footer section -->
	<footer class="footer-section">
		<h2>{{$titles[0]->copyright}} <a href="https://colorlib.com" target="_blank">{{$titles[0]->copyrightName}}</a></h2>
    </footer>
    <div class="form-group">
        <label for="copyright">copyright</label>
        <input type="text" id='copyright' name='copyright' class='form-control' value="{{$titles[0]->copyright}}">
    </div>
    <div class="form-group">
        <label for="copyrightName">copyrightName</label>
        <input type="text" id='copyrightName' name='copyrightName' class='form-control' value="{{$titles[0]->copyrightName}}">
    </div>
	<!-- Footer section end -->



<button class="btn btn-info">SUBMIT CHANGES &raquo;</button>

</form>

@stop