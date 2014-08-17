@extends('backend', ['title' => 'Editar Usuario | Tablero de control público de seguimiento del PA15.'])

@section('content')
@include('backend_nav')
<div class="container">
	<!--breadcrumb-->
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
             	<li>
             		<i class="fa fa-dashboard"></i>  <a href="/dashboard">Dashboard</a>
                </li>
                <li>
             		  <i class="fa fa-user"></i>
                  @if(Auth::user()->is_admin)
                    {{link_to('user', 'Usuarios')}}
                  @else
                    {{link_to('user/' . Auth::user()->id . '/edit', 'Mi perfil')}}
                  @endif
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Editar Usuario: <small>{{$user->username}}</small>
                </li>
            </ol>
		</div>
	</div>
	 <div class="row">
 	<div class="col-lg-12">

	<h1 class="page-header text-center"> 
    Editar {{Auth::user()->is_admin ? 'usuario' : 'mi perfil'}} 
    <small>({{$user->username}})</small>
  </h1>
	
  {{Form::open([
    'url'    => 'user/' . $user->id,
    'method' => 'PUT',
    'class'=> 'form-horizontal',
    'autocomplete' => 'off'
  ])}}
  <!--correo-->
  <div class="form-group">
      <label for="username" class="col-sm-2 control-label">Correo: </label>
      <div class="col-sm-8">
      	<input type="text" name="username" id="username" class="form-control" value="{{$user->username}}">
      </div>
  </div>
  <!--password-->
  <div class="form-group">
      <label for="password" class="col-sm-2 control-label">Password: </label>
      <div class="col-sm-8">
      	<input type="password" name="password" class="form-control" id="password" value="">
      </div>
  </div>
  <!--nombre-->
  <div class="form-group">
      <label for="name"  class="col-sm-2 control-label">Nombre: </label>
      <div class="col-sm-8">
      <input type="text" name="name" id="name" class="form-control"  value="{{$user->name}}">
      </div>
    </div>
  <!--cargo-->
  <div class="form-group">
      <label for="charge" class="col-sm-2 control-label">Cargo: </label>
      <div class="col-sm-8">
      	<input type="text" name="charge" id="charge" class="form-control"  value="{{$user->charge}}">
      </div>
  </div>
  <!--Teléfono-->
  <div class="form-group">
      <label for="phone" class="col-sm-2 control-label">Teléfono: </label>
      <div class="col-sm-8">
      	<input type="text" name="phone" id="phone" class="form-control" value="{{$user->phone}}">
      </div>
  </div>



  @if(Auth::user()->is_admin)
  <!--tipo-->
  <div class="form-group">
    <label for="user_type" class="col-sm-2 control-label">Tipo: </label>
    <div class="col-sm-8">
      {{Form::radio('user_type', 'society', $user->user_type == 'society')}}Ciudadano
      {{Form::radio('user_type', 'government', $user->user_type == 'government')}}Servidor público
    </div>
  </div>
  <!--admin-->
  <div class="form-group">
    <label  class="col-sm-2 control-label">Es admin:</label> 
    <div class="col-sm-8">
      {{Form::checkbox('is_admin', '1', $user->is_admin)}}
    </div>
  </div>
  @endif 



  <!--guardar-->
    <div class="form-group">
      <div class="col-sm-8 col-sm-offset-2">
		  <input type="submit" class="btn btn-lg btn-primary" value="guardar">
      </div>
    </div>
  {{Form::close()}}
 	</div>
	 </div>
</div>
@stop