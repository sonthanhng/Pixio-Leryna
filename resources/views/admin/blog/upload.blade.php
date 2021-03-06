@extends('layouts.admin')

@section('header')
  <!-- include summernote css/js -->
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
  <script src="{{ asset('/js/blog.js') }}"></script>

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
          <p class="header">Upload Blog</p>
          {!! Form::open(['url' => 'admin-blog/upload', 'enctype' => 'multipart/form-data']) !!}
          <div class="form-group">
            {{Form::text('blog-name', '', ['class' => 'form-control blog-name'])}}
          </div>
          <div class="form-group">
            {{Form::textarea('blog-description', '', ['class' => 'form-control blog-description', 'id' => 'blog-description'])}}
          </div>
          <div class="form-group">
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
