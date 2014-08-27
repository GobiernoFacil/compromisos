<div class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          {{link_to('dashboard', 'Tablero de control público de seguimiento del PA15', array('class'=>'navbar-brand'))}}
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li {{ Request::is( 'dashboard') ? 'class="active"' : '' }}>{{link_to('dashboard', 'Tablero de Seguimiento')}}</li>
            <li {{ Request::is( 'commitment') ? 'class="active"' : '' }}>{{link_to('commitment', 'Compromisos')}}</li>
            <li {{ Request::is( 'user') ? 'class="active"' : '' }}>
            @if(Auth::user()->is_admin)
              {{link_to('user', 'Usuarios')}}
            @else
              {{link_to('user/' . Auth::user()->id . '/edit', 'Mi perfil')}}
            @endif
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li></li>
            <li ><a>Hola {{Auth::user()->name}}</a></li>
            <li class="active">{{link_to('logout', 'salir')}}</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
</div>
<div id="alianza"></div>