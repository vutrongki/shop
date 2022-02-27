@extends('layouts.admin')

@section('title')
<title>News</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partials.content-header', ["name" => "news", "key" => 'List'])
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('news.create')}}" class="btn btn-primary mb-2">Add</a>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col" width="500px">Description</th>
                <th scope="col">Content</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($news as $new)
              <tr>
                <th></th>
                <td scope="row">{{$new->name}}</td>
                <td>{{$new->description}}</td>
                <td>{!!$new->content!!}</td>
                <td><img src="{{$new->image}}" width="200px"></td>
                <td>
                  <a href="{{route('news.edit', $new->id)}}" class="btn btn-primary">Edit</a>
                  <a href="{{route('news.delete', $new->id)}}" class="btn btn-primary delete" data-url="">Delete</a>
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