@extends('adminlte::page')

@section('content')

<div class="bg-muted">


    <!-- Intro Section -->
    <div class="hero-section">
        <div class="hero-content">
            <div class="hero-center">
                <img src="img/logos/nm/{{$titles[0]->bigLogo}}" onclick="logo();" alt="">
                <div class="form-group mt-5" id='bigLogo' style='display:none;'>
                    <form action="/logo/{{$titles[0]->id}}" method="POST">
                    @csrf
                    <input type="file" id='logo' name='logo' class='form-control' value="{{$titles[0]->logo}}">
                    <button class="btn btn-success align-center">Submit &raquo;</button>
                    </form>
                    </div>
                    <p onclick="slogan();">{{$titles[0]->slogan}}</p>
                    <div class="form-group" style='display:none;' id='slogan'>
                        
                        <input type="text" id='slogan' name='slogan' class='form-control' value="{{$titles[0]->slogan}}">
                    </div>
            </div>
        </div>
        <!-- slider -->
        <div id="hero-slider" style='width:100%;height:848px' class="owl-carousel">
                @foreach($carousels as $carousel)
                <div class="hero-item"  data-bg="/img/carousel/nm/{{$carousel->carouImg}}"></div>
                @endforeach
        </div>
    </div>
    <!-- Intro Section -->

</div>




<script>
    // window.onload = function(){ 
    // document.getElementById('validate').onclick = function() {
    //     confirm("Are you sure about that?");   
    // }
    // }


function logo() {
    var x = document.getElementById("bigLogo");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
function slogan() {
    var x = document.getElementById("slogan");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
    </script>
@stop