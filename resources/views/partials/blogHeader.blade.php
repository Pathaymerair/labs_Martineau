@section('blogHeader')

<div class="page-top-section">
    <div class="overlay"></div>
    <div class="container text-right">
        <div class="page-info">
            <h2>{{$titles[0]->blogPage}}</h2>
            <div class="page-links">
                <a href="#">{{$titles[0]->homeRef}}</a>
                <span>{{$titles[0]->blogRef}}</span>
            </div>
        </div>
    </div>
</div>

@endsection