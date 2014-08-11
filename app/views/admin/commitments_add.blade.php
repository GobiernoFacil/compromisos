@extends('backend')

@section('content')
  {{Form::open(['url' => 'commitment'])}}
    <p>
      <label for="title">Título: </label>
      <input type="text" name="title" id="title">
    </p>
    <p>
      <label for="plan">Plan: </label>
      <input type="text" name="plan" id="plan">
    </p>

    <p>
    </p>
      <label for="government_user">Usuario de gobierno</label>
      {{Form::select('government_user', $government_users)}}
    <p>
    </p>
      <label for="society_user">Usuario externo</label>
      {{Form::select('society_user', $society_users)}}
    <p>
  

    <p><input type="submit" value="guardar"></p>
  {{Form::close()}}
@stop
