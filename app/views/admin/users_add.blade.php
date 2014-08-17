@extends('backend', ['title' => 'Crear Usuario | Tablero de control público de seguimiento del PA15.'])

@section('content')
@include('backend_nav')
<div class="container">
	<!--breadcrumb-->
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
             	<li>
             		<i class="fa fa-dashboard"></i>  <a href="/dashboard">Dashboard</a>
                </li>
                <li>
             		<i class="fa fa-user"></i>  <a href="/user">Usuarios</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Agregar Usuario
                </li>
            </ol>
		</div>
	</div>
	 <div class="row">
 	<div class="col-lg-12">

	<h1 class="page-header text-center"> Agregar Usuario</h1>
  {{Form::open(['url' => 'user',
  'class' => 'form-horizontal'
  ])}}
  	<div class="form-group">
      <label for="username" class="col-sm-2 control-label">Correo: </label>
	  <div class="col-sm-8">
      	<input type="text" name="username"  class="form-control" id="username">
      </div>
    </div>
  	<div class="form-group">
      <label for="password"  class="col-sm-2 control-label">Password: </label>
	  <div class="col-sm-8">
     	 <input type="password" name="password" class="form-control" id="password">
	  </div>
    </div>
  	<div class="form-group">
      <label for="name" class="col-sm-2 control-label">Nombre: </label>
	  <div class="col-sm-8">
      	<input type="text" class="form-control"  name="name" id="name">
	  </div>
    </div>
    <!--cargo-->
  	<div class="form-group">
      <label for="charge" class="col-sm-2 control-label">Cargo: </label>
	  <div class="col-sm-8">
      	<input type="text" name="charge" class="form-control" id="charge">
	  </div>
  	</div>
    <!--Teléfono-->
  	<div class="form-group">
      <label for="phone" class="col-sm-2 control-label">Teléfono: </label>
	  <div class="col-sm-8">
      	<input type="text" name="phone" class="form-control" id="phone">
	  </div>    
  	</div>
    <!--Tipo-->
  	<div class="form-group">
      <label for="user_type" class="col-sm-2 control-label">Tipo: </label>
	  <div class="col-sm-8">
      	<input type="radio" name="user_type" checked value="society">ciudadano
      	<input type="radio" name="user_type" value="government">servidor público
	  </div>
  	</div>
    <!--admin-->
  	<div class="form-group">
      <label for="is_admin" class="col-sm-2 control-label">Es admin:</label> 
	  <div class="col-sm-8">
    	  <input type="checkbox" name="is_admin" value="1">
	  </div>
  	</div>
    <!--guardar-->
    <div class="form-group">
	  <div class="col-sm-8 col-sm-offset-2">
		  <input type="submit" class="btn btn-lg btn-primary" value="guardar">
	  </div>
    </div>
  {{Form::close()}}
 	</div>
	 </div>
</div>
@stop
