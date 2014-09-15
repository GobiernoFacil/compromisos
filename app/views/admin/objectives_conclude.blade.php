@extends('backend', ['title' => 'Finalizar Actividad | Tablero de control público de seguimiento del PA15.'])

@section('content')
@include('backend_nav')
<?php  switch ($objective->step_num):
  case 1:  $step_num = "Primer Meta"; break;
  case 2:  $step_num = "Segunda Meta";break;
  case 3:  $step_num = "Tercer Meta";break;
  case 4:  $step_num = "Resultado Final";break;
  default: $step_num = "Resultado Final";break;
endswitch;?>
<!-- 

  * - -   N A V I G A T I O N   C O N T E N T   - - *

  -->
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
          <i class="fa fa-edit"></i> 
          Finalizar 
          @if($objective->step_num == 4) 
            {{$step_num}}
          @else
            Actividad {{$objective->event_num}} ({{$step_num}})
          @endif
        </li>
      </ol>
		</div>
	</div>
  <div class="row">
    <div class="col-lg-12">
	    <h1 class="page-header text-center">
        Finalizar 
        @if($objective->step_num == 4) 
          {{$step_num}}
        @else
          Actividad {{$objective->event_num}} <small>({{$step_num}})</small>
        @endif
      </h1>

  <!-- 

  * - -   F O R M   C O N T E N T   - - *

  -->

  {{Form::model($objective, [
    'route'  =>['objective.update', $objective->id],
    'method' => 'PUT',
    'files'  => TRUE,
    'class'  =>'form-horizontal'
  ])}}


  @if($objective->step_num != 4)
    <!--TITLE / ACTIVITY-->
    <div class="form-group">
      {{Form::label('title', 'Actividad: ', array('class'=>'col-sm-2 control-label'))}}
	    <div class="col-sm-8">
	  	  {{$objective->title}}
	    </div>
    </div>  

    <!--DESCRIPTION/OBJECTIVE-->
    <div class="form-group">
      {{Form::label('description', 'Indicador: ', array('class'=>'col-sm-2 control-label'))}}
	    <div class="col-sm-8">
		    {{$objective->description}}
	    </div>  
    </div> 
  @endif 



  @if($objective->step_num != 4)
    <!--AGENT-->
  	@if ($objective->agent)
  	  <div class="form-group">
  	    {{Form::label('agent', 'Responsable: ', array('class'=>'col-sm-2 control-label'))}}
  		  <div class="col-sm-8">
  	      {{ $objective->agent}}
  		  </div>
  	  </div>
  	@endif
  
    <!--AGENT'S URL-->
  	@if ($objective->agent_url)
  	  <div class="form-group">
  	    {{Form::label('agent_url', 'Responsable URL: ', array('class'=>'col-sm-2 control-label'))}}
  		  <div class="col-sm-8">
  	      {{$objective->agent_url}}
  		  </div>
  	  </div>
  	@endif
  
    <!--MIR URL-->
    <div class="form-group">
      {{Form::label('mir_url', 'URL de verificación: ', array('class'=>'col-sm-2 control-label'))}}
      <div class="col-sm-8">
    	  @if(Auth::user()->user_type == "society")
			    {{$objective->mir_url}}
		    @else
	        {{Form::text('mir_url', $objective->mir_url, array('class'=>'form-control has-tooltip'))}}
          <p class="hidden">El sitio donde se puede verificar el avance de la actividad. Si se define el URL y el
          archivo, el URL tiene precedencia; no es posible mostrar ambos en el tablero.</p>
        @endif
      </div>
    </div>

    <!--MIR FILE-->
    <div class="form-group">
      <label for="mir_file" class="col-sm-2 control-label">Archivo de verificación: </label>
      <div class="col-sm-8">
    	  @if(Auth::user()->user_type == "society")
          @if(!empty($objective->mir_file))
            <a href="/files/{{$objective->mir_file}}" download>descargar</a>
          @endif	
        @else
		      {{Form::file('mir_file')}}
          @if(!empty($objective->mir_file))
            <a href="/files/{{$objective->mir_file}}" download>descargar</a>
          @endif
        @endif
      </div>
    </div>
  @endif


  <!--FINISH DESCRIPTION-->
  <div class="form-group">
    {{Form::label('finish_description', 'Descripción final n___n: ', array('class'=>'col-sm-2 control-label'))}}
	  <div class="col-sm-8">
		  @if(Auth::user()->user_type == "society")
			  {{$objective->finish_description}}
		  @else
			  {{Form::textarea('finish_description', $objective->finish_description, array('class'=>'form-control has-tooltip'))}}
	  	@endif
	  	
	  	@if($objective->step_num == 4)
    		<p class="hidden">Un pequeño resumen de 500 caracteres máximo con la descripción del
			  resultado final.</p>
		  @else
			  <p class="hidden">Al llenar este campo das por concluida esta actividad. 
			  (500 caracteres máximo)</p>
		  @endif
	  </div>
  </div>





















<?php 
/*
<!-- AQUÍ VIENE LO NUEVO NUEVO -->
<!-- AGREGAR UNA IMAGEN  -->
<fieldset>
{{Form::file('selfie')}}

@if(!empty($commitment->selfie))
  <p><img src="/files/{{$commitment->selfie}}" style="width:100%; height:auto;"></p>
@endif
</fieldset>
*/
?>

















    <!--OTHER COMMENTS-->
  <div class="form-group">
    {{Form::label('comments', 'Comentarios: ', array('class'=>'col-sm-2 control-label'))}}
    <div class="col-sm-8">
      {{Form::textarea('comments', $objective->comments, array('class'=>'form-control has-tooltip'))}}
      <p class="hidden">Este texto sirve para extender la explicación del estatus del objetivo</p>
    </div>
  </div>
  <!-- SUBMIT -->
  <div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
    {{Form::submit('Finalizar Actividad', array('class'=>'btn btn-lg btn-primary'))}}
	</div>
  </div>
  
  {{Form::close()}}
   </div>
 </div>
</div>
@stop