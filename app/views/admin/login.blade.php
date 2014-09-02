@extends('frontend', ['title' => 'Login | Tablero de control público de seguimiento del PA15.'])

<!-- THE LOGIN FORM -->
@section('content')
@include('frontend_nav')
<main role="main" class="main">
<section id="alianza">
<div class="container">
	<div class="row">
		<header class="main-header">
			<h1 class="first-word-bold"><strong>Ingresa</strong> al Tablero de Compromisos</h1>
		</header>
		<section class="section-page">
			<div class="col-sm-6 col-sm-offset-3">
			<article>
				<div class="post-entry">
						 {{Form::open([
						 "class"=> "form-signin"
						 ])}}
				<p>
					<label for="username">Correo:</label><br/>
					<input type="text" class="form-control" name="username" id="username">
				</p>
				<p>
					<label for="password">Contraseña:</label><br/>
					<input type="password" class="form-control" name="password" id="password">
				</p>
  <p><input type="submit" class="btn btn-lg btn-primary btn-block" value="Acceder"></p>
  {{Form::close()}}
					</div>
				</article>
			</div>
			</section>
		</div>
</div>
</section>
</main>
@stop
