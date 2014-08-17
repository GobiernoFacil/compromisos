@extends('backend', ['title' => 'Usuarios | Tablero de control público de seguimiento del PA15.'])

@section('content')
@include('backend_nav')

<div class="container">
	<div class="bs-docs-featurette bs-titles-pg">
		<h1 class="bs-docs-featurette-title">Usuarios <small>{{link_to('user/create', 'agregar usuario', array('class'=>'btn btn-primary'))}}</small></h1>
		<p class="lead">Los responsables del cumplimiento de los compromisos son: funcionarios públicos y miembros de organizaciones de la sociedad civil (OSC)</p>
	</div>
	<div class="row">
		<div class="col-lg-12">
<!-- users table -->
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>User/email</th>
        <th>Teléfono</th>
        <th>Cargo</th>
        <th>Tipo de usuario</th>
        <th>*</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->username}}</td>
        <td>{{$user->phone}}</td>
        <td>{{$user->charge}}</td>
        <td>{{$user->user_type == 'government' ? '<span class="text-success">Funcionario público</span>':'<span class="text-warning">OSC</span>'}} 
        {{$user->is_admin ? '/ <strong class="text-muted">Administrador</strong>':''}}</td>
        <td>
          <!-- update link -->
          {{link_to('user/' . $user->id . '/edit', 'editar')}}

          <!-- delete form -->
          @if($user->id != Auth::user()->id)
            {{Form::open([
              'url' => 'user/' . $user->id, 
              'method' => 'DELETE'
            ])}}

            <input type="submit" class="btn btn-xs btn-danger" value="eliminar">

            {{Form::close()}}
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
		</div>
	</div>
</div>
@stop