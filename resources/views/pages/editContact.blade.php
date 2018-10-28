@extends('adminlte::page')

@section('content')

<div class="container">

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
<h1>Manage Contact Page</h1>
<form action="/updateContactPage/{{$titles[0]->id}}" method="POST">
@csrf


	<!-- Page header -->
	<div class="page-top-section">
		<div class="overlay"></div>
		<div class="container text-right">
			<div class="page-info">
                <h2>{{$titles[0]->contactPage}}</h2>
                <div class="form-group">
                    <label for="contactPage">contactPage</label>
                    <input type="text" id='contactPage' name='contactPage' class='form-control' value="{{$titles[0]->contactPage}}">
                </div>
				<div class="page-links">
                    <a href="#">{{$titles[0]->homeRef}}</a>
                    <div class="form-group">
                        <label for="homeRef">homeRef</label>
                        <input type="text" id='homeRef' name='homeRef' class='form-control' value="{{$titles[0]->homeRef}}">
                    </div>
                    <span>{{$titles[0]->contactRef}}</span>
                    <div class="form-group">
                        <label for="contactRef">contactRef</label>
                        <input type="text" id='contactRef' name='contactRef' class='form-control' value="{{$titles[0]->contactRef}}">
                    </div>
				</div>
			</div>
		</div>
	</div>
    <!-- Page header end -->
    


    <!-- Contact section -->
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
                <p class="con-item">{{$titles[0]->contactAdress}}
                     <br> {{$titles[0]->contactAdressDeux}} </p>
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

            </div>
        </div>
        <div class="row">
       
                    
                <div class="col-sm-6">
                    <input type="text" name="name" placeholder="{{$titles[0]->placeholderName}}">
                    <div class="form-group">
                        <label for="placeholderName">placeholderName</label>
                        <input type="text" id='placeholderName' name='placeholderName' class='form-control' value="{{$titles[0]->placeholderName}}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <input type="text" name="email" placeholder="{{$titles[0]->placeholderMail}}">
                    <div class="form-group">
                        <label for="placeholderMail">placeholderMail</label>
                        <input type="text" id='placeholderMail' name='placeholderMail' class='form-control' value="{{$titles[0]->placeholderMail}}">
                    </div>
                </div>
                <div class="col-sm-12">
                    <input type="text" name="subject" placeholder="{{$titles[0]->placeholderSubject}}">
                    <div class="form-group">
                        <label for="placeholderSubject">placeholderSubject</label>
                        <input type="text" id='placeholderSubject' name='placeholderSubject' class='form-control' value="{{$titles[0]->placeholderSubject}}">
                    </div>
                    <textarea name="message" placeholder="{{$titles[0]->placeholderMsg}}"></textarea>
                    <div class="form-group">
                        <label for="placeholderMsg">placeholderMsg</label>
                        <input type="text" id='placeholderMsg' name='placeholderMsg' class='form-control' value="{{$titles[0]->placeholderMsg}}">
                    </div>
                    {{$titles[0]->mailButton}}
                    <div class="form-group">
                        <label for="mailButton">mailButton</label>
                        <input type="text" id='mailButton' name='mailButton' class='form-control' value="{{$titles[0]->mailButton}}">
                    </div>
                </div>
            
        </div>
    </div>
</div>
<!-- Contact section end-->



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



<button class="btn btn-info">Submit changes</button>
</form>

@stop