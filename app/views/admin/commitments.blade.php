@extends('backend')

<!-- the commitments list -->
@section('content')
@include('backend_nav')

<div class="container">
  <pre>
    {{count($commitments)}}
  </pre>
</div>
@stop
