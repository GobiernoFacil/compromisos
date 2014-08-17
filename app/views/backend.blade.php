<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>{{ $title }}</title>
	<meta name="description" content="Backend">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="/css/admin/bootstrap.min.css">
	<link rel="stylesheet" href="/css/admin/docs.min.css">
	<link rel="stylesheet" href="/css/admin/font-awesome.min.css">
	<link rel="stylesheet" href="/css/admin/dev.css">
  <link rel="stylesheet" href="/js/bower_components/pikaday/css/pikaday.css">
</head>
<body>
  @yield('content')
  <!-- the development JS -->
  <script data-main="/js/admin.main" src="/js/bower_components/requirejs/require.js"></script>
</body>
</html>
