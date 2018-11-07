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
                    <img src="img/team/imgnm/{{$user->imageUser->imageUser}}" alt="">
                    <h2>{{$user->profil->profilFirstname}} {{$user->profil->profilLastName}}</h2>
                    @if ($user->profil->profilJob)
                    <h3>{{$user->profil->profilJob}}</h3>
                    @endif
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
                        <img src="img/team/imgnm/{{$userDeux->imageUser->imageUser}}" alt="">
                        <h2>{{$userDeux->profil->profilFirstname}} {{$userDeux->profil->profilLastName}}</h2>
                        @if ($userDeux->profil->profilJob)
                        <h3>{{$userDeux->profil->profilJob}}</h3>
                        @endif
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- Team Section end-->


@endsection