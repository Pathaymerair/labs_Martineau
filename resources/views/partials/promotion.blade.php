@section('promotion')

	<!-- Promotion section -->
	<div class="promotion-section">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<h2>{{$titles[0]->promoTitle}}</h2>
					<p>{{$titles[0]->promoDesc}}</p>
				</div>
				<div class="col-md-3">
					<div class="promo-btn-area">
						<a href="" class="site-btn btn-2">{{$titles[0]->promoButton}}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Promotion section end-->

@endsection