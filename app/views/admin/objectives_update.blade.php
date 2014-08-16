@extends('backend', ['title' => 'Editar Actividad | Tablero de control público de seguimiento del PA15.'])

@section('content')
@include('backend_nav')
<?php  switch ($objective->step_num):
	case 1: $step_num = "Primer Avance"; break;
   case 2:        $step_num = "Segundo Avance";break;
   case 3:        $step_num = "Tercer Avance";break;
   case 4:        $step_num = "Resultado Final";break;
   default:        $step_num ="Resultado Final";break;
endswitch;?>
<div class="container">
 <div class="bs-docs-featurette">
	<h1 class="bs-docs-featurette-title">Editar Actividad {{$objective->event_num}} <small>({{$step_num}})</small></h1>
 </div>
	<hr class="half-rule">
  {{Form::model($objective, [
    'route'  =>['objective.update', $objective->id],
    'method' => 'PUT',
    'class'  =>'form-horizontal'
  ])}}
  <!--TITLE-->
  <div class="form-group">
    {{Form::label('title', 'Actividad: ', array('class'=>'col-sm-2 control-label'))}}
	<div class="col-sm-8">
	    {{Form::textarea('title', $objective->title,array('class'=>'form-control'))}}
	</div>
  </div>  
  <!--DESCRIPTION-->
  <div class="form-group">
    {{Form::label('description', 'Objetivo: ', array('class'=>'col-sm-2 control-label'))}}
	<div class="col-sm-8">
    {{Form::textarea('description', $objective->description,array('class'=>'form-control'))}}
    </div>  
  </div>  
  <!--URL-->
  <div class="form-group">
    {{Form::label('url', 'url: ', array('class'=>'col-sm-2 control-label'))}}
	<div class="col-sm-8">
    {{Form::text('url', $objective->url, array('class'=>'form-control'))}}
	</div>
  </div>
  <!--AGENT-->
  <div class="form-group">
    {{Form::label('agent', 'Responsable: ', array('class'=>'col-sm-2 control-label'))}}
	<div class="col-sm-8">
    {{Form::text('agent', $objective->agent, array('class'=>'form-control'))}}
	</div>
  </div>
  <!--AGENT'S URL-->
  <div class="form-group">
    {{Form::label('agent_url', 'Responsable URL: ', array('class'=>'col-sm-2 control-label'))}}
	<div class="col-sm-8">
    {{Form::text('agent_url', $objective->agent_url, array('class'=>'form-control'))}}
	</div>
  </div>
  <!--ADVANCE DESCRIPTION-->
  <div class="form-group">
    {{Form::label('advance_description', 'Descripción del avance: ', array('class'=>'col-sm-2 control-label'))}}
	<div class="col-sm-8">
    {{Form::textarea('advance_description', $objective->advance_description, array('class'=>'form-control'))}}
	</div>
  </div>
  <!--FINISH DESCRIPTION-->
  <div class="form-group">
    {{Form::label('finish_description', 'Descripción final: ', array('class'=>'col-sm-2 control-label'))}}
	<div class="col-sm-8">
    {{Form::textarea('finish_description', $objective->finish_description, array('class'=>'form-control'))}}
	</div>
  </div>
  <!-- SUBMIT -->
  <div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
    {{Form::submit('Editar', array('class'=>'btn btn-lg btn-primary'))}}
	</div>
  </div>
  
  {{Form::close()}}
</div>
@stop