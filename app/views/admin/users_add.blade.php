@extends('backend')

@section('content')
  {{Form::open(['url' => 'user'])}}
    <p>
      <label for="username">Correo: </label>
      <input type="text" name="username" id="username">
    </p>
    <p>
      <label for="password">Password: </label>
      <input type="password" name="password" id="password">
    </p>
    <p>
      <label for="name">Nombre: </label>
      <input type="text" name="name" id="name">
    </p>
    <p>
      <label for="charge">Cargo: </label>
      <input type="text" name="charge" id="charge">
    </p>
    <p>
      <label for="phone">Teléfono: </label>
      <input type="text" name="phone" id="phone">
    </p>
    <p>
      <label for="user_type">Tipo: </label>
      <input type="radio" name="user_type" checked value="society">ciudadano
      <input type="radio" name="user_type" value="government">servidor público
    </p>
    <p>
      <label>Es admin: <input type="checkbox" name="is_admin" value="1"></label>
    </p>

    <p><input type="submit" value="guardar"></p>
  {{Form::close()}}
@stop
