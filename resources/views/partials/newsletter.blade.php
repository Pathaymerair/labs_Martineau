@section('newsletter')

	<!-- newsletter section -->
	<div class="newsletter-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h2>{{$titles[0]->newsletterTitle}}</h2>
				</div>
				<div class="col-md-9">
					<!-- newsletter form -->
					<form class="nl-form" action="/news/create" method="POST">
						@csrf
						<input type="text" name='newsMail' placeholder="{{$titles[0]->newsletterPlaceholder}}" value='{{old('newsMail')}}'>
						<button class="site-btn btn-2">{{$titles[0]->newsletterButton}}</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- newsletter section end-->

@endsection