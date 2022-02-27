  @extends('layouts.admin')

  @section('title')
  <title>Trang chủ</title>
  @endsection

  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ["name" => "product", "key" => 'List'])
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('products.create')}}" class="btn btn-primary mb-2">Add</a>
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Discount</th>
                  <th scope="col">Image</th>
                  <th scope="col">Category</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                <tr>
                  <th></th>
                  <td scope="row">{{$product->name}}</td>
                  <td>${{$product->price}}</td>
                  <td>{{number_format($product->discount)}}%</td>
                  <td><img src="{{$product->feature_image_path}}" width="200px"></td>
                  <td>{{optional($product->categories)->name}}</td>
                  <td>
                    <a href="{{ route('products.edit',$product->id) }}" class="btn btn-primary">Edit</a>
                    <a class="btn btn-primary delete" data-url="{{route('products.delete',$product->id)}}">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-12">
            {{ $products->links() }}
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection

  @section('js')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function actionDelete(event) {
      event.preventDefault();
      let urlRequest = $(this).data('url');
      let that = $(this);
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            type: 'GET',
            url: urlRequest,
            success: function(data) {
              that.parent().parent().remove();
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            },
            error: function() {

            }
          })
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        }
      })
    }
$(function() {
  $(document).on('click', '.delete', actionDelete);
})  
  </script>
  @endsection