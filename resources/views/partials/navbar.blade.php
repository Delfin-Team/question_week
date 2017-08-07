<nav>
  @if (Auth::guest())
    <div class="nav-wrapper indigo accent-3">
      <a href="{{url('/')}}" class="brand-logo"> &nbsp Pregunta de la semana</a>
    </div>
  @else

	    <div class="nav-wrapper indigo accent-3">
	      <a href="{{route('groups.index')}}" class="brand-logo">&nbsp Pregunta de la Semana</a>
	      <a href="#" data-activates="mobile-demo2" class="button-collapse"><i class="material-icons">menu</i></a>
	      <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a class="dropdown-button" href="#!" data-activates="dropdown1">{{Auth::user()->email}}<i class="material-icons right">arrow_drop_down</i></a></li>
          <li>
            <ul id="dropdown1" class="dropdown-content">
              <li><a href="{{url('/profile')}}">
                <i class="material-icons">account_box</i>
                Mi perfil</a></li>
              <li class="divider"></li>

              <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    <i class="material-icons">power_settings_new</i>
                    Salir
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
	      </ul>

	      <ul class="side-nav" id="mobile-demo2">
          <li><a href="#" class="deactivate">Opciones</a></li>
          <li class="divider"></li>
	        <li><a href="{{route('groups.index')}}"><i class="material-icons">group</i>Grupos</a></li>
          <li><a href="{{url('/profile')}}"><i class="material-icons">account_circle</i>Mi Perfil</a></li>
          <li>
              <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  <i class="material-icons">power_settings_new</i>
                  Salir
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
          </li>

	      </ul>
	    </div>
  @endif
</nav>
