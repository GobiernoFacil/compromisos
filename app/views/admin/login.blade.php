@extends('backend')

<!-- THE LOGIN FORM -->
@section('content')
<div class="container">
 <div class="row">
 	 <div class="col-sm-6 col-md-4 col-md-offset-4">
 	 	<h1 class="login-title">Ingresa al Tablero de Compromisos</h1>

  {{Form::open([
  	"class"=> "form-signin"
  ])}}
  <p>
    <label for="username">correo:</label>
    <input type="text" class="form-control" name="username" id="username">
  </p>
  <p>
    <label for="password">contraseña:</label>
    <input type="password" class="form-control" name="password" id="password">
  </p>
  <p><input type="submit" class="btn btn-lg btn-primary btn-block" value="Acceder"></p>
  {{Form::close()}}
 	 </div>
 </div>
</div>
@stop
