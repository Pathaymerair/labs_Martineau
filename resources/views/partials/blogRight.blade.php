@section('sidebar')

            <!-- Sidebar area -->
       
                    <!-- Single widget -->
                    <div class="widget-item">
                        <form action="#" class="search-form">
                            <input type="text" placeholder="{{$titles[0]->searchPlaceholder}}">
                            <button class="search-btn"><i class="flaticon-026-search"></i></button>
                        </form>
                    </div>
                    <!-- Single widget -->
                    <div class="widget-item">
                        <h2 class="widget-title">{{$titles[0]->categoriesTitle}}</h2>
                        <ul>
                            @foreach ($categories as $cate)
                                @if ($cate->state_id == 2)
                            <li><a href="#">{{$cate->nameCatego}}</a></li>
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
                            <li><a href="">{{$tag->nameTag}}</a></li>
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
                            <a href=""><img src="img/add.jpg" alt=""></a>
                        </div>
                    </div>
              

@endsection