@extends('admin.admin_layouts')
@section('admin_content')

<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
      <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">EcoRantu <span class="tx-info tx-normal">admin</span></div>
      <div class="tx-center mg-b-60">Professional Admin Template Design</div>
      <form method="POST" action="{{ route('login') }}">
        @csrf
      <div class="form-group">
        <label for="email" class="tx-info tx-12 d-block mg-t-10">{{ __('E-Mail Address') }}</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email">
      </div><!-- form-group -->
      @error('email')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
      <div class="form-group">
        <label for="password" class="tx-info tx-12 d-block mg-t-10">{{ __('Password') }}</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password">
    
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
      </div><!-- form-group -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

        <label class="form-check-label" for="remember">
            {{ __('Remember Me') }}
        </label>
    </div>
      <button type="submit" class="btn btn-info btn-block">  {{ __('Login') }}</button>
    </form>

      <div class="mg-t-60 tx-center">Not yet a member? <a href="page-signup.html" class="tx-info"> @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif</a></div>
    </div><!-- login-wrapper -->
  </div><!-- d-flex -->
@endsection();