@extends('frontend', ['title' => 'Acerca del Tablero de control público de seguimiento del PA15.'])

@section('content')
@include('frontend_nav')
<main role="main" class="main">

<section id="alianza">
	<div class="container">
		<div class="row">
			<header class="main-header">
					<h1 class="first-word-bold"><strong>Acerca</strong> del Tablero</h1>
				</header>
			<section class="section-page">
				<article>
					<div class="post-entry">
			 <p>El objetivo del tablero de control es servir como una herramienta de seguimiento de la implementación de los 26 compromisos que componen el 
			 Plan de Acción 2013-2015 de la Alianza para el Gobierno Abierto. Los compromisos cuentan con planes de trabajo con metas semestrales para su cumplimiento 
			 (3 metas en total). Cada meta contiene actividades específicas a realizarse en periodos de 6 meses para cumplirlas, las cuales tienen indicadores,
			 medios de verificación y responsables puntuales. Esta información debe visualizarse en el tablero.</p>
			 <p> Los responsables del cumplimiento de los compromisos son: funcionarios públicos y miembros de organizaciones de la sociedad civil (OSC)
			 El tablero de control público permite:</p>
			 <ul>
			 	<li>Visualizar el grado de cumplimiento de las actividades específicas de los 26 compromisos, vinculadas con metas semestrales, 
			 	a través de indicadores, medios de verificación y responsable de cada actividad.</li>
			 	<li>Mostrar de forma diferenciada las actividads de funcionarios públicos y de las organizaciones de la sociedad civil.</li>
			 	<li>Mostrar cumplimiento o incumplimiento (dependiendo el caso) de las metas semestrales y permitir visualizar notas explicativas 
			 	de los responsables (funcionarios y OSC) sobre su estatus (razones del cumplimiento, incumplimiento o retraso).</li>
			 	<li>Permitir a los responsables de los compromisos (tanto a funcionarios públicos como a organizaciones de la sociedad civil) editar 
			 	el conjunto de actividades puntuales (añadir nuevas o modificar otras) necesarias para cumplir con las metas del compromiso.</li>
			 	<li>Permitir comentarios de la ciudadanía en general y respuestas de los responsables de los compromisos.</li>
			 </ul>

					</div>
				
				</article>
			</section>
			<div class="col-md-12">
				<h2 class="title"></h2>
			</div>
		</div>
	</div>
</section>
</main>
@stop