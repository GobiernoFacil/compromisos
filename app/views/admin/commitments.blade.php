@extends('backend')

@section('content')
@include('backend_nav')

<div class="container">
<!-- users menu -->
<ul>
  <li>{{link_to('commitment/create', 'agregar compromiso')}}</li>
</ul>
<!-- users table -->
  <table>
    <thead>
      <tr>
        <th>Nombre</th>
        <th>plan</th>
        <th>funcionario</th>
        <th>agente externo</th>
        <th>*</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($commitments as $commitment)
      <tr>
        <td>{{$commitment->title}}</td>
        <td>{{$commitment->plan}}</td>
        <td>{{$commitment->government_user}}</td>
        <td>{{$commitment->society_user}}</td>
        <td>
          <!-- update link -->
          {{link_to('commitment/' . $commitment->id . '/edit', 'editar')}}

          <!-- delete form -->
            {{Form::open([
              'url' => 'commitment/' . $commitment->id, 
              'method' => 'DELETE'
            ])}}

            <input type="submit" value="eliminar">

            {{Form::close()}}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop