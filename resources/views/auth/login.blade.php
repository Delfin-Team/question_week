@extends('layouts.master')

@section('content')
<div class="container blue lighten-5 z-depth-3" id="main" style="margin-padding:10px;">
  <!--h5 class="indigo center-align"><font color="white">Inicia sesión</font></h5-->
  <div class="container border-radius: 10px">
    <div class="row">
      <div class="col s9 offset s3">
        <!--Materialize Components Forms-->
        <div class="row">
          <form class="col s12" action="{{route('login')}}" method="POST">
            {{ csrf_field() }}
            <div class="row">
              <div class="input-field col s12">
                <input id="email" type="email" class="validate" name="email">
                <label for="email" data-error="wrong" data-success="right">
                  <i class="fa fa-user-o"></i>
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
                  <i class="fa fa-key"></i>
                  Password</label>
                <!--errors for password-->
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="row">
              <div class=""><a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a></div>
            </div>
            <div class="center-align">
              <input type="submit" name="" value="Entrar" class="btn waves-effect waves-light z-depth-5">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <hr>

</div>
@endsection
