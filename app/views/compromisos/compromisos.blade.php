@extends('frontend', ['title' => 'Tablero de control público de seguimiento del Plan de Acción 2013-2015 México'])
@section('content')
@include('frontend_nav')
<main role="main" class="main">
<section id="alianza">
	<div class="container">
		<div class="row">
			<header class="main-header">
					<h1 class="first-word-bold"><strong>Tablero</strong> </h1>
				</header>
			<section class="section-page">
				<article>
				<div class="col-sm-5">
					<p class="guia"> <b class="cuadro completado"></b> <span>Completado</span> 
						<b class="cuadro proceso"></b> <span>En Proceso</span> <b class="cuadro sin_avance"></b> 
						<span>Sin Avance</span>  </p>
				</div>
				<div class="col-sm-2 col-sm-offset-5">
				<p>{{link_to('about', 'Acerca del tablero')}}</p>
				</div>
				</article>
			</section>
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
				<h4>{{$commitment->commitment_num == 0 ? "" : $commitment->commitment_num}}</h4>
				<div class="plus">
					<a class="show" title="responsable-{{$commitment->id}}"></a>
				</div>
			</div>
			<div class="col-xs-9 col-sm-3 ct">
				<p>{{$commitment->title}}</p>
			</div>
			<section class="mobile responsable-{{$commitment->id}}">
				@foreach($commitment->steps AS $step)
					<div class="col-xs-12  col-sm-2 ct">
					<?php //contamos objetivos por avance 
						$total_ob 	= iterator_count($step->objectives);
						$ob 		= 0;
					?>
					@foreach($step->objectives AS $objective)	
						@if ($step->step_num != '4') 
							<?php  
								switch ($objective->status):
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
								endswitch;
							 	$ob++;	?>
							 <!-- con más tiempo corrijo el cálcuo X___x porque presiento que no va a funcionar visualmente ajustar al ancho -->
							 @if ($ob == 1) 
							 <ul class="cumplimiento clearfix">
						     @endif
						     	<?php 
						     		// rústico el asunto mientras aprueban
							     	switch ($total_ob) {
								     	case $total_ob == 1: $class_link = ""; break;
								     	case $total_ob == 2: $class_link = "two"; break;
								     	case $total_ob == 3: $class_link = "three"; break;
								     	case $total_ob == 4: $class_link = "four"; break;
								  //   	case $total_ob == 13 && $ob == 11 : $class_link ="three"; break;
								    // 	case $total_ob == 13 && $ob == 12 : $class_link ="three"; break;
								     //	case $total_ob == 13 && $ob == 13 : $class_link ="three"; break;
								     	case $total_ob >= 5: $class_link = "five"; break;
								     	default:
								     	 	$class_link = "";
									 	 	break;
							     	}
						     	?>
						    	 
						    		
						     	<li class="resultado_link {{$class_link}}"> 
							 		<a href="#" class="objetivo {{$status}}"></a>
							 		@if ($objective->title)
							 		<ul>
							 		    <li><div class="detalle">
							 		    	<p>{{$objective->title}}</p>
							 		    	<h4></h4>
							 		    	<p class="row"><span class="col-md-6">{{$objective->description}}</span>
							 		    		@if ($objective->mir_file)
							 		 				<span class="col-md-6"> <a href="/files/{{$objective->mir_file}}" class="medios">Consulta el Avance</a></span>
							 		    		@else
							 		    			@if ($objective->mir_url)
							 		    				<?php $url = $objective->mir_url;?>
							 		    				@if (!preg_match("~^(?:f|ht)tps?://~i", $url)) 
							 								<?php $url = "http://" . $url;?>
							 		 					@endif
							 							<span class="col-md-6"> <a href="{{$url}}" class="medios">Consulta el Avance</a></span>
							 		    			@endif
							 		    		@endif
							 		 		</p>
							 		 		@foreach($objective->agents AS $agent)
							 		 			<?php $agent_url = $agent->agent_url;?>
							 		    				@if (!preg_match("~^(?:f|ht)tps?://~i", $agent_url)) 
							 								<?php $agent_url = "http://" . $agent_url;?>
							 		 					@endif
							 		 			<p>Responsable: <a href="{{$agent_url}}">{{$agent->agent}} </a></p>			
							 		 		@endforeach
							 		 		
							 		 		<p>	@if ($objective->comments)
							 		 			<a class="comentarios_link" title="co-{{$step->step_num}}-{{$objective->id}}">
							 		 				Comentarios
							 		 			</a>
							 		 			<br/>
							 		 			<span class="comentarios_objetivo co-{{$step->step_num}}-{{$objective->id}}">
							 		 				{{$objective->comments}}
							 		 			</span>
							 		 			@endif
							 		 		</p>
							 		    	</div>								 		
							 		    </li>
							 		</ul>
							 		@endif
							 	</li>
						     
						     @if ($ob == $total_ob)
							 </ul>
						     @endif
								 
						@else
						<!--- resultado final -->
							<ul>
								<li class="resultado_link">
									@if ($objective->url)	
							 			<?php $url_objective = $objective->url;?>
							 			@if (!preg_match("~^(?:f|ht)tps?://~i", $url_objective)) 
							 				<?php $url_objective = "http://" . $url_objective;?>
							 			@endif
							 			<a href="{{$url_objective}}">{{$url_objective}}</a>
							 		@endif	
							 		@if ($objective->finish_description)
							 		<ul class="resultado">
									    <li><div class="contenido">
									    	@if(!empty($objective->selfie))
												<img src="/public/files/{{$objective->selfie}}" style="width:100%; height:auto;">
											@endif
									    	<p>{{$objective->finish_description}} </p>
									    	
											</div>
									    </li>
									</ul>
							 		@endif
								</li>
							</ul>
						
						@endif
					@endforeach
					</div>
				@endforeach

			</section>
		</div><!-- ends list-->
		<!-- info responsable-->
		<div id="responsable-{{$commitment->id}}" class="row list-responsable">
			<div class="col-sm-4 col-sm-offset-1 ct">
				<p>
					<span class="commitment_description more">
						{{$commitment->description}}
					</span>
					@if(!empty($commitment->plan))
					<a href="/files/{{$commitment->plan}}" download>Consulta el plan de trabajo</a>
					@else
					<a>El plan de trabajo no fue agregado</a>
					@endif
				</p> 
				
			</div>
			<div class="col-sm-3 col-sm-offset-1 ct">
				<h5>Responsable</h5>
				@foreach($commitment->users as $user)
				  @if ($user->user_type == 'government')
				  <p class="vcard">
				    	<span class="fn">{{$user->name}}</span>
				    	<span class="organization-unit">{{$user->charge}}</span>
				    	<span class="tel">t. <span class="value">{{$user->phone}}</span></span>
				    	<a href="mailto:{{$commitment->government_username}}">{{$user->username}}</a>
				  </p>
				  @endif
				@endforeach
			</div>
			<div class="col-sm-3 ct">
				<h5>Responsable de la Organización de la Sociedad Civil</h5>
				@foreach($commitment->users as $user)
				  @if ($user->user_type == 'society')
				  <p class="vcard">
				    	<span class="fn">{{$user->name}}</span>
				    	<span class="organization-unit">{{$user->charge}}</span>
				    	<span class="tel">t. <span class="value">{{$user->phone}}</span></span>
				    	<a href="mailto:{{$commitment->government_username}}">{{$user->username}}</a>
				  </p>
				  @endif
				@endforeach
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
</main>
@stop