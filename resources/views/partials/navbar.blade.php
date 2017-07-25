<nav>
  @if (Auth::guest())
    <div class="nav-wrapper indigo accent-3">
      <a href="index.html" class="brand-logo"> &nbsp Pregunta de la semana</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="{{route('login')}}">Iniciar sesión</a></li>
        <li><a href="{{route('register')}}">Registro</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="login.html">Iniciar sesión</a></li>
        <li><a href="register.html">Registro</a></li>
      </ul>
    </div>
  @else

	    <div class="nav-wrapper indigo accent-3">
	      <a href="{{route('groups.index')}}" class="brand-logo">&nbsp Pregunta de la Semana</a>
	      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
	      <ul id="nav-mobile" class="right hide-on-med-and-down">
	        <li><a href="{{route('questions.create')}}">Proponer</a></li>
	        <li><a href="">Preguntas ganadoras</a></li>
	        <li><a href="votes.html">Votos</a></li>
	        <li><a href="{{route('groups.index')}}">Grupos</a></li>
          <li>
              <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
          </li>
	      </ul>
	      <ul class="side-nav" id="mobile-demo">
	        <li><a href="propose.html"><i class="material-icons">lightbulb_outline</i>Proponer</a></li>
	        <li><a href="winquestions.html"><i class="material-icons">timeline</i>Preguntas ganadoras</a></li>
	        <li><a href="votes.html"><i class="material-icons">thumbs_up_down</i>Votos</a></li>
	        <li><a href="{{route('groups.index')}}"><i class="material-icons">group</i>Grupos</a></li>
          <li>
              <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
          </li>

	      </ul>
	    </div>
  @endif
</nav>

@section('extra-js')
<script type="text/javascript">
  $( document ).ready(function(){
    $(".button-collapse").sideNav();
  })
</script>
@endsection
