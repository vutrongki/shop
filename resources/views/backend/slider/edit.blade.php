  @extends('layouts.admin')

  @section('title')
  <title>Edit Slider</title>
  @endsection

  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @include('partials.content-header', ['name' => 'category', 'key' => 'Edit'])
      <!-- /.content-header -->
      <!-- Main content -->
      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-6">
                      <form action="{{route('sliders.update', $slider->id)}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                              <label>Tên slider</label>
                              <input type="text" class="form-control" name="name" value="{{$slider->name}}">
                          </div>

                          <div class="form-group">
                              <label>Description</label>
                              <textarea name="description" class="form-control" cols="30" rows="10">{!! $slider->description !!}</textarea>
                          </div>
                          <div class="form-group">
                              <label>Image</label>
                              <input type="file" class="form-control-file" name="image">
                              <div class="row">
                                  <div class="col-md-12">
                                      <img src="{{$slider->image}}" alt="" width="500px">
                                  </div>
                              </div>
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection