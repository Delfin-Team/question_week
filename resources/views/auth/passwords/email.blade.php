@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
      @if (session('status'))
          <!--div class="alert alert-success"-->
              {{ session('status') }}
          <!--/div-->
      @endif

      <form method="POST" action="{{ route('password.email') }}">
          {{ csrf_field() }}
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
          <div class="center-align">
            <button type="submit" class="btn btn-waves">
                <i class="material-icons">send</i>
                Enviar link para resetear contraseña
            </button>
          </div>

      </form>

    </div>
</div>
@endsection
