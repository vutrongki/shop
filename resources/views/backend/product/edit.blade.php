  
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
    @include('partials.content-header', ['name' => 'product', 'key' => 'Edit'])
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{$product->name}}">
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price" value="{{$product->price}}">
                    </div>

                    <div class="form-group">
                        <label>Discount</label>
                        <input type="text" class="form-control" name="discount" value="{{$product->discount}}">
                    </div>

                    <div class="form-group">
                        <label>Chọn danh mục</label>
                      <select class="form-control" name="category_id">
                          <option value="0">Chọn danh mục</option>
                          {!! $htmlOption !!}
                      </select>
                    </div>  
                    
                    <div class="form-group">
                        <label>Tags</label>
                            <select class="form-control tags_select_choose" name="tags[]" multiple="multiple">
                                @foreach($product->tags as $tag)
                                <option value="{{$tag->name}}" selected>{{ $tag->name }}</option>
                                @endforeach
                            </select>                        
                    </div>  

                    <div class="form-group">
                        <label>Colors</label>
                            <select class="form-control tags_select_choose" name="colors[]" multiple="multiple">
                                @foreach($product->colors as $color)
                                <option value="{{$color->name}}" selected>{{ $color->name }}</option>
                                @endforeach
                            </select>                        
                    </div> 

                    <div class="form-group">
                        <label>Sizes</label>
                            <select class="form-control tags_select_choose" name="sizes[]" multiple="multiple">
                                @foreach($product->sizes as $size)
                                <option value="{{$size->name}}" selected>{{ $size->name }}</option>
                                @endforeach
                            </select>                        
                    </div> 

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control-file" name="feature_image_path">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{$product->feature_image_path}}" alt="" width="150px">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Detail Image</label>
                        <input multiple type="file" class="form-control-file" name="image_path[]">
                        <div class="row mt-2">
                        @foreach($product->images as $value)
                            <div class="col-md-3">
                                <img src="{{$value->image_path}}" alt="" width="100px">
                            </div>
                        @endforeach
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" name="content" id="content" value="{{ $product->content }}"> </textarea>
                        <script type="text/javascript">
						CKEDITOR.replace("content")
					</script>
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
