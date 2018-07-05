@extends('layouts.home')

@section('content')
  <div class="blog-page" style="margin-top: 70px;">
    <div id="fh5co-testimonials" data-section="testimonials">
  		<div class="container">
  			<p class="header-section">Blog</p>
				<div class="row blog-section">
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
</div>
@endsection
