@extends('layouts.home')

@section('content')
	<div id="slider" data-section="home">
		<div class="owl-carousel owl-carousel-fullwidth">
			<!-- You may change the background color here. -->
		    <div class="item" style="background: url('images/public/slider1.png'); height: 500px;">
		    	<div class="container" style="position: relative;">
		    	</div>
		    </div>
			<!-- You may change the background color here.  -->
		    <div class="item" style="background: url('images/public/slider1.png'); height: 500px;">
		    	<div class="container" style="position: relative;">
		    	</div>
		    </div>
		</div>
	</div>

	<div id="fh5co-about-us" data-section="about">
		<div class="container">
			<div class="row" id="about-us">
				<div class="col-md-8 col-xs-12 header-wrap">
					<h2 class="to-animate header">Công ty xuất khẩu dép xốp hàng đầu Việt Nam</h2>
				</div>
				<div class="product-section">
					@if(count($products) > 0)
						@foreach($products as $product)
						<div class="col-md-4 product-wrap to-animate fadeInUp animated">
							<img src="{{$product->thumbnailUrl}}"/>
							<div class="product-description">
								<span class="title">{{$product->title}}</span>
								<a class="btn-buy-now" href="/products/{{$product->id}}">Mua ngay</a>
							</div>
						</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-our-services" data-section="services">
		<div class="container-fluid">
			<div class="row about-wrap">
				<div class="col-md-6 first-col col-xs-12">
					<img src="images/public/bg1.png"/>
				</div>
				<div class="col-md-6 second-col col-xs-12">
					<div class="about-leryna-wrap">
						<p class="header">Về Leryna</p>
						<p class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend te</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-features" data-section="features">
		<div class="container-fluid">
			<div class="row">
			<div class="col-md-4 col-xs-12 col first-col">
				<p class="number">01</p>
				<p class="title">Chất lượng hàng đầu</p>
				<p class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
			</div>
			<div class="col-md-4 col-xs-12 col">
				<p class="number">02</p>
				<p class="title">Uy tín số một</p>
				<p class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
			</div>
			<div class="col-md-4 col-xs-12 col">
				<p class="number">03</p>
				<p class="title">Giá cả hợp lý</p>
				<p class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
			</div>
		</div>
		</div>
	</div>

	<div id="fh5co-testimonials" data-section="testimonials">
		<div class="container">
			<p class="header-section">Bài viết nên đọc</p>
			<?php $count_blog = 0; ?>
			@if(count($blogs) > 0)
				@foreach($blogs as $blog)
					<?php
						$count_blog++;
						$colClass = "";
						if ($count_blog === 1) {
							$colClass = "first-col";
						} else if ($count_blog === 3) {
							$colClass = "last-col";
						}
					?>
					<div class="col-md-4 col <?php echo $colClass ?>">
						<div class="post-wrap">
							<img src="{{$blog->thumbnailUrl}}"/>
							<div class="content-wrap">
								<p class="title">{{$blog->title}}</p>
								<p class="content">{{$blog->description}}</p>
							</div>
							<a class="btn-read-more" href="/blogs/{{$blog->id}}">Đọc tiếp..</a>
						</div>
					</div>
				@endforeach
			@endif
		</div>
	</div>
@endsection
