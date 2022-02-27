  
@extends('layouts.admin')

@section('title')
<title>Trang chủ</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
@include('partials.content-header', ["name" => "slider", "key" => 'List'])
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('sliders.create') }}" class="btn btn-primary mb-2">Add</a>
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Image</th>
                  <th scope="col">Description</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($sliders as $slider)
                <tr>
                  <th scope="row"></th>
                  <td>{{ $slider->name }}</td> 
                  <td><img src="{{$slider->image}}" alt="" width="500px"></td> 
                  <td>{{ $slider->description }}</td> 
                  <td>
                    <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('sliders.delete', $slider->id) }}" class="btn btn-primary">Delete</a>
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
