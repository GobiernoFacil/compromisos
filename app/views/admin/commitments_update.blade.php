@extends('backend')

@section('content')
@include('backend_nav')
<div class="container">
	
  {{Form::open([
    'url'    => 'commitment/' . $commitment->id,
    'method' => 'PUT',
    'files'  => TRUE,
    'class'  =>'form-horizontal'
  ])}}
  <div class="bs-docs-featurette">
	<h1 class="bs-docs-featurette-title">Editar compromiso</h1>
	<hr class="half-rule">
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
      	{{Form::file('plan')}}
        @if(!empty($commitment->plan))
        <a href="/files/{{$commitment->plan}}" download>descargar</a>
        @endif
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
	</div>

   <!-- maromas nuevas -->
   @foreach($commitment->steps AS $step)
   <!-- aquí se edita la fecha límite para cada paso y se 
   generan los links para editar cada sección de los pasos -->
   <fieldset>
   <h3 class="text-center">
   	<?php  switch ($step->step_num):
	   case 1:
	       echo "<p>Primer Avance</p>";
	       break;
	   case 2:
	       echo "<p>Segundo Avance</p>";
	       break;
	   case 3:
	       echo "<p>Tercer Avance</p>";
	       break;
	   case 4:
	       echo "<p>Resultado Final</p>";
	       break;
	   default:
	endswitch;?>
  </h3>
    <div class="form-group">
      <label for="step-{{$step->step_num}}" class="col-sm-2 control-label">Fecha límite</label>
      <div class="col-sm-8">
	      <input type="text" name="step-{{$step->step_num}}" class="form-control" value="{{$step->ends}}">
      </div>
    </div>
      <?php $r=1;?>
      @foreach($step->objectives AS $objective)
      <div class="form-group">
      	<label class="col-sm-2 control-label">Actividad {{$r++}}:</label>
      
	  	<div class="col-sm-8">
	  		@if ($objective->title)
      		<h5>{{ $objective->title }}</h5>
      		<?php  switch ($objective->status):
				    case 'a':
				        $status = "sin_avance";
				        $status_t = " Sin avance";
				        break;
				    case 'b':
				        $status = "proceso";
				        $status_t = "En proceso";
				        break;
				    case 'c':
				        $status = "completado";
				        $status_t = "Completado";
				        break;
				    default:
				        $status = "sin_avance";
				        $status_t = " Sin avance";
				 endswitch;?>
      		<p><span class="{{$status}}"> </span> {{$status_t}} | {{link_to('objective/' . $objective->id . '/edit', 'Editar Actividad')}}</p>
      		@else 
      			<h5>{{link_to('objective/' . $objective->id . '/edit', 'Agregar Actividad')}}</h5>
      		
      		@endif
	  	</div>
      </div>
      @endforeach
   </fieldset>
   <hr class="half-rule">
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
