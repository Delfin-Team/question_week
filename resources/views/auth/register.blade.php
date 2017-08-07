@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row" style="margin-top:25px;">
        <div class="col s12 m6 l8 xl8 m6 l8 xl8 offset-m3 offset-l2 offset-xl2">
          <form class="form-horizontal" method="POST" action="{{ route('register') }}">
              {{ csrf_field() }}
              <div class="input-field col s12">
                <input placeholder="nombre" id="name" name="name" type="text" class="validate" value="{{ old('name') }}" required autofocus>
                <label for="name">
                  <i class="material-icons">face</i>
                  Nombre
                </label>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>
              <div class="input-field col s12">
                <input placeholder="email" id="email" name="email" type="email" class="validate" value="{{ old('email') }}" required>
                <label for="email">
                  <i class="material-icons">email</i>
                  Email
                </label>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="input-field col s12">
                <input placeholder="Contraseña" id="password" name="password" type="password" class="validate" value="{{ old('password') }}" required>
                <label for="password">
                  <i class="material-icons">vpn_key</i>
                  Contraseña
                </label>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
              <div class="input-field col s12">
                <input placeholder="" id="password-confirm" name="password_confirmation" type="password" class="validate" required>
                <label for="first_name">
                  <i class="material-icons">vpn_key</i>
                  Confirma tu contraseña
                </label>
              </div>
              <div class="input-field col s12">
                <div class="col m6 offset-m3">
                  <button type="submit" class="btn btn-waves">Registrarse</button>
                </div>
              </div>

          </form>
        </div>
    </div>
</div>
@endsection
