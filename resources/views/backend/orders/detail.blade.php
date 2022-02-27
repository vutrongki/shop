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
                        <tr>
                            <th>Họ tên</th>
                            <td>{{$order->customer->username}}</td>
                        </tr>
                        <tr>
                            <th>Địa chỉ</th>
                            @foreach($order->orderDetail as $value)
                            <td>{{$value->address}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <th>Điện thoại</th>
                            @foreach($order->orderDetail as $value)
                            <td>{{$value->phone}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <th>Tổng giá</th>
                            <td>{{$order->total}}</td>
                        </tr>
                        <tr>
                            <th>Màu sắc</th>
                            @foreach($order->orderDetail as $value)
                            <td>{{$value->color}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <th>Size</th>
                            @foreach($order->orderDetail as $value)
                            <td>{{$value->size}}</td>
                            @endforeach
                        </tr>                        
                        <tr>
                            <th>Ngày đặt</th>
                            <td>{{$order->created_at}}</td>
                        </tr>
                        <tr>
                            <th>Trạng thái</th>
                            <td>
                                @if($order->status == 0)
                                <span class="label label-danger">Chưa giao hàng</span>
                                @else
                                <span class="label label-primary">Đã giao hàng</span>
                                @endif

                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Number</th>
                        </tr>
                        @foreach($data as $rows)
                        <?php $products = DB::table("products")->where("id", "=", $rows->product_id)->first(); ?>
                        <tr>
                            <td>{{$products->name}}</td>
                            <td><img src="{{$products->feature_image_path}}" style="height: 120px" alt=""></td>
                            <td>{{$rows->price}}</td>
                            <td>{{$rows->quantity}}</td>

                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection