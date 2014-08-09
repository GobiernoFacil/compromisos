@extends('frontend')

<!-- THE LOGIN FORM -->
@section('content')
  {{Form::open()}}
  <p>
    <label for="username">correo:</label>
    <input type="text" name="username" id="username">
  </p>
  <p>
    <label for="password">contraseña:</label>
    <input type="password" name="password" id="password">
  </p>
  <p><input type="submit" value="Acceder"></p>
  {{Form::close()}}
@stop
