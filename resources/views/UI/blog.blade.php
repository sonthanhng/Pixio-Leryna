@extends('layouts.home')

@section('content')
  <div class="blog-page">
    <div id="fh5co-testimonials" data-section="testimonials">
  		<div class="container">
  			<p class="header-section">Blog</p>
				<div class="row">
          <?php $count_blog = 0; ?>
    			@if(count($blogs) > 0)
    				@foreach($blogs as $blog)
    					<?php
    						$count_blog++;
    						$colClass = "";
    						if ($count_blog % 3 === 1) {
    							$colClass = "first-col";
                  echo '<div class="row">';
    						} else if ($count_blog % 3 === 0) {
    							$colClass = "last-col";
                  echo '</div>';
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
</div>
@endsection
