@extends('layouts.admin')

@section('header')
  <!-- include summernote css/js -->
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
  <script src="{{ asset('/js/product.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('#product-content').summernote('code', {!! json_encode($product->content)!!});
      $('.product-language').val({!! json_encode($product->language)!!})
    })
  </script>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row content-section">
    @include('components._left_sidebar')
    <div class="col-lg-10 col-md-10" style="background-color: #F7F7F7">
      <div class="right-content product-section">
        @if(session('success'))
          <div class="alert alert-success animated fadeOutUp">
            {{session('success')}}
          </div>
        @endif

        <div class="upload-product-section">
          <p class="header">Edit Product</p>
          {!! Form::open(['url' => 'admin-product/edit', 'enctype' => 'multipart/form-data']) !!}
          {{Form::text('product-id', $product->id, ['class' => 'form-control product-id', 'id' => 'product-id'])}}
          <div class="form-group">
            {{Form::label('product-name', 'Product Name')}}
            {{Form::text('product-name', $product->title, ['class' => 'form-control product-name'])}}
          </div>
          <div class="form-group">
            {{Form::label('product-content', 'Product Content')}}
            <textarea id="product-content" name="product-content"></textarea>
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
