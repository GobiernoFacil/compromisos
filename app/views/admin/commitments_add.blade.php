@extends('backend')

@section('content')
@include('backend_nav')
<div class="container">
	<h1>Crear compromiso</h1>
  {{Form::open(['url' => 'commitment',
  'class'=>'form-horizontal'
  ])}}
  <!--título-->
  <div class="form-group">
      <label for="title" class="col-sm-2 control-label">Título: </label>
	  <div class="col-sm-8">
        <textarea name="title"  class="form-control" id="title"></textarea>
	  </div>
  </div>
  <!--Plan-->
  <div class="form-group">
      <label for="plan" class="col-sm-2 control-label">Plan: </label>
	  <div class="col-sm-8">
        <textarea name="plan"  class="form-control" id="plan"></textarea>
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
@stop
