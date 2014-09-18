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
  <link rel="stylesheet" href="/css/pikaday.css">
  <link rel="stylesheet" href="/css/jquery.qtip.css">
</head>
<body>
  @yield('content')
  <footer class="row">
  	<div class="col-md-8 col-md-offset-2">
	  	<p>Forjado artesanalmente por <a href="http://gobiernofacil.com/">Gobierno Fácil</a></p>
  	</div>
  </footer>
  <!-- the development JS -->
  <script data-main="/js/admin.main" src="/js/bower_components/requirejs/require.js"></script>
  <!-- the production JS 
  <script src="/js/admin.main-built.js"></script>-->
</body>
</html>
