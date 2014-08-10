@extends('backend')

@section('content')
  {{Form::open([
    'url'    => 'admin/usuario/' . $user->id,
    'method' => 'put'
  ])}}
    <p>
      <label for="username">Correo: </label>
      <input type="text" name="username" id="username" value="{{$user->username}}">
    </p>
    <p>
      <label for="password">Password: </label>
      <input type="password" name="password" id="password" value="">
    </p>
    <p>
      <label for="name">Nombre: </label>
      <input type="text" name="name" id="name" value="{{$user->name}}">
    </p>
    <p>
      <label for="charge">Cargo: </label>
      <input type="text" name="charge" id="charge" value="{{$user->charge}}">
    </p>
    <p>
      <label for="phone">Teléfono: </label>
      <input type="text" name="phone" id="phone" value="{{$user->phone}}">
    </p>
    <p>
      <label for="user_type">Tipo: </label>
      {{Form::radio('user_type', 'society', $user->user_type == 'society')}}Ciudadano
      {{Form::radio('user_type', 'government', $user->user_type == 'government')}}Servidor público
    </p>
    <p>
      <label>Es admin: {{Form::checkbox('is_admin', '1', $user->is_admin)}}</label>
    </p>

    <p><input type="submit" value="guardar"></p>
  {{Form::close()}}
@stop