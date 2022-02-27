  @extends('layouts.admin')

  @section('title')
  <title>Settings</title>
  @endsection

  @section('css')
  <style>
      .dropdown-menu>li>a {
          display: block;
          padding: 3px 20px;
          clear: both;
          font-weight: normal;
          line-height: 20px;
          color: #333333;
          white-space: nowrap;
      }
      .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus, .dropdown-submenu:hover > a, .dropdown-submenu:focus > a {
    color: #ffffff;
    text-decoration: none;
    background-color: #0081c2;
    background-image: -moz-linear-gradient(top, #0088cc, #0077b3);
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0077b3));
    background-image: -webkit-linear-gradient(top, #0088cc, #0077b3);
    background-image: -o-linear-gradient(top, #0088cc, #0077b3);
    background-image: linear-gradient(to bottom, #0088cc, #0077b3);
    background-repeat: repeat-x;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff0088cc', endColorstr='#ff0077b3', GradientType=0);
}
  </style>
  @endsection

  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @include('partials.content-header', ["name" => "settings", "key" => 'List'])
      <!-- /.content-header -->
      <!-- Main content -->
      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                      <div class="btn-group">
                          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                              Add setting
                              <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
                              <li><a href="{{ route('settings.create') . '?type=Text'}}">Text</a></li>
                              <li><a href="{{ route('settings.create') . '?type=Textarea'}}">Textarea</a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Config key</th>
                                  <th scope="col">Config value</th>
                                  <th scope="col">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($settings as $setting)
                              <tr>
                                  <th scope="row">{{ $setting->id }}</th>
                                  <td>{{ $setting->config_key }}</td>
                                  <td>{{ $setting->config_value }}</td>
                                  <td>
                                      <a href="{{ route('settings.edit', $setting->id). '?type=' . $setting->type }}" class="btn btn-primary">Edit</a>
                                      <a href="{{ route('settings.delete', $setting->id) }}" class="btn btn-primary">Delete</a>
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