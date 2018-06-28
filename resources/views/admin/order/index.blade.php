@extends('layouts.admin')

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

        <div class="show-blog">
          <p class="header">List of orders</p>
          <table class="table">
            <thead>
              <tr>
                <th>Tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Số lượng</th>
              </tr>
            </thead>
            <tbody>
              @if(count($orders) > 0)
                @foreach($orders as $order)
                  <tr>
                    <td style="width: 25%;">{{$order->name}}</td>
                    <td style="width: 25%;">{{$order->email}}</td>
                    <td style="width: 25%;">{{$order->phonenumber}}</td>
                    <td style="width: 25%;">{{$order->number}}</td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
