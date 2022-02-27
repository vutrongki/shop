@extends('layouts.admin')

@section('title')
<title>Add news</title>
@endsection

@section('css')
<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<!-- load file ckeditor.js -->
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>

@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'news', 'key' => 'Edit'])
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{route('news.update', $new->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $new->name }}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" class="form-control" name="description"  cols="30" rows="10">{{ $new->description }}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror                              
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control-file" name="image">
                        </div>

                        <div class="form-group">
                            <label>Content</label>
                            <textarea class="form-control" name="content" id="content" value="{{ $new->content }}"> </textarea>
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