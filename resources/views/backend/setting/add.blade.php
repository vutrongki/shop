  @extends('layouts.admin')

  @section('title')
  <title>Add settings</title>
  @endsection

  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'settings', 'key' => 'Add'])
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form action="{{ route('settings.store') . '?type=' . request()->type }}" method="post">
              @csrf
              <div class="form-group">
                <label>Config key</label>
                <input type="text" class="form-control" name="config_key">
                @error('config_key')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              @if(request()->type === 'Text')
              <div class="form-group">
                <label>Config value</label>
                <input type="text" class="form-control" name="config_value">
                @error('config_value')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              @elseif(request()->type === 'Textarea')
              <div class="form-group">
                <label>Config value</label>
                <textarea name="config_value" class="form-control" id="" cols="30" rows="10"></textarea>
                @error('config_value')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              @endif

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