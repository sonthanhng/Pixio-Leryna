@extends('layouts.admin')

@section('header')
  <!-- include summernote css/js -->
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
  <script src="{{ asset('/js/product.js') }}"></script>

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

        <div class="show-product">
          <p class="header">List of products</p>
          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Content</th>
                <th>Thumbnail</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($products) > 0)
                @foreach($products as $product)
                  <tr>
                    <td style="width: 20%;">{{$product->title}}</td>
                    <td style="width: 25%;">{{$product->description}}</td>
                    <td>
                      <img class="thumbnail-img" src="{{$product->thumbnailUrl}}"/>
                    </td>
                    <td>
                      <a class="btn btn-primary" href="/admin-editProduct/{{$product->id}}">Edit</a>
                      <button class="btn btn-danger" onclick="deleteProduct({{$product->id}})">Delete</button>
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>

        <div id="deleteModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Blog</h4>
              </div>
              <!-- <div class="modal-body">
                {!! Form::open(['url' => 'talent/upload-job', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                  <select name="product-language" class="product-language" id="product-language">
                    <option value="EN">EN</option>
                    <option value="VIE">VIE</option>
                  </select>
                </div>
                <div class="form-group">
                  {{Form::text('product-name', '', ['class' => 'form-control product-name'])}}
                </div>
                <div class="form-group">
                  {{Form::textarea('product-description', '', ['class' => 'form-control product-description', 'id' => 'product-description'])}}
                </div>
                <div class="form-group">
                  <textarea id="product-content" name="product-content"></textarea>
                </div>
                <div class="form-group">
                  {{Form::file('image', ['placeholder' => 'Select thumbnail image'])}}
                </div>
                <div>
                  {{Form::submit('Upload', ['class' => 'btn btn-primary'])}}
                </div>
                {!! Form::close() !!}
              </div> -->
              <div class="modal-footer">
                <a id="delete-product-btn" class="btn btn-danger">Yes</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
