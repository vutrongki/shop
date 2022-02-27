  @extends('layouts.admin')

  @section('title')
  <title>Trang chủ</title>
  @endsection

  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @include('partials.content-header', ["name" => "orders", "key" => 'List'])
      <!-- /.content-header -->
      <!-- Main content -->
      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Date</th>
                                  <th scope="col">Price</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Delivery</th>
                              </tr>
                          </thead>
                          <tbody>
                          @foreach($orders as $order)
                              <tr>
                                  <th scope="row"></th>
                                  <th>{{$order->customer->username}}</th>
                                  <td>{{$order->created_at}}</td>
                                  <td>{{$order->total}}</td>
                                  <td>
                                      @if($order->status == 1)
                                      <span class="label label-primary">Đã giao hàng</span>
                                      @else
                                      <span class="label label-primary">Chưa giao hàng</span>
                                      @endif
                                  </td>
                                  <td>
                                      <a href="{{ route('orders.detail', $order->id)}}" class="btn btn-primary">Chi tiết</a>
                                      @if($order->status == 0)
                                      <a href="{{ route('orders.update', $order->id)}}" class="btn btn-primary">Giao hàng</a>
                                      @endif
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
                  <div class="col-md-12">

                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection