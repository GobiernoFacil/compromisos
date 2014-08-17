@extends('backend', ['title' => 'Crear Compromiso | Tablero de control público de seguimiento del PA15.'])

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
  {{Form::open([
    'url'   => 'commitment',
    'class' =>'form-horizontal',
    'files' => TRUE
  ])}}
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
  <!--Usuario de Gobierno-->
  <div class="form-group">
      <label for="government_user" class="col-sm-2 control-label">Usuario de gobierno</label>
	  <div class="col-sm-8">
      {{Form::select('government_user', $government_users, FALSE, ['class'=>'form-control'])}}
	  </div>
   </div>
   <!--Usuario externo-->
  <div class="form-group">
      <label for="society_user" class="col-sm-2 control-label">Usuario externo</label>
	  <div class="col-sm-8">
      {{Form::select('society_user', $society_users, FALSE, ['class'=>'form-control'])}}
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
