@extends('layouts.home')

@section('content')
	<div id="slider" data-section="home">
		<div class="owl-carousel owl-carousel-fullwidth">
			<!-- You may change the background color here. -->
		    <!-- <div class="item" style="background: url('images/public/slider1.png'); height: 500px; background-size: 100%">
		    	<div class="container" style="position: relative;">
		    	</div>
		    </div> -->
			<!-- You may change the background color here.  -->
		    <div class="item" style="background: url('images/public/slider2.jpg'); height: 500px;">
		    	<div class="container" style="position: relative;">
		    	</div>
		    </div>
				<div class="item" style="background: url('images/public/slider3.jpg'); height: 500px;">
		    	<div class="container" style="position: relative;">
		    	</div>
		    </div>
		</div>
	</div>

	<div id="fh5co-about-us" data-section="about">
		<div class="container">
			<div class="row" id="about-us">
				<div class="row" style="margin: 0px;">
					<div class="col-md-8 col-xs-12 header-wrap">
						<h2 class="to-animate header">Nhà sản xuất tiên phong các sản phẩm tiệm nails salon</h2>
					</div>
				</div>
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

	<div id="fh5co-our-services" data-section="services">
		<div class="container-fluid">
			<div class="row about-wrap">
				<div class="col-md-6 first-col col-xs-12">
					<img src="images/public/bg1.png"/>
				</div>
				<div class="col-md-6 second-col col-xs-12">
					<div class="about-leryna-wrap">
						<p class="header">Về Leryna</p>
						<p class="description">Tự hào là đơn vị hàng đầu trong lĩnh vực cung cấp sản phẩm dịch vụ Nails, với chất lượng và tiêu chuẩn Mỹ, Leryna mang sứ mệnh chăm sóc sắc đẹp tốt nhất cho phái nữ. Chúng tôi chiếm thị phần lớn trong thị trường phân phối các mặt hàng ngành Nails tại Mỹ & luôn cống hiến hết mình bằng khẩu hiệu “For your beauty & safety.”</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-features" data-section="features">
		<div class="container-fluid desktop">
			<div class="row">
			<div class="col-md-4 col-xs-12 col">
				<p class="number">01</p>
				<p class="title">Chất lượng thật- giá trị thật</p>
				<p class="description">Mỗi sản phẩm- dù là bé nhất- đều được gia công tỉ mỉ, kiểm duyệt gắt gao, quy trình rõ ràng. Tất cả tạo nên giá trị cho thương hiệu Leryna- khẳng định vị thế số 1 về chất lượng.</p>
			</div>
			<div class="col-md-4 col-xs-12 col">
				<p class="number">02</p>
				<p class="title">Tiêu chuẩn cao- giá thành thấp</p>
				<p class="description">Quy mô sản xuất lớn, đồng bộ hóa và công nghệ cao giúp Leryna có được lợi thế giá thành nổi bật. Không những thế, chúng tôi còn có các dịch vụ ưu đãi, chế độ hậu mãi chu đáo, hợp tác lần đầu - hợp tác mãi về sau.</p>
			</div>
			<div class="col-md-4 col-xs-12 col">
				<p class="number">03</p>
				<p class="title">Uy tín lâu năm</p>
				<p class="description">Niềm tin của khách hàng chính là động lực và mục tiêu hướng tới của chúng tôi trên con đường kinh doanh và cống hiến cho sắc đẹp, sức khỏe phái nữ. Nhờ vậy, lời hứa thương hiệu của Leryna luôn trường tồn cùng thời gian.</p>
			</div>
		</div>
		</div>
	</div>

	<div id="fh5co-features" data-section="features">
		<div class="container-fluid mobile">
			<div class="owl-carousel owl-carousel-fullwidth">
				<!-- You may change the background color here. -->
					<div class="item col">
						<p class="number">01</p>
						<p class="title">Chất lượng thật- giá trị thật</p>
						<p class="description">Mỗi sản phẩm- dù là bé nhất- đều được gia công tỉ mỉ, kiểm duyệt gắt gao, quy trình rõ ràng. Tất cả tạo nên giá trị cho thương hiệu Leryna- khẳng định vị thế số 1 về chất lượng.</p>
					</div>
				<!-- You may change the background color here.  -->
					<div class="item col">
						<p class="number">02</p>
						<p class="title">Tiêu chuẩn cao- giá thành thấp</p>
						<p class="description">Quy mô sản xuất lớn, đồng bộ hóa và công nghệ cao giúp Leryna có được lợi thế giá thành nổi bật. Không những thế, chúng tôi còn có các dịch vụ ưu đãi, chế độ hậu mãi chu đáo, hợp tác lần đầu - hợp tác mãi về sau.</p>
					</div>
					<div class="item col">
						<p class="number">03</p>
						<p class="title">Uy tín lâu năm</p>
						<p class="description">Niềm tin của khách hàng chính là động lực và mục tiêu hướng tới của chúng tôi trên con đường kinh doanh và cống hiến cho sắc đẹp, sức khỏe phái nữ. Nhờ vậy, lời hứa thương hiệu của Leryna luôn trường tồn cùng thời gian.</p>
					</div>
			</div>
		</div>
	</div>

	<div id="fh5co-testimonials" data-section="testimonials">
		<div class="container">
			<p class="header-section">Bài viết nên đọc</p>
			<div class="blog-section row">
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
							<a href="/blogs/{{$blog->id}}">
								<div class="post-wrap">
									<img src="{{$blog->thumbnailUrl}}"/>
									<div class="content-wrap">
										<p class="title">{{$blog->title}}</p>
										<p class="content">{{$blog->description}}</p>
									</div>
									<a class="btn-read-more" href="/blogs/{{$blog->id}}">Đọc tiếp..</a>
								</div>
							</a>
						</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
@endsection
