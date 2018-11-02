@section('contact')

	<!-- Contact section -->
	<div class="contact-section spad fix">
		<div class="container">
			<div class="row">
				<!-- contact info -->
				<div class="col-md-5 col-md-offset-1 contact-info col-push">
					<div class="section-title left">
						<h2>{{$titles[0]->contactTitle}}</h2>
					</div>
					<p>{{$titles[0]->contactDesc}}</p>
					<h3 class="mt60">{{$titles[0]->contactInfo}}</h3>
					<p class="con-item">{{$titles[0]->contactAdress}} <br> {{$titles[0]->contactAdressDeux}} </p>
					<p class="con-item">{{$titles[0]->contactPhone}}</p>
					<p class="con-item">{{$titles[0]->contactMail}}</p>
				</div>
				<!-- contact form -->
				<div class="col-md-6 col-pull">
					<form class="form-class" id="con_form" action="/contact/create" method="POST">
						@csrf
						<div class="row">
							<div class="col-sm-6">
								<input type="text" name="nameContact" placeholder="{{$titles[0]->placeholderName}}">
							</div>
							<div class="col-sm-6">
								<input type="text" name="emailContact" placeholder="{{$titles[0]->placeholderMail}}">
							</div>
							<div class="col-sm-12">
								<input type="text" name="subjectContact" placeholder="{{$titles[0]->placeholderSubject}}">
								<textarea name="msgContact" placeholder="{{$titles[0]->placeholderMsg}}"></textarea>
								<button class="site-btn">{{$titles[0]->mailButton}}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Contact section end-->

@endsection