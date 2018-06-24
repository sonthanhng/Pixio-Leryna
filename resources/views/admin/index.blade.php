@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  <div class="row content-section">
    @include('components._left_sidebar')
    <div class="col-lg-10 col-md-10" style="background-color: #F7F7F7">
      <div class="right-content">
        <p>
          You are logged in!
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
