@extends('backend')

@section('content')
@include('backend_nav')

<div class="container">
	<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Tablero de control público de seguimiento del PA15.</h1>
        <p class="lead">	El objetivo del tablero de control es servir como una herramienta de seguimiento 
        de la implementación de los 26 compromisos que componen el Plan de Acción 2013-2015 de la Alianza para el Gobierno Abierto.</p>
	</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
				<h2 class="page-header">Compromisos <small>{{link_to('commitment/create', 'agregar compromiso')}}</small></h2>

<!-- users table -->
  <table class="table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>plan</th>
        <th>funcionario</th>
        <th>agente externo</th>
        <th>*</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($commitments as $commitment)
      <tr>
        <td>{{$commitment->title}}</td>
        <td>
          @if(!empty($commitment->plan))
            <a href="/files/{{$commitment->plan}}" download>descargar</a>
          @endif
        </td>
        <td>{{$commitment->government_user}}</td>
        <td>{{$commitment->society_user}}</td>
        <td>
          <!-- update link -->
          {{link_to('commitment/' . $commitment->id . '/edit', 'editar')}}

          <!-- delete form -->
            {{Form::open([
              'url' => 'commitment/' . $commitment->id, 
              'method' => 'DELETE'
            ])}}

            <input type="submit" class="btn btn-xs btn-danger" value="eliminar">

            {{Form::close()}}             
        </td>
      </tr>
      <tr class="commitment_steps">
	       @foreach($commitment->steps AS $step)
            <td class="step"> 
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
            
            	@foreach($step->objectives AS $objective)
            	
            	<?php  switch ($objective->status):
				    case 'a':
				        $status = "sin_avance";
				        break;
				    case 'b':
				        $status = "proceso";
				        break;
				    case 'c':
				        $status = "completado";
				        break;
				    default:
				        $status = "sin_avance";
				 endswitch;?>
            	
				{{link_to('objective/' . $objective->id . '/edit', $objective->status,array('class' => "objective $status"))}}
				@endforeach
            </td>
            @endforeach
      	
      </tr>
      @endforeach
    </tbody>
  </table>
  </div></div>
</div>
@stop