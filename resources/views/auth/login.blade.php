@extends('layouts.app')

@section('content')
<div class="py-5 text-center w-100">
  <div class="mx-auto w-xxl w-auto-xs">
    <div class="px-3">
      <div>
        @include('partials.socials-icons')
      </div>
      <div class="my-3 text-sm">OR</div>
      <form class="form" role="form" method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}
        <div class="form-group">
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
            <input id="password" type="password" class="form-control" name="password" required>
        </div>
        <div class="mb-3">
          <label class="md-check"><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><i class="primary"></i> Keep me signed in</label>
        </div>
        <button type="submit" class="btn primary">Sign in</button>
      </form>
      <div class="my-4">
        <a href="{{ route('password.request') }}" class="text-primary _600">Forgot password?</a>
      </div>
      <div>
        Do not have an account? <a href="/register" class="text-primary _600">Sign up</a>
      </div>
    </div>
  </div>
</div>
@endsection
