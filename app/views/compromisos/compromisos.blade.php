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
		
		<!-- comienza lista-->
		<div class="row list-key">
			<div class="col-xs-3 col-sm-1 id">
				<h4>1</h4>
				<div class="plus">
					<a href="#" title="responsable-1">+</a>
				</div>
			</div>
			<div class="col-xs-9 col-sm-3 ct">
				<p>Tu gobierno en un solo punto | gob.mx</p>
			</div>
			<section class="mobile">
				<!-- primer avance-->
				<div class="col-xs-12  col-sm-2 ct">
				<!-- lista de objetivos y status-->
				<ul class="cumplimiento">
					<li><a href="#" class="objetivo completado"></a>
						<ul>
							<li><div class="detalle">
								<p>Habilitar los mecanismos técnicos para la integración de tramites y servicios</p>
								<h4>5</h4>
								<p class="row"><span class="col-md-6">Tramites y servicios en gob.mx por dependencias y entidades</span>
								<span class="col-md-6"> <a href="#" class="medios">Consulta el Avance</a></span>
								</p>
								<p>Responsable: <a href="#">Unidad de Gobierno Digital</a></p>
								<p>	<a href="#" class="comentarios_link">Otros comentarios</a></p>
							</div>
							</li>
						</ul>
					</li>
					<li><a href="#" class="objetivo completado"></a>
						<ul>
							<li><div class="detalle">
								<p>Habilitar los mecanismos técnicos para la integración de tramites y servicios</p>
								<h4>5</h4>
								<p class="row"><span class="col-md-6">Tramites y servicios en gob.mx por dependencias y entidades</span>
								<span class="col-md-6"> <a href="#" class="medios">Consulta el Avance</a></span>
								</p>
								<p>Responsable: <a href="#">Unidad de Gobierno Digital</a></p>
								<p>	<a href="#" class="comentarios_link">Otros comentarios</a></p>
							</div>
							</li>
						</ul>
					</li>
					<li><a href="#" class="objetivo proceso"></a>
						<ul>
							<li><div class="detalle">
								<p>Habilitar los mecanismos técnicos para la integración de tramites y servicios</p>
								<h4>5</h4>
								<p class="row"><span class="col-md-6">Tramites y servicios en gob.mx por dependencias y entidades</span>
								<span class="col-md-6"> <a href="#" class="medios">Consulta el Avance</a></span>
								</p>
								<p>Responsable: <a href="#">Unidad de Gobierno Digital</a></p>
								<p>	<a href="#" class="comentarios_link">Otros comentarios</a></p>
							</div>
							</li>
						</ul>
					</li>
						
				</ul>
			</div>
				<!-- segundo avance-->
				<div class="col-xs-12  col-sm-2 ct">
				<!-- lista de objetivos y status-->
				<ul class="cumplimiento">
					<li><a href="#" class="objetivo proceso"></a>
						<ul>
							<li><div class="detalle">
								<p>Habilitar los mecanismos técnicos para la integración de tramites y servicios</p>
								<h4>5</h4>
								<p class="row"><span class="col-md-6">Tramites y servicios en gob.mx por dependencias y entidades</span>
								<span class="col-md-6"> <a href="#" class="medios">Consulta el Avance</a></span>
								</p>
								<p>Responsable: <a href="#">Unidad de Gobierno Digital</a></p>
								<p>	<a href="#" class="comentarios_link">Otros comentarios</a></p>
							</div>
							</li>
						</ul>
					</li>
					<li><a href="#" class="objetivo sin_avance"></a>
						<ul>
							<li><div class="detalle">
								<p>Habilitar los mecanismos técnicos para la integración de tramites y servicios</p>
								<h4>5</h4>
								<p class="row"><span class="col-md-6">Tramites y servicios en gob.mx por dependencias y entidades</span>
								<span class="col-md-6"> <a href="#" class="medios">Consulta el Avance</a></span>
								</p>
								<p>Responsable: <a href="#">Unidad de Gobierno Digital</a></p>
								<p>	<a href="#" class="comentarios_link">Otros comentarios</a></p>
							</div>
							</li>
						</ul>
					</li>
					<li><a href="#" class="objetivo sin_avance"></a>
						<ul>
							<li><div class="detalle">
								<p>Habilitar los mecanismos técnicos para la integración de tramites y servicios</p>
								<h4>5</h4>
								<p class="row"><span class="col-md-6">Tramites y servicios en gob.mx por dependencias y entidades</span>
								<span class="col-md-6"> <a href="#" class="medios">Consulta el Avance</a></span>
								</p>
								<p>Responsable: <a href="#">Unidad de Gobierno Digital</a></p>
								<p>	<a href="#" class="comentarios_link">Otros comentarios</a></p>
							</div>
							</li>
						</ul>
					</li>
								
				</ul>			
			</div>
				<!-- terce avance-->
				<div class="col-xs-12  col-sm-2 ct">
				<!-- lista de objetivos y status-->
				<ul class="cumplimiento">
					<li><a href="#" class="objetivo sin_avance"></a>
						<ul>
							<li><div class="detalle">
								<p>Habilitar los mecanismos técnicos para la integración de tramites y servicios</p>
								<h4>5</h4>
								<p class="row"><span class="col-md-6">Tramites y servicios en gob.mx por dependencias y entidades</span>
								<span class="col-md-6"> <a href="#" class="medios">Consulta el Avance</a></span>
								</p>
								<p>Responsable: <a href="#">Unidad de Gobierno Digital</a></p>
								<p>	<a href="#" class="comentarios_link">Otros comentarios</a></p>
							</div>
							</li>
						</ul>
					</li>
					<li><a href="#" class="objetivo sin_avance"></a>
						<ul>
							<li><div class="detalle">
								<p>Habilitar los mecanismos técnicos para la integración de tramites y servicios</p>
								<h4>5</h4>
								<p class="row"><span class="col-md-6">Tramites y servicios en gob.mx por dependencias y entidades</span>
								<span class="col-md-6"> <a href="#" class="medios">Consulta el Avance</a></span>
								</p>
								<p>Responsable: <a href="#">Unidad de Gobierno Digital</a></p>
								<p>	<a href="#" class="comentarios_link">Otros comentarios</a></p>
							</div>
							</li>
						</ul>
					</li>
					<li><a href="#" class="objetivo sin_avance"></a>
						<ul>
							<li><div class="detalle">
								<p>Habilitar los mecanismos técnicos para la integración de tramites y servicios</p>
								<h4>5</h4>
								<p class="row"><span class="col-md-6">Tramites y servicios en gob.mx por dependencias y entidades</span>
								<span class="col-md-6"> <a href="#" class="medios">Consulta el Avance</a></span>
								</p>
								<p>Responsable: <a href="#">Unidad de Gobierno Digital</a></p>
								<p>	<a href="#" class="comentarios_link">Otros comentarios</a></p>
							</div>
							</li>
						</ul>
					</li>					
				</ul>
			</div>
				<!-- resultado-->
				<div class="col-xs-12  col-sm-2 ct">
				<ul>
					<li class="resultado_link">	<a>www.origen.org</a>
					<ul class="resultado">
						<li><div class="contenido">
							<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, 
								eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
						</div>
						</li>
					</ul>
					</li>
				</ul>
			</div>
			</section>
		</div><!-- ends list-->
		<!-- info responsable-->
		<div id="responsable-1" class="row list-responsable">
			<div class="col-sm-4 col-sm-offset-1 ct">
				<p>Plataforma virtual la información sobre las Normas Oficiales Mexicanas Vigentes.
					<a href="#">Consulta el plan de trabajo</a>
				</p> 
				
			</div>
			<div class="col-sm-3 col-sm-offset-1 ct">
				<h5>Responsable</h5>
				<p class="vcard">
					<span class="fn">Alberto Ulises Esteban Marina</span>
					<span class="organization-unit">Director General de Normas</span>
					<span class="tel">t. <span class="value">56 7893 4568</span></span>
					<a href="mailto:aulisesmarina@economia.gob.mx">aulisesmarina@economia.gob.mx</a>
				</p>
			</div>
			<div class="col-sm-3 ct">
				<h5>Responsable de la Organización de la Sociedad Civil</h5>
				<p class="vcard">
					<span class="fn">Ricardo Corona Real</span>
					<span class="organization-unit">Coordinador de Finanzas Públicas</span>
					<span class="tel">t. <span class="value">56 7893 4568</span></span>
					<a href="mailto:aulisesmarina@economia.gob.mx">aulisesmarina@economia.gob.mx</a>
				</p>
			</div>
		</div>
	</div>
</section>
@stop