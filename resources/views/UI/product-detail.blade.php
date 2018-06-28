
@extends('layouts.home')

@section('content')
  <div class="product-page">
    <div class="detail-product container">
      <p class="header-section">Sản phẩm</p>
      <div class="col-md-6 first-col">
        <img class="big-img" src="{{$product->thumbnailUrl}}"/>
        <?php $countSmallImages = 0; ?>
        @if(count($imagesProduct) > 0)
          @foreach($imagesProduct as $imageProduct)
            <?php
              $style = "";
              $countSmallImages++;
              if ($countSmallImages == 1) {
                $style = "margin-left: 0px;";
              }
            ?>
            <img class="small-img" style="<?php echo $style ?>" src="{{ $imageProduct->link }}"/>
          @endforeach
        @endif
      </div>
      <div class="col-md-6 second-col">
        <p class="title">{{$product->title}}</p>
        <p class="description"><?php echo $product->content ?></p>
        <a class="btn-contact">Liên hệ</a>
      </div>
    </div>
    <div id="fh5co-about-us" data-section="about">
  		<div class="container">
        <p class="header-section">Sản phẩm khác</p>
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

  <div id="contact-modal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <p class="header">Liên hệ</p>
      <p class="title">Họ và tên</p>
      <input type="text"/>
      <p class="title">Email</p>
      <input type="text"/>
      <div class="row">
        <div class="col-md-6">
          <p class="title">Số điện thoại</p>
          <input type="text"/>
        </div>
        <div class="col-md-6">
          <p class="title">Số lượng mua</p>
          <input type="text"/>
        </div>
      </div>
      <div style="text-align: right; padding-top: 30px;" class="row">
        <div class="col-md-6" style="text-align: left;">
          <p style="font-size: 16px; line-height: 24px; color: #FFC20F">
            Hotline: 0123 456 789
          </p>
        </div>
        <div class="col-md-6">
          <a class="btn-contact">Gửi yêu cầu</a>
        </div>
      </div>
    </div>
  </div>
@endsection
