
@extends('layouts.home')

@section('content')

<div class="blog-page">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 col-md-offset-1" style="background: url('{{$blog->thumbnailUrl}}'); background-size: cover; height: 220px;">
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2 blog-content-section">
        <p class="title">
          {{$blog->title}}
        </p>
        <div class="content">
          <p><?php echo $blog->content; ?></p>
        </div>
      </div>
    </div>
  </div>
  <div id="fh5co-testimonials" data-section="testimonials">
    <div class="container">
      <p class="header-section">Bài viết khác</p>
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
</div>
@endsection
