@extends('layouts.client')
@section('content')
<div class="container mb-5">
    <div class="col-md-6">
        <form method="post" action="{{ route('register.post')}}">
            @csrf
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('shop/js/main.js') }}"></script>
@endsection