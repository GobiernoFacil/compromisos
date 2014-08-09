@extends('backend')

<!-- the menu -->
@section('content')
<ul>
  <li>{{link_to('admin', 'admin')}}</li>
  <li>{{link_to('admin/compromisos', 'compromisos')}}</li>
  <li>{{link_to('admin/usuarios', 'usuarios')}}</li>
  <li>{{link_to('logout', 'salir')}}</li>
</li>
@stop
