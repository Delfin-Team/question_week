@extends('layouts.master')

@section('content')
  <div class="card">
    <div class="card-content">
      <h3 class="">Bienvenido</h3>
    </div>
    <div class="card-tabs">
      <ul class="tabs tabs-fixed-width">
        <li class="tab"><a href="#loginform" class="active blue-text">
          <i class="material-icons">account_circle</i>
          Entrar</a></li>
        <li class="tab"><a  href="#registerform" class="blue-text">
          <i class="material-icons">person_add</i>
          Registrarse</a></li>
      </ul>
    </div>
    <div class="card-content grey lighten-4">
      <div id="loginform">
        <form class="col s12" action="{{route('login')}}" method="POST">
          {{ csrf_field() }}
          <div class="row">
            <div class="input-field col s12">
              <input id="email" type="email" class="validate" name="email">
              <label for="email" data-error="wrong" data-success="right">
                <i class="material-icons">email</i>
                Email</label>
              <!--error for email-->
              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12" >
              <input id="password" type="password" class="validate" name="password">
              <label for="password">
                <i class="material-icons">vpn_key</i>
                Password</label>
              <!--errors for password-->
              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="center-align">
            <button type="submit" name="button" class="btn btn-waves">
              <i class="material-icons">send</i>
              Entrar</button>
              <hr>
              <a href="{{url('/redirect')}}">Entrar con Facebook</a>
              <a href="{{route('password.request')}}">¿Olvidaste tu contraseña?</a>
          </div>
        </form>
      </div><!--end login-->
      <div id="registerform">
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="input-field col s12">
              <input id="name" name="name" type="text" class="validate" value="{{ old('name') }}" required autofocus>
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
              <input id="email" name="email" type="email" class="validate" value="{{ old('email') }}" required>
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
              <input id="password" name="password" type="password" class="validate" value="{{ old('password') }}" required>
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
              <input id="password-confirm" name="password_confirmation" type="password" class="validate" required>
              <label for="first_name">
                <i class="material-icons">vpn_key</i>
                Confirma tu contraseña
              </label>
            </div>
            <div class="center-align">
              <button type="submit" class="btn btn-waves">
                <i class="material-icons">add</i>
                Registrarse</button>
            </div>

        </form>
      </div>
    </div>
  </div>


@endsection
