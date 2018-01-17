@extends('layouts.app')

@section('content')
<div class="py-5 text-center w-100">
  <div class="mx-auto w-xxl w-auto-xs">
    <div class="px-3">
      <div>
        @include('partials.socials-icons')
      </div>
      <div class="my-3 text-sm">OR</div>
        {!! Form::open(['route' => 'register', 'class' => 'form text-left', 'role' => 'form', 'method' => 'POST'] ) !!}
          {{ csrf_field() }}
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Username', 'id' => 'name', 'required', 'autofocus']) !!}
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
          </div>
          <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
              {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name', 'id' => 'first_name']) !!}
              @if ($errors->has('first_name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('first_name') }}</strong>
                  </span>
              @endif
          </div>

          <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
              {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name', 'id' => 'last_name']) !!}
              @if ($errors->has('last_name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('last_name') }}</strong>
                  </span>
              @endif
          </div>

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'E-Mail Address', 'required']) !!}
              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Password', 'required']) !!}
              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
          </div>

          <div class="form-group">
              {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password-confirm', 'placeholder' => 'Confirm Password', 'required']) !!}
          </div>
          @if(config('settings.reCaptchStatus'))
              <div class="form-group">
                  <div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>
              </div>
          @endif
          <div class="mb-3 text-sm text-center"><span class="text-muted">By clicking Sign Up, I agree to the</span> <a href="#" data-pjax-click-state="anchor-empty">Terms of service</a> <span class="text-muted">and</span> <a href="#">Policy Privacy.</a></div>
        <p class="text-center">
          <button type="submit" class="btn primary">Register</button>
        </p>
      {!! Form::close() !!}
      <div class="py-4 text-center"><div>Already have an account? <a href="/login" class="text-primary _600">Sign in</a></div></div>
    </div>
  </div>
</div>
@endsection

@section('footer_scripts')

    <script src='https://www.google.com/recaptcha/api.js'></script>

@endsection
