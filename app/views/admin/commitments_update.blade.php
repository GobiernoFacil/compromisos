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
      <input type="text" name="title"  class="form-control" id="title" value="{{$commitment->title}}">
	  </div>
  </div>
  <!--Plan-->
  <div class="form-group">
      <label for="plan" class="col-sm-2 control-label">Plan: </label>
	  <div class="col-sm-8">
      	<input type="text" name="plan"  class="form-control" id="plan" value="{{$commitment->plan}}">
	  </div>
  </div>
  <!--Usuario de Gobierno-->
  <div class="form-group">
      <label for="government_user" class="col-sm-2 control-label">Usuario de gobierno</label>
	  <div class="col-sm-8">
      {{Form::select('government_user', $government_users, $commitment->government_user, ['class'=>'form-control'])}}
	  </div>
   </div>
   <!--Usuario externo-->
  <div class="form-group">
      <label for="society_user" class="col-sm-2 control-label">Usuario externo</label>
	  <div class="col-sm-8">
      {{Form::select('society_user', $society_users, $commitment->society_user, ['class'=>'form-control'])}}
	  </div>
   </div>

   <!-- maromas nuevas -->
   @foreach($commitment->steps AS $step)
   <!-- aquí se edita la fecha límite para cada paso y se 
   generan los links para editar cada sección de los pasos -->
   <fieldset>
    <h4>Paso {{$step->step_num}}</h4>
    <p>
      <label>fecha límite</label>
      <input type="text" name="step-{{$step->step_num}}">
    </p>
   </fieldset>
   @endforeach
   <!--submit-->
  <div class="form-group">
  	<div class="col-sm-8 col-sm-offset-2">
    <input type="submit" class="btn btn-lg btn-primary" value="Guardar">
  	</div>
  </div>
  {{Form::close()}}
</div>
@stop
