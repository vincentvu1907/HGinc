@extends('layouts.admin')

@section('content')

<div class="login-box-body">
    <p class="login-box-msg">Reset password</p>

    <form action="{{ route('password.email') }}" method="post">
        @csrf
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
   
    <div class="row justify-content-center">

      <div class="col-md-6 text-center">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Send email</button>
      </div>
      
  </div>
</form>
<br>
<hr>
<a href="{{route('login')}}">Sign in ?</a>
</div>
@endsection
