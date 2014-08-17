@extends('backend', ['title' => 'Editar Compromiso | Tablero de control público de seguimiento del PA15.'])

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
                    <i class="fa fa-edit"></i>Editar Compromiso
                </li>
            </ol>
		</div>
	</div>
	
<div class="row">
		<div class="col-lg-12">
  {{Form::open([
    'url'    => 'commitment/' . $commitment->id,
    'method' => 'PUT',
    'files'  => TRUE,
    'class'  =>'form-horizontal'
  ])}}
  			<h1 class="page-header text-center">Editar compromiso</h1>	

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
    <!--Descripción-->
  <div class="form-group">
      <label for="description" class="col-sm-2 control-label">Descripción: </label>
	  <div class="col-sm-8">
        <textarea name="description"  class="form-control" id="description"> {{$commitment->description}}</textarea>
	  </div>
  </div>
  <!--Características-->
  <div class="form-group">
      <label for="characteristics" class="col-sm-2 control-label">Características: </label>
	  <div class="col-sm-8">
        <textarea name="characteristics"  class="form-control" id="characteristics">{{$commitment->characteristics}}</textarea>
	  </div>
  </div>
  <!--Estado-->
  <div class="form-group">
      <label for="status" class="col-sm-2 control-label">Estado: </label>
	  <div class="col-sm-8">
        <textarea name="status"  class="form-control" id="status">{{$commitment->status}}</textarea>
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
   <h3 class="text-center">
   	<?php  switch ($step->step_num):
	   case 1:
	       echo "<p>Primer Meta</p>";
	       break;
	   case 2:
	       echo "<p>Segunda Meta</p>";
	       break;
	   case 3:
	       echo "<p>Tercer Meta</p>";
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
	      <input type="text" id="step-{{$step->step_num}}" name="step-{{$step->step_num}}" class="form-control" value="{{$step->ends}}">
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
   @endforeach
   <!--submit-->
  <div class="form-group">
  	<div class="col-sm-8 col-sm-offset-2">
    <input type="submit" class="btn btn-lg btn-primary" value="Guardar">
  	</div>
  </div>
  {{Form::close()}}
  			<hr class="half-rule">

</div>
</div>
</div>
@stop
