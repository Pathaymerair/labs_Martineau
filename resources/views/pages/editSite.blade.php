@extends('adminlte::page')

@section('content')


    <h1>Manage Site</h1>

    @if (\Session::has('success'))
    <div class="alert bg-success">
        <p class="text-white"><b>{{ \Session::get('success') }}</b> <i class="close icon" data-dismiss='alert'></i></p>
        
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

<form action="/updateSite/{{$titles[0]->id}}" method="POST" enctype="multipart/form-data">
@csrf
{{-- 
<div class="hero-section">
    <div class="hero-content">
        <div class="hero-center"> --}}
            <img src="img/big-logo.png" alt="">
            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" id='logo' name='logo' class='form-control' value="{{$titles[0]->logo}}">
            </div>
      
            <p>{{$titles[0]->slogan}}</p>
            <div class="form-group">
                <label for="slogan">Slogan</label>
                <input type="text" id='slogan' name='slogan' class='form-control' value="{{$titles[0]->slogan}}">
            </div>
{{--     
        </div>
    </div>
    <!-- slider -->
</div> --}}


{{-- <div class="about-contant">
    <div class="container"> --}}
        <div class="section-title">
            <h2 class='text-black'> {{$titles[0]->introSlogan}} <span>{{$titles[0]->overIntroSlogan}}</span> {{$titles[0]->introSloganDeux}}</h2>
            <div class="form-group">
                <label for="introSlogan">introSlogan</label>
                <input type="text" id='introSlogan' name='introSlogan' class='form-control' value="{{$titles[0]->introSlogan}}">
            </div>
            <div class="form-group">
                <label for="overIntroSlogan">overIntroSlogan</label>
                <input type="text" id='overIntroSlogan' name='overIntroSlogan' class='form-control' value="{{$titles[0]->overIntroSlogan}}">
            </div>
            <div class="form-group">
                <label for="introSloganDeux">introSloganDeux</label>
                <input type="text" id='introSloganDeux' name='introSloganDeux' class='form-control' value="{{$titles[0]->introSloganDeux}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-dark">
                <p>{{$titles[0]->introUn}}</p>
            </div>
            <div class="col-md-6">
                <p>{{$titles[0]->introDeux}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="introUn">introUn</label>
                <textarea name="introUn" id="introUn" cols="70" rows="10">{{$titles[0]->introUn}}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="introDeux">introDeux</label>
                <textarea name="introDeux" id="introDeux" cols="70" rows="10">{{$titles[0]->introDeux}}</textarea>
                </div>
            </div>
        </div>
        <div class="text-center mt60">
            <a href="" class="">{{$titles[0]->introButton}}</a>
        </div>
        <div class="form-group">
            <label for="introButton">introButton</label>
            <input type="text" id='introButton' name='introButton' class='form-control' value="{{$titles[0]->introButton}}">
        </div>
        <!-- popup video -->
        {{-- <div class="intro-video"> --}}
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <img src="img/video.jpg" alt="">
                    <a href="{{$titles[0]->youtubeLink}}" class="video-popup">
                        <i class="fa fa-play"></i>
                    </a>
                </div>
            </div>
        {{-- </div> --}}
    {{-- </div>
</div> --}}
                <div class="form-group">
                    <label for="youtubeLink">youtubeLink</label>
                    <input type="text" id='youtubeLink' name='youtubeLink' class='form-control' value="{{$titles[0]->youtubeLink}}">
                </div>
</div>


<!-- Testimonial section -->
<div class="testimonial-section pb100">
    <div class="test-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-4">
                <div class="section-title left">
                    <h2>{{$titles[0]->testiTitle}}</h2>
                    <div class="form-group">
                        <label for="testiTitle">testiTitle</label>
                        <input type="text" id='testiTitle' name='testiTitle' class='form-control' value="{{$titles[0]->testiTitle}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial section end-->



<!-- Services section -->
<div class="services-section spad">
    <div class="container">
        <div class="section-title dark">
            <h2>{{$titles[0]->servicesTitle}} <span>{{$titles[0]->overServicesTitle}}</span> {{$titles[0]->servicesTitleDeux}}</h2>
        </div>
        <div class="form-group">
            <label for="servicesTitle" class='text-white'>servicesTitle</label>
            <input type="text" id='servicesTitle' name='servicesTitle' class='form-control' value="{{$titles[0]->servicesTitle}}">
        </div>
        <div class="form-group">
            <label for="overServicesTitle" class='text-white'>overServicesTitle</label>
            <input type="text" id='overServicesTitle' name='overServicesTitle' class='form-control' value="{{$titles[0]->overServicesTitle}}">
        </div>
        <div class="form-group">
            <label for="servicesTitleDeux" class='text-white'>servicesTitleDeux</label>
            <input type="text" id='servicesTitleDeux' name='servicesTitleDeux' class='form-control' value="{{$titles[0]->servicesTitleDeux}}">
        </div>
        <div class="text-center">
            <a href="" class="">{{$titles[0]->servicesButton}}</a>
        </div>
        <div class="form-group">
            <label for="servicesButton">servicesButton</label>
            <input type="text" id='servicesButton' name='servicesButton' class='form-control' value="{{$titles[0]->servicesButton}}">
        </div>
    </div>
</div>
<!-- services section end -->



<!-- Team Section -->
<div class="team-section spad">
    <div class="overlay"></div>
    <div class="container">
        <div class="section-title">
            <h2>{{$titles[0]->teamTitle}} <span>{{$titles[0]->overTeamTitle}}</span> {{$titles[0]->teamTitleDeux}}</h2>
            <div class="form-group">
                <label for="teamTitle">teamTitle</label>
                <input type="text" id='teamTitle' name='teamTitle' class='form-control' value="{{$titles[0]->teamTitle}}">
            </div>
            <div class="form-group">
                <label for="overTeamTitle">overTeamTitle</label>
                <input type="text" id='overTeamTitle' name='overTeamTitle' class='form-control' value="{{$titles[0]->overTeamTitle}}">
            </div>
            <div class="form-group">
                <label for="teamTitleDeux">teamTitleDeux</label>
                <input type="text" id='teamTitleDeux' name='teamTitleDeux' class='form-control' value="{{$titles[0]->teamTitleDeux}}">
            </div>
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
                    <img src="img/team/imgnm/{{$titles[0]->user->imageUser->imageUser}}" alt="">
                    <h2> {{$titles[0]->user->profil->profilFirstName}} {{$titles[0]->user->profil->profilLastName}}</h2>
                    @if ($titles[0]->user->profil->profilJob)
                        <h3>{{$titles[0]->user->profil->profilJob}}</h3>
                    @endif
                        <select>
                            @foreach ($userAdmin as $item)
                                <option name='userAdmin' id='userAdmin' value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                       
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




	<!-- Promotion section -->
	<div class="promotion-section">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
                    <h2>{{$titles[0]->promoTitle}}</h2>
                    <div class="form-group">
                        <label for="promoTitle">promoTitle</label>
                        <input type="text" id='promoTitle' name='promoTitle' class='form-control' value="{{$titles[0]->promoTitle}}">
                    </div>
                    <p>{{$titles[0]->promoDesc}}</p>
                    <div class="form-group">
                        <label for="promoDesc">promoDesc</label>
                    <textarea name="promoDesc" id="promoDesc" cols="70" rows="10">{{$titles[0]->promoDesc}}</textarea>
                    </div>
				</div>
				<div class="col-md-3">
					<div class="promo-btn-area">
                        <a href="" class="site-btn btn-2">{{$titles[0]->promoButton}}</a>
                        <div class="form-group">
                            <label for="promoButton">promoButton</label>
                            <input type="text" id='promoButton' name='promoButton' class='form-control' value="{{$titles[0]->promoButton}}">
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Promotion section end-->


    <div class="contact-section spad fix">
            <div class="container">
                <div class="row">
                    <!-- contact info -->
                    <div class="col-md-5 col-md-offset-1 contact-info col-push">
                        <div class="section-title left">
                            <h2>{{$titles[0]->contactTitle}}</h2>
                            <div class="form-group">
                                    <label for="contactTitle">contactTitle</label>
                                    <input type="text" id='contactTitle' name='contactTitle' class='form-control' value="{{$titles[0]->contactTitle}}">
                                </div>
                        </div>
                        <p>{{$titles[0]->contactDesc}}</p>
                        <div class="form-group">
                                <label for="contactDesc">contactDesc</label>
                            <textarea name="contactDesc" id="contactDesc" cols="70" rows="10">{{$titles[0]->contactDesc}}</textarea>
                            </div>
                        <h3 class="mt60">{{$titles[0]->contactInfo}}</h3>
                        <div class="form-group">
                                <label for="contactInfo">contactInfo</label>
                                <input type="text" id='contactInfo' name='contactInfo' class='form-control' value="{{$titles[0]->contactInfo}}">
                            </div>
                        <p class="con-item">{{$titles[0]->contactAdress}} <br> {{$titles[0]->contactAdressDeux}} </p>
                        <div class="form-group">
                                    <label for="contactAdress">contactAdress</label>
                                    <input type="text" id='contactAdress' name='contactAdress' class='form-control' value="{{$titles[0]->contactAdress}}">
                                </div>
                        <div class="form-group">
                                    <label for="contactAdressDeux">contactAdressDeux</label>
                                    <input type="text" id='contactAdressDeux' name='contactAdressDeux' class='form-control' value="{{$titles[0]->contactAdressDeux}}">
                                </div>
                        
                        
                        <p class="con-item">{{$titles[0]->contactPhone}}</p>
                        <div class="form-group">
                                <label for="contactPhone">contactPhone</label>
                                <input type="text" id='contactPhone' name='contactPhone' class='form-control' value="{{$titles[0]->contactPhone}}">
                            </div>
                        <p class="con-item">{{$titles[0]->contactMail}}</p>
                        <div class="form-group">
                                <label for="contactMail">contactMail</label>
                                <input type="text" id='contactMail' name='contactMail' class='form-control' value="{{$titles[0]->contactMail}}">
                            </div>
                    </div>
                    <!-- contact form -->
                    <div class="col-md-6 col-pull">
                       
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="nameContact" placeholder="{{$titles[0]->placeholderName}}">
                                    <div class="form-group">
                                            <label for="placeholderName">placeholderName</label>
                                            <input type="text" id='placeholderName' name='placeholderName' class='form-control' value="{{$titles[0]->placeholderName}}">
                                        </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <input type="text" name="emailContact" placeholder="{{$titles[0]->placeholderMail}}">
                                    <div class="form-group">
                                            <label for="placeholderMail">placeholderMail</label>
                                            <input type="text" id='placeholderMail' name='placeholderMail' class='form-control' value="{{$titles[0]->placeholderMail}}">
                                        </div>
                                </div>
                                <div class="col-sm-12">
                                <input type="text" name="subjectContact" placeholder="{{$titles[0]->placeholderSubject}}">
                                <div class="form-group">
                                        <label for="placeholderSubject">placeholderSubject</label>
                                        <input type="text" id='placeholderSubject' name='placeholderSubject' class='form-control' value="{{$titles[0]->placeholderSubject}}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <textarea name="msgContact" placeholder="{{$titles[0]->placeholderMsg}}"></textarea>
                                    <div class="form-group">
                                            <label for="placeholderMsg">placeholderMsg</label>
                                            <input type="text" id='placeholderMsg' name='placeholderMsg' class='form-control' value="{{$titles[0]->placeholderMsg}}">
                                        </div>
                                    </div>
                                    <a class="site-btn">{{$titles[0]->mailButton}}</a>
                                    <div class="form-group">
                                            <label for="mailButton">mailButton</label>
                                            <input type="text" id='mailButton' name='mailButton' class='form-control' value="{{$titles[0]->mailButton}}">
                                        </div>
                            </div>
                     
                    </div>
                </div>
            </div>
        </div>



	<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
                <h2>{{$titles[0]->copyright}} <a href="https://colorlib.com" target="_blank">{{$titles[0]->copyrightName}}</a></h2>
                <div class="form-group">
                    <label for="copyright">copyright</label>
                    <input type="text" id='copyright' name='copyright' class='form-control' value="{{$titles[0]->copyright}}">
                </div>
                <div class="form-group">
                    <label for="copyrightName">copyrightName</label>
                    <input type="text" id='copyrightName' name='copyrightName' class='form-control' value="{{$titles[0]->copyrightName}}">
                </div>
                <button id='validate' class="btn btn-info">Submit changes &raquo;</button>
        </div>
    </footer>
	<!-- Footer section end -->
</form>


<script>
    window.onload = function(){ 
    document.getElementById('validate').onclick = function() {
        confirm("Are you sure about that?");
        
    }
    }
    </script>
@stop