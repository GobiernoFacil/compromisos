@extends('backend', ['title' => 'Crear Compromiso | Tablero de control público de seguimiento del PA15.'])

@section('content')
@include('backend_nav')
<div class="container">

  <!-- 

  * - -   N A V I G A T I O N   C O N T E N T   - - *

  -->

	<!--breadcrumb-->
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
             	<li>
             		<i class="fa fa-dashboard"></i>  <a href="/dashboard">Dashboard</a>
                </li>
                <li>
             		<i class="fa fa-tasks"></i>  <a href="/commitment">Compromisos</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i>Crear Compromiso
                </li>
            </ol>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header text-center">Crear compromiso</h1>

  <!-- 

  * - -   F O R M   C O N T E N T   - - *

  -->

  {{Form::open([
    'url'   => 'commitment',
    'class' =>'form-horizontal',
    'files' => TRUE
  ])}}
  
  <!--# de compromiso-->
  <div class="form-group">
    <label for="commitment_num" class="col-sm-2 control-label">Número de Compromiso: </label>
	  <div class="col-sm-8">
      <input type="text" name="commitment_num"  class="form-control" id="commitment_num">
	  </div>
  </div>
  
  <!--título-->
  <div class="form-group">
      <label for="title" class="col-sm-2 control-label">Título: </label>
	  <div class="col-sm-8">
      <input type="text" name="title"  class="form-control" id="title">
	  </div>
  </div>

  <!--Plan-->
  <div class="form-group">
      <label for="plan" class="col-sm-2 control-label">Plan: </label>
	  <div class="col-sm-8">
        {{Form::file('plan')}}
	  </div>
  </div>

  <!--Descripción-->
  <div class="form-group">
      <label for="description" class="col-sm-2 control-label">Descripción: </label>
	  <div class="col-sm-8">
        <textarea name="description"  class="form-control" id="description"></textarea>
	  </div>
  </div>

  <!--Características-->
  <div class="form-group">
      <label for="characteristics" class="col-sm-2 control-label">Características: </label>
	  <div class="col-sm-8">
        <textarea name="characteristics"  class="form-control" id="characteristics"></textarea>
	  </div>
  </div>

  <!--Estado-->
  <div class="form-group">
    <label for="status" class="col-sm-2 control-label">Estado: </label>
	  <div class="col-sm-8">
      <textarea name="status"  class="form-control" id="status"></textarea>
	  </div>
  </div>

  <!--Usuarios-->
  <div class="form-group">
    <label for="user" class="col-sm-2 control-label">Usuarios</label>
	  <div class="col-sm-8">
      {{Form::select('users[]', $users, FALSE, ['class'=>'form-control commitment-user'])}}
	  </div>
  </div>
  <!-- necesito pensar en algo que use menos divs!!!!!!  x_____x -->
  <div class="form-group">
    <span class="col-sm-2"></span>
    <div class="col-sm-8">
      <a href="#" id="add-user">Agregar otro usuario</a>
    </div>
  </div>


   <!--submit-->
  <div class="form-group">
  	<div class="col-sm-8 col-sm-offset-2">
    <input type="submit" class="btn btn-lg btn-primary" value="Guardar">
  	</div>
  </div>
  {{Form::close()}}
   </div>
	</div>
</div>
@stop
