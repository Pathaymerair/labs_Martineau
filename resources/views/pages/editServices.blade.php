@extends('adminlte::page')

@section('content')


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
<h1>Manage Services Page</h1>
<form action="/updateServicePage/{{$titles[0]->id}}" method="POST">
@csrf



	<!-- Page header -->
	<div class="page-top-section">
		<div class="overlay"></div>
		<div class="container text-right">
			<div class="page-info">
                <h2>{{$titles[0]->servicesPage}}</h2>
                <div class="form-group">
                    <input type="text" id='servicesPage' name='servicesPage' class='form-control' value="{{$titles[0]->servicesPage}}">
                </div>
				<div class="page-links">
                    <a href="#">{{$titles[0]->homeRef}}</a>
                    <span>{{$titles[0]->servicesRef}}</span>
                    <div class="form-group">
                            <input type="text" id='homeRef' name='homeRef' class='form-control' value="{{$titles[0]->homeRef}}">
                        <input type="text" id='servicesRef' name='servicesRef' class='form-control' value="{{$titles[0]->servicesRef}}">
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- Page header end-->



    
<!-- Services section -->
<div class="services-section spad">
    <div class="container">
        <div class="section-title dark">
            <h2>{{$titles[0]->servicesTitle}} <span>{{$titles[0]->overServicesTitle}}</span> {{$titles[0]->servicesTitleDeux}}</h2>
        </div>
        <div class="form-group">
            <label for="servicesTitle">servicesTitle</label>
            <input type="text" id='servicesTitle' name='servicesTitle' class='form-control' value="{{$titles[0]->servicesTitle}}">
        </div>
        <div class="form-group">
            <label for="overServicesTitle">overServicesTitle</label>
            <input type="text" id='overServicesTitle' name='overServicesTitle' class='form-control' value="{{$titles[0]->overServicesTitle}}">
        </div>
        <div class="form-group">
            <label for="servicesTitleDeux">servicesTitleDeux</label>
            <input type="text" id='servicesTitleDeux' name='servicesTitleDeux' class='form-control' value="{{$titles[0]->servicesTitleDeux}}">
        </div>
        <div class="text-center">
            <a href="/services" class="site-btn">{{$titles[0]->servicesButton}}</a>
        </div>
        <div class="form-group">
            <label for="servicesButton">servicesButton</label>
            <input type="text" id='servicesButton' name='servicesButton' class='form-control' value="{{$titles[0]->servicesButton}}">
        </div>
    </div>
</div>
<!-- services section end -->









<!-- features section -->
<div class="team-section spad">
    <div class="overlay"></div>
    <div class="container">
        <div class="section-title">
            <h2>{{$titles[0]->introSlogan}} <span>{{$titles[0]->overIntroSlogan}}</span> {{$titles[0]->introSloganDeux}}</h2>
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

        <div class="text-center mt100">
            <a href="" class="site-btn">{{$titles[0]->introButton}}</a>
            <div class="form-group">
                <label for="introButton">introButton</label>
                <input type="text" id='introButton' name='introButton' class='form-control' value="{{$titles[0]->introButton}}">
            </div>
        </div>
    </div>
</div>
<!-- features section end-->


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
                    <p class='text-black'>{{$titles[0]->contactDesc}}</p>
                    <div class="form-group">
                            <label for="contactDesc">contactDesc</label>
                        <textarea name="contactDesc" id="contactDesc" cols="70" rows="10">{{$titles[0]->contactDesc}}</textarea>
                        </div>
                    <h3 class="mt60">{{$titles[0]->contactInfo}}</h3>
                    <div class="form-group">
                            <label for="contactInfo">contactInfo</label>
                            <input type="text" id='contactInfo' name='contactInfo' class='form-control' value="{{$titles[0]->contactInfo}}">
                        </div>
                    <p class="con-item text-black">{{$titles[0]->contactAdress}} <br> {{$titles[0]->contactAdressDeux}} </p>
                    <div class="form-group">
                                <label for="contactAdress">contactAdress</label>
                                <input type="text" id='contactAdress' name='contactAdress' class='form-control' value="{{$titles[0]->contactAdress}}">
                            </div>
                    <div class="form-group">
                                <label for="contactAdressDeux">contactAdressDeux</label>
                                <input type="text" id='contactAdressDeux' name='contactAdressDeux' class='form-control' value="{{$titles[0]->contactAdressDeux}}">
                            </div>
                    
                    
                    <p class="con-item text-black">{{$titles[0]->contactPhone}}</p>
                    <div class="form-group">
                            <label for="contactPhone">contactPhone</label>
                            <input type="text" id='contactPhone' name='contactPhone' class='form-control' value="{{$titles[0]->contactPhone}}">
                        </div>
                    <p class="con-item text-black">{{$titles[0]->contactMail}}</p>
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
<!-- Contact section end-->


	<!-- Footer section -->
	<footer class="footer-section">
		<h2>{{$titles[0]->copyright}} <a href="https://colorlib.com" target="_blank">{{$titles[0]->copyrightName}}</a></h2>
        <div class="container">
                <div class="form-group">
                        <label for="copyright">copyright</label>
                        <input type="text" id='copyright' name='copyright' class='form-control' value="{{$titles[0]->copyright}}">
                    </div>
                    <div class="form-group">
                        <label for="copyrightName">copyrightName</label>
                        <input type="text" id='copyrightName' name='copyrightName' class='form-control' value="{{$titles[0]->copyrightName}}">
                    </div>
        </div>
    </footer>
	<!-- Footer section end -->



<button id='validate' class="btn btn-info">SUBMIT CHANGES &raquo;</button>

</form>

<script>
    window.onload = function(){ 
    document.getElementById('validate').onclick = function() {
        confirm("Are you sure about that?");
        
    }
    }
    </script>

@stop