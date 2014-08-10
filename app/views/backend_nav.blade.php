<div class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Tablero de control público de seguimiento del PA15 </a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active">{{link_to('admin', 'admin')}}</li>
            <li>{{link_to('admin/compromisos', 'compromisos')}}</li>
            <li>{{link_to('admin/usuarios', 'usuarios')}}</li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li></li>
            <li ><a>Hola Arturo</a></li>
            <li class="active">{{link_to('logout', 'salir')}}</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
</div>