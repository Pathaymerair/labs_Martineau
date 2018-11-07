@section('about')

	<!-- About section -->
	<div class="about-section">
		<div class="overlay"></div>
		<!-- card section -->
		<div class="card-section">
			<div class="container">
				<div class="row">
					<!-- single card -->
					<div class="col-md-4 col-sm-6">
						<div class="lab-card">
							<div class="icon">
								<i class="{{$serviceUn->icon->svg}}"></i>
							</div>
							<h2>{{$serviceUn->serviceTitre}}</h2>
							<p>{{$serviceUn->serviceDesc}}</p>
						</div>
					</div>
					<!-- single card -->
					<div class="col-md-4 col-sm-6">
						<div class="lab-card">
							<div class="icon">
								<i class="{{$serviceDeux->icon->svg}}"></i>
							</div>
							<h2>{{$serviceDeux->serviceTitre}}</h2>
							<p>{{$serviceDeux->serviceDesc}}</p>
						</div>
					</div>
					<!-- single card -->
					<div class="col-md-4 col-sm-12">
						<div class="lab-card">
							<div class="icon">
								<i class="{{$serviceTrois->icon->svg}}"></i>
							</div>
							<h2>{{$serviceTrois->serviceTitre}}</h2>
							<p>{{$serviceTrois->serviceDesc}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- card section end-->


		<!-- About contant -->
		<div class="about-contant">
			<div class="container">
				<div class="section-title">
					<h2> {{$titles[0]->introSlogan}} <span>{{$titles[0]->overIntroSlogan}}</span> {{$titles[0]->introSloganDeux}}</h2>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p>{{$titles[0]->introUn}}</p>
					</div>
					<div class="col-md-6">
						<p>{{$titles[0]->introDeux}}</p>
					</div>
				</div>
				<div class="text-center mt60">
					<a href="" class="site-btn">{{$titles[0]->introButton}}</a>
				</div>
				<!-- popup video -->
				<div class="intro-video">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<img src="img/video.jpg" alt="">
							<a href="{{$titles[0]->youtubeLink}}" class="video-popup">
								<i class="fa fa-play"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- About section end -->

@endsection