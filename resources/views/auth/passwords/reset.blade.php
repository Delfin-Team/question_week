@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
      @if (session('status'))
              {{ session('status') }}
      @endif

      <form method="POST" action="{{ route('password.request') }}">
          {{ csrf_field() }}
          <input type="hidden" name="token" value="{{ $token }}">
          <div class="input-field col s12" >
            <input id="email" type="email" class="validate" name="email">
            <label for="email">
              <i class="material-icons">email</i>
              Email
            </label>
            <!--errors for password-->
            @if ($errors->has('email'))
                    <strong>{{ $errors->first('email') }}</strong>
            @endif
          </div>
          <div class="input-field col s12" >
            <input id="password" type="password" class="validate" name="password">
            <label for="password">
              <i class="material-icons">vpn_key</i>
              Password
            </label>
            <!--errors for password-->
            @if ($errors->has('password'))
                    <strong>{{ $errors->first('password') }}</strong>
            @endif
          </div>
          <div class="input-field col s12" >
            <input id="password-confirm" type="password" class="validate" name="password_confirmation">
            <label for="password-confirm">
              <i class="material-icons">email</i>
              Email
            </label>
            <!--errors for password-->
            @if ($errors->has('password_confirmation'))
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
            @endif
          </div>

          <div class="center-align">
              <button type="submit" class="btn btn-waves">
                  Resetear contraseña
              </button>
          </div>

      </form>



    </div>
</div>
@endsection
