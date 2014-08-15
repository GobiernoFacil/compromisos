@extends('frontend')
@section('content')
@include('frontend_nav')
<section id="tablero">
	<div class="container">
		<div class="row list-title">
			<div class="col-sm-1">
			</div>
			<div class="col-sm-3">
				<h3>Compromisos</h3>
			</div>
			<div class="col-sm-2">
				<h3>PRIMER AVANCE <small>27 de octubre de 2014</small></h3>
			</div>
			<div class="col-sm-2">
				<h3>SEGUNDO AVANCE 	<small>8 de marzo de 2015</small></h3>
			</div>
			<div class="col-sm-2">
				<h3>TERCER AVANCE <small>22 de julio de 2015</small></h3>
			</div>
			<div class="col-sm-2">
				<h3>RESULTADO FINAL</h3>
			</div>
		</div><!-- ends list-title-->
		@foreach ($commitments as $commitment)
		<!-- comienza compromiso-->
		<div class="row list-key">
			<div class="col-xs-3 col-sm-1 id">
				<h4>{{$commitment->id}}</h4>
				<div class="plus">
					<a href="#" title="responsable-{{$commitment->id}}">+</a>
				</div>
			</div>
			<div class="col-xs-9 col-sm-3 ct">
				<p>{{$commitment->title}}</p>
			</div>
			<section class="mobile">
				@foreach($commitment->steps AS $step)
					<div class="col-xs-12  col-sm-2 ct">
						<ul {{ ($step->step_num == '4') ? '' : 'class="cumplimiento"'}}>
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
							 <li {{ ($step->step_num == '4') ? 'class="resultado_link"' : ''}}> 
							 	@if ($step->step_num == '4')
							 	<a></a>
							 		@if ($objective->finish_description)
							 		<ul class="resultado">
									    <li><div class="contenido">
									    	<p>{{$objective->finish_description}} </p>
									    </div>
									    </li>
									</ul>
							 		@endif
							 	@else
							 	<a href="#" class="objetivo {{$status}}"></a>
							 		@if ($objective->title)
							 		<ul>
							 		    <li><div class="detalle">
							 		    	<p>{{$objective->title}}</p>
							 		    	<h4></h4>
							 		    	<p class="row"><span class="col-md-6">{{$objective->description}}</span>
							 		 			<span class="col-md-6"> <a href="#" class="medios">Consulta el Avance</a></span>
							 		 		</p>
							 		 		<p>Responsable: <a href="{{$objective->agent_url}}">{{$objective->agent}}</a></p>
							 		 		<p>	<a href="#" class="comentarios_link">Otros comentarios</a></p>
							 		    	</div>								 		
							 		    </li>
							 		</ul>
							 		@endif
							 	@endif
							 </li>
							@endforeach
						</ul>
					</div>
				@endforeach

			</section>
		</div><!-- ends list-->
		<!-- info responsable-->
		<div id="responsable-{{$commitment->id}}" class="row list-responsable">
			<div class="col-sm-4 col-sm-offset-1 ct">
				<p>Plataforma virtual la información sobre las Normas Oficiales Mexicanas Vigentes.
					<a href="#">Consulta el plan de trabajo</a>
				</p> 
				
			</div>
			<div class="col-sm-3 col-sm-offset-1 ct">
				<h5>Responsable</h5>
				<p class="vcard">
					<span class="fn">{{$commitment->government_user}}</span>
					<span class="organization-unit">Director General de Normas</span>
					<span class="tel">t. <span class="value">56 7893 4568</span></span>
					<a href="mailto:aulisesmarina@economia.gob.mx">aulisesmarina@economia.gob.mx</a>
				</p>
			</div>
			<div class="col-sm-3 ct">
				<h5>Responsable de la Organización de la Sociedad Civil</h5>
				<p class="vcard">
					<span class="fn">{{$commitment->society_user}}</span>
					<span class="organization-unit">Coordinador de Finanzas Públicas</span>
					<span class="tel">t. <span class="value">56 7893 4568</span></span>
					<a href="mailto:aulisesmarina@economia.gob.mx">aulisesmarina@economia.gob.mx</a>
				</p>
			</div>
		</div>
		@endforeach
	</div>
</section>
@stop