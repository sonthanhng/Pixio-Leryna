@extends('layouts.home')

@section('content')
  <div class="product-page">
	   <div id="fh5co-about-us" data-section="about">
		<div class="container">
      <p class="header-section">Sản phẩm</p>
			<div class="row" id="about-us">
        <div class="product-section row">
					@if(count($products) > 0)
						@foreach($products as $product)
						<div class="col-md-4 col-xs-12 product-wrap to-animate fadeInUp animated">
							<a href="/products/{{$product->id}}">
								<div style="background: url({{$product->thumbnailUrl}}); background-size: cover; height: 300px; width: 100%;">
									<div class="product-hover">
									</div>
								</div>
								<div class="product-description">
									<span class="title">{{$product->title}}</span>
									<a class="btn-buy-now" href="/products/{{$product->id}}">Mua ngay</a>
								</div>
							</a>
						</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
  </div>
@endsection
