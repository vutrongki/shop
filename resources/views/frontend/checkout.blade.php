@extends('layouts.client')
@section('content')
<div class="container">
<form action="{{route('checkout.post')}}" method="post">
	@csrf
  <div class="form-group">
    <label for="address">Address:</label>
    <input type="text" name="address" class="form-control" placeholder="Địa chỉ" id="address">
  </div>
  <div class="form-group">
    <label for="address">Phone:</label>
    <input type="text" name="phone" class="form-control" placeholder="Phone" id="phone">
  </div>  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>	
</div>
@endsection
@section('js')
<script src="{{ asset('shop/js/main.js') }}"></script>
@endsection