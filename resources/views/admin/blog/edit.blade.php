@extends('layouts.admin')

@section('header')
  <!-- include summernote css/js -->
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
  <script src="{{ asset('/js/blog.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('#blog-content').summernote('code', {!! json_encode($blog->content)!!});
      $('.blog-language').val({!! json_encode($blog->language)!!})
    })
  </script>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row content-section">
    @include('components._left_sidebar')
    <div class="col-lg-10 col-md-10" style="background-color: #F7F7F7">
      <div class="right-content blog-section">
        @if(session('success'))
          <div class="alert alert-success animated fadeOutUp">
            {{session('success')}}
          </div>
        @endif

        <div class="upload-blog-section">
          <p class="header">Edit Blog</p>
          {!! Form::open(['url' => 'admin-blog/edit', 'enctype' => 'multipart/form-data']) !!}
          {{Form::text('blog-id', $blog->id, ['class' => 'form-control blog-id', 'id' => 'blog-id'])}}
          <div class="form-group">
            {{Form::label('blog-name', 'Blog Name')}}
            {{Form::text('blog-name', $blog->title, ['class' => 'form-control blog-name'])}}
          </div>
          <div class="form-group">
            {{Form::textarea('blog-description', $blog->description, ['class' => 'form-control blog-description', 'id' => 'blog-description'])}}
          </div>
          <div class="form-group">
            {{Form::label('blog-content', 'Blog Content')}}
            <textarea id="blog-content" name="blog-content"></textarea>
          </div>
          <div class="form-group">
            {{Form::file('image', ['placeholder' => 'Select thumbnail image'])}}
          </div>
          <div>
            {{Form::submit('Upload', ['class' => 'btn btn-primary'])}}
          </div>
          {!! Form::close() !!}
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
