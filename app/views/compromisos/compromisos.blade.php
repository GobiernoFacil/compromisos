@extends('frontend', ['title' => 'Tablero de control público de seguimiento del Plan de Acción 2013-2015 México'])
@section('content')
@include('frontend_nav')
<section id="alianza">
	<div class="container">
		<div class="row">
			<h2 class="title">Tablero</h2>
			<div class="col-md-5">
			<p class="guia"> <b class="cuadro completado"></b> <span>Completado</span> 
			<b class="cuadro proceso"></b> <span>En Proceso</span> <b class="cuadro sin_avance"></b> <span>Sin Avance</span>  </p>
			</div>
			<div class="col-md-2 col-md-offset-5">
				<p>{{link_to('about', 'Acerca del tablero')}}</p>
			</div>
		</div>
	</div>
</section>

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
				<p>{{Str::words($commitment->description, 20)}}
					@if(!empty($commitment->plan))
					<a href="/files/{{$commitment->plan}}" download>Consulta el plan de trabajo</a>
					@else
					<a href>El plan de trabajo no fue agregado</a>
					@endif
				</p> 
				
			</div>
			<div class="col-sm-3 col-sm-offset-1 ct">
				<h5>Responsable</h5>
				<p class="vcard">
					<span class="fn">{{$commitment->government_user}}</span>
					<span class="organization-unit">{{$commitment->government_charge}}</span>
					<span class="tel">t. <span class="value">{{$commitment->government_phone}}</span></span>
					<a href="mailto:{{$commitment->government_username}}">{{$commitment->government_username}}</a>
				</p>
			</div>
			<div class="col-sm-3 ct">
				<h5>Responsable de la Organización de la Sociedad Civil</h5>
				<p class="vcard">
					<span class="fn">{{$commitment->society_user}}</span>
					<span class="organization-unit">{{$commitment->society_charge}}</span>
					<span class="tel">t. <span class="value">{{$commitment->society_phone}}</span></span>
					<a href="mailto:{{$commitment->society_username}}">{{$commitment->society_username}}</a>
				</p>
			</div>
		</div>
		@endforeach
		<!-- comienza disqus-->
		<div class="row">
			<div class="col-md-11 col-md-offset-1 disqus">
			    <div id="disqus_thread"></div>
				<script type="text/javascript">
				    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
				    var disqus_shortname = 'opengob2014'; // required: replace example with your forum shortname
				
				    /* * * DON'T EDIT BELOW THIS LINE * * */
				    (function() {
				        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
				        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
				        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
				    })();
				</script>
				<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
				<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
			</div>
		</div>
		
	</div>
</section>
@stop