@section('team')

<!-- Team Section -->
<div class="team-section spad">
    <div class="overlay"></div>
    <div class="container">
        <div class="section-title">
            <h2>{{$titles[0]->teamTitle}} <span>{{$titles[0]->overTeamTitle}}</span> {{$titles[0]->teamTitleDeux}}</h2>
        </div>
        <div class="row">
            <!-- single member -->
            <div class="col-sm-4">
                <div class="member">
                    <img src="img/team/1.jpg" alt="">
                    <h2>Christinne Williams</h2>
                    <h3>Project Manager</h3>
                </div>
            </div>
            <!-- single member -->
            <div class="col-sm-4">
                <div class="member">
                    <img src="img/team/2.jpg" alt="">
                    <h2>Christinne Williams</h2>
                    <h3>Junior developer</h3>
                </div>
            </div>
            <!-- single member -->
            <div class="col-sm-4">
                <div class="member">
                    <img src="img/team/3.jpg" alt="">
                    <h2>Christinne Williams</h2>
                    <h3>Digital designer</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team Section end-->


@endsection