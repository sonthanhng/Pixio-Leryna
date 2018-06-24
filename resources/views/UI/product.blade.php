@extends('layouts.home')

@section('content')
  <div class="product-page">
	   <div id="fh5co-about-us" data-section="about">
		<div class="container">
      <p class="header-section">Sản phẩm</p>
			<div class="row" id="about-us">
				<div class="product-section">
          @if(count($products) > 0)
						@foreach($products as $product)
						<div class="col-md-4 product-wrap to-animate fadeInUp animated">
							<img src="{{$product->thumbnailUrl}}"/>
							<div class="product-description">
								<span class="title">{{$product->title}}</span>
								<a class="btn-buy-now">Mua ngay</a>
							</div>
						</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
  </div>
@endsection
