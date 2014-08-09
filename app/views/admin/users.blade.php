@extends('backend')
<!-- users menu -->
<ul>
  <li>{{link_to('admin/usuarios/agregar', 'agregar usuario')}}</li>
</ul>

<!-- users table -->
@section('content')
  <table>
    <thead>
      <tr>
        <th>user/email</th>
        <th>nombre</th>
        <th>teléfono</th>
        <th>cargo</th>
        <th>es de gobierno</th>
        <th>es administrador</th>
        <th>*</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{$user->username}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->phone}}</td>
        <td>{{$user->charge}}</td>
        <td>{{$user->user_type == 'government' ? 'Sí':'No'}}</td>
        <td>{{$user->is_admin ? 'Sí':'No'}}</td>
        <td>
          <!-- update link -->
          {{link_to('admin/usuario/' . $user->id, 'editar')}}

          <!-- delete form -->
          @if($user->id != Auth::user()->id)
            {{Form::open([
              'url' => 'admin/usuario/' . $user->id, 
              'method' => 'delete'
            ])}}

            <input type="submit" value="eliminar">

            {{Form::close()}}
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@stop