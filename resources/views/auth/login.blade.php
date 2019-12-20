@extends('layouts.admin')

@section('content')
<div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="{{route('login')}}" method="post">
      @csrf
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" value="{{old('password')}}" placeholder="Password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="row justify-content-center">

      <div class="col-md-4 text-center">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
      </div>
      
  </div>
</form>
<br>
<hr>
<a href="{{route('password.request')}}">I forgot my password</a>
</div>
@endsection
<!-- <div class="social-auth-links text-center">
  <p>- OR -</p>
  <a href="#" class="btn btn-block btn-social btn-facebook btn-flat btn-primary"><i class="fa fa-facebook"></i> Sign in using
  Facebook</a>
  <a href="#" class="btn btn-block btn-social btn-google btn-flat btn-danger"><i class="fa fa-google-plus"></i> Sign in using
  Google+</a>
</div> -->
<!-- /.social-auth-links -->