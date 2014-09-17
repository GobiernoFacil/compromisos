@extends('backend', ['title' => 'Editar Actividad | Tablero de control público de seguimiento del PA15.'])

@section('content')
@include('backend_nav')
<?php  switch ($objective->step_num):
	case 1: $step_num = "Primer Meta"; break;
   case 2:        $step_num = "Segunda Meta";break;
   case 3:        $step_num = "Tercer Meta";break;
   case 4:        $step_num = "Resultado Final";break;
   default:        $step_num ="Resultado Final";break;
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
                    Editar 
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
    Editar 
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
	  @if(Auth::user()->user_type == "society")
	  	{{$objective->title}}
	  @else
	    {{Form::textarea('title', $objective->title,array('class'=>'form-control has-editor has-tooltip'))}}
		<p class="hidden">Breve descripción de la actividad (500 caracteres máximo)</p>
	  @endif
	  </div>
  </div>  

  <!--DESCRIPTION/OBJECTIVE-->
  <div class="form-group">
    {{Form::label('description', 'Indicador: ', array('class'=>'col-sm-2 control-label'))}}
	  <div class="col-sm-8">
	  @if(Auth::user()->user_type == "society")
	  	{{$objective->description}}
	  @else
	    {{Form::textarea('description', $objective->description,array('class'=>'form-control has-editor has-tooltip'))}}
		<p class="hidden">Breve descripción del objetivo de la actividad (500 caracteres máximo)</p>
	  @endif
      
    </div>  
  </div> 
  @endif 


  @if($objective->step_num == 4)
  <!--URL-->
  <div class="form-group">
    {{Form::label('url', 'url / frase: ', array('class'=>'col-sm-2 control-label'))}}
	  <div class="col-sm-8">
		@if(Auth::user()->user_type == "society")
			{{$objective->url}}
		@else
			{{Form::text('url', $objective->url, array('class'=>'form-control has-tooltip'))}}
			<p class="hidden">El URL para mostrar el resultado final o una frase que resuma
			el resultado obtenido</p>
	  	@endif
	  </div>
  </div>
  @endif




















  @if($objective->step_num != 4)
  <!--AGENT-->
  <div class="form-group">
    
    @if(Auth::user()->user_type == "society")
      <!-- muestra nomás la lista de chácharas  -->
      <div id="james-bond">
        @foreach($objective->agents AS $agent)
          <p>{{$agent->agent}} | {{$agent->agent_url}}</p>
        @endforeach
      </div>
    
    @else
      <!-- permite editar esta lista y agregar chácharas -->
      <div id="james-bond" class="col-md-12">
        @foreach($objective->agents AS $agent)
          <section class="existing-agent"> <!-- this one dies when the kill switch is clicked -->
            <!--AGENT-->
            <div class="form-group">
            	<div class="col-sm-2 control-label">
            		<label>Responsable:</label>
            	</div>
				<div class="col-sm-8">
					<input type="text" name="agent[]" class="form-control" value="{{$agent->agent}}">
				</div>
            </div>
            <!--AGENT'S URL-->
            <div class="form-group">
            	<div class="col-sm-2 control-label">
           			<label>Responsable URL:</label>
            	</div>
            	<div class="col-sm-8">
		   			<input type="text" name="agent_url[]" class="form-control" value="{{$agent->agent_url}}"> 
		   			 <!-- KILL SWITCH -->
		   			 <a href="#" class="kill-switch">Eliminar responsable y URL</a>
            	</div>
            </div>
           
          </section>
        @endforeach
      </div>

      <fieldset id="add-secret-agents" class="col-md-12">
      	<div class="form-group">
		  	<div class="col-sm-8 col-sm-offset-2">
			  	<p><a href="#" class="btn-sm btn-success">Agregar un responsable y URL del responsable</a></p>    
			</div>
      	</div>
      </fieldset>
    @endif
  </div>














  <!--ADVANCE DESCRIPTION-->
  <div class="form-group">
    {{Form::label('advance_description', 'Descripción del avance: ', array('class'=>'col-sm-2 control-label'))}}
	  <div class="col-sm-8">
	  	@if(Auth::user()->user_type == "society")
			{{$objective->advance_description}}
		@else
	      {{Form::textarea('advance_description', $objective->advance_description, array('class'=>'form-control has-tooltip'))}}
		  <p class="hidden">Al llenar este campo la actividad pasa de "sin iniciar" a "en proceso". 
		  (500 caracteres máximo)</p>			
	  	@endif
	  </div>
  </div>

  <!--OTHER COMMENTS-->
  <div class="form-group">
    {{Form::label('comments', 'Comentarios: ', array('class'=>'col-sm-2 control-label'))}}
    <div class="col-sm-8">
      {{Form::textarea('comments', $objective->comments, array('class'=>'form-control has-tooltip'))}}
      <p class="hidden">Este texto sirve para extender la explicación del estatus del objetivo</p>
    </div>
  </div>


  @endif

@if($objective->step_num == 4)
  <!--FINISH DESCRIPTION-->
  <div class="form-group">
    {{Form::label('finish_description', 'Descripción final: ', array('class'=>'col-sm-2 control-label'))}}
	  <div class="col-sm-8">
      {{Form::textarea('finish_description', $objective->finish_description, array('class'=>'form-control has-tooltip'))}}
      <!-- este IF tiene cada de redundante O____O -->
      @if($objective->step_num == 4)
        <p class="hidden">Un pequeño resumen de 500 caracteres máximo con la descripción del
        resultado final.</p>
      @else
        <p class="hidden">Al llenar este campo das por concluida esta actividad. 
        (500 caracteres máximo)</p>
      @endif
    </div>
  </div>
@endif

<!-- AQUÍ VIENE LO NUEVO NUEVO -->
@if($objective->step_num == 4)
  <!-- AGREGAR UNA IMAGEN DEL RESUTLADO FINAL -->
    <div class="form-group">
    	<div class="col-sm-2 control-label">
           	<label>Imagen:</label>
        </div>
        <div class="col-sm-8">
			{{Form::file('selfie')}}
			@if(!empty($objective->selfie))
			  <p><img src="/public/files/{{$objective->selfie}}" style="width:100%; height:auto;"></p>
			@endif
        </div>
  </div>
@endif
<!-- AQUÍ TERMINA LO NUEVO -->




  <!-- SUBMIT -->
  <div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
    {{Form::submit('Editar', array('class'=>'btn btn-lg btn-primary'))}}
    
    {{ $objective->status == "b" ? link_to('objective/conclude/' . $objective->id, 'Finalizar Actividad >', array("class"=>"btn btn-lg btn-success")) : ""}}
	</div>
  </div>
  
  {{Form::close()}}
   </div>
 </div>
</div>
@stop