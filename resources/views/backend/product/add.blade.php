  @extends('layouts.admin')

  @section('title')
  <title>Trang chủ</title>
  @endsection

  @section('css')
  <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
  <!-- load file ckeditor.js -->
  <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
  <style>
      .select2-container--default .select2-selection--multiple .select2-selection__choice {
          color: #333;
      }
  </style>
  @endsection

  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @include('partials.content-header', ['name' => 'product', 'key' => 'Add'])
      <!-- /.content-header -->
      <!-- Main content -->
      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-6">
                      <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                              @error('name')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="form-group">
                              <label>Price</label>
                              <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                              @error('price')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror                              
                          </div>

                          <div class="form-group">
                              <label>Discount</label>
                              <input type="text" class="form-control" name="discount" value="{{ old('discount') }}">
                              @error('discount')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror                              
                          </div>

                          <div class="form-group">
                              <label>Chọn danh mục</label>
                              <select class="form-control" name="category_id" >
                                  <option value="">Chọn danh mục</option>
                                  {!! $htmlOption !!}
                              </select>
                              @error('category_id')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror                            
                          </div>

                          <div class="form-group">
                              <label>Tags</label>
                              <select class="form-control tags_select_choose" name="tags[]" multiple="multiple">
                              </select>
                          </div>

                          <div class="form-group">
                              <label>Colors</label>
                              <select class="form-control tags_select_choose" name="colors[]" multiple="multiple">
                              </select>
                          </div>

                          <div class="form-group">
                              <label>Sizes</label>
                              <select class="form-control tags_select_choose" name="sizes[]" multiple="multiple">
                              </select>
                          </div>

                          <div class="form-group">
                              <label>Image</label>
                              <input type="file" class="form-control-file" name="feature_image_path">
                          </div>

                          <div class="form-group">
                              <label>Detail Image</label>
                              <input multiple type="file" class="form-control-file" name="image_path[]" >
                          </div>

                          <div class="form-group">
                              <label>Content</label>
                              <textarea class="form-control" name="content" id="content" value="{{ old('content') }}"> </textarea>
                              <script type="text/javascript">
                                  CKEDITOR.replace("content")
                              </script>
                              @error('content')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror                              
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

  @section('js')
  <script src="{{asset('./vendors/select2/select2.min.js')}}"></script>
  <script>
      $(function() {
          $(".tags_select_choose").select2({
              tags: true,
              tokenSeparators: [',']
          })
      })
  </script>
  @endsection