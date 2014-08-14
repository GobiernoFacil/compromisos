@extends('backend')

@section('content')
@include('backend_nav')

	<h1>Editar objetivo {{$objective->event_num}} (Paso {{$objective->step_num}})</h1>
  {{Form::model($objective, [
    'route'  =>['objective.update', $objective->id],
    'method' => 'PUT'
  ])}}
  <!--TITLE-->
  <p>
    {{Form::label('title', 'Título: ')}}
    {{Form::textarea('title')}}
  </p>  
  <!--DESCRIPTION-->
  <p>
    {{Form::label('description', 'descripción: ')}}
    {{Form::textarea('description')}}
  </p>

  <!--URL-->
  <p>
    {{Form::label('url', 'url: ')}}
    {{Form::text('url')}}
  </p>

  <!--AGENT-->
  <p>
    {{Form::label('agent', 'Agente: ')}}
    {{Form::text('agent')}}
  </p>

  <!--AGENT'S URL-->
  <p>
    {{Form::label('agent_url', 'Agente URL: ')}}
    {{Form::text('agent_url')}}
  </p>

  <!--ADVANCE DESCRIPTION-->
  <p>
    {{Form::label('advance_description', 'Descripción del avance: ')}}
    {{Form::textarea('advance_description')}}
  </p>

  <!--FINISH DESCRIPTION-->
  <p>
    {{Form::label('finish_description', 'Descripción final: ')}}
    {{Form::textarea('finish_description')}}
  </p>

  <!-- SUBMIT -->
  <p>
    {{Form::submit('Editar')}}
  </p>
  
  {{Form::close()}}
@stop