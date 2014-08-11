@extends('backend')

@section('content')
@include('backend_nav')
<div class="container">
	<h1 class="title"> Agregar Usuario</h1>
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
    <p>
      <label for="name">Nombre: </label>
      <input type="text" name="name" id="name">
    </p>
    <p>
      <label for="charge">Cargo: </label>
      <input type="text" name="charge" id="charge">
    </p>
    <p>
      <label for="phone">Teléfono: </label>
      <input type="text" name="phone" id="phone">
    </p>
    <p>
      <label for="user_type">Tipo: </label>
      <input type="radio" name="user_type" checked value="society">ciudadano
      <input type="radio" name="user_type" value="government">servidor público
    </p>
    <p>
      <label>Es admin: <input type="checkbox" name="is_admin" value="1"></label>
    </p>

    <p><input type="submit" value="guardar"></p>
  {{Form::close()}}
</div>
@stop
