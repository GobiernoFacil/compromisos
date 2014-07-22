<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cumplimiento - <?=$title?></title>

    <!-- Bootstrap -->
    <link href="<?=URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=URL::asset('bower_components/select2/select2.css')?>" rel="stylesheet">
    <link href="<?=URL::asset('bower_components/select2-bootstrap-css/select2-bootstrap.css')?>" rel="stylesheet">
    <link href="<?=URL::asset('bower_components/bootstrap-datepicker/css/datepicker3.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= URL::asset('css/styles.css'); ?>"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= URL::to('/backend'); ?>">Cumplimiento</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menú<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= URL::to('/backend/compromisos'); ?>">Compromisos</a></li>
                            <?php if(Auth::user()->super):?><li><a href="<?= URL::to('/backend/fuentes'); ?>">Fuentes</a></li><?php endif ?>
                            <li><a href="<?= URL::to('/backend/hitos'); ?>">Hitos</a></li>
                            <?php if(Auth::user()->super):?><li><a href="<?= URL::to('/backend/usuarios'); ?>">Usuarios</a></li><?php endif ?>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bienvenido <?=Auth::user()->nombres?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= URL::to('/backend/auth/logout'); ?>">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search" action="<?= URL::to('backend/compromisos'); ?>" method="GET">
                    <div class="form-group">
                        <input accesskey="q" type="text" name="q" id="q" class="form-control" placeholder="Buscar..." value="<?= isset($busqueda) ? strip_tags($busqueda) : ''; ?>">
                    </div>
                    <button type="submit" class="btn btn-default">Buscar</button>
                </form>
            </div>
        </div>
    </nav>

</header>

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?=$sidebar?>
            </div>
            <div class="col-md-9">
                <?= View::make('backend/messages'); ?>
                <?=$content?>
            </div>
        </div>
    </div>
</main>
<div class="modal fade" id="modal-backend" tabindex="-1" role="dialog" aria-labelledby="Modal Backend" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>

<script src="<?=URL::asset('bower_components/jquery/dist/jquery.min.js')?>"></script>
<script src="<?=URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script src="<?=URL::asset('bower_components/select2/select2.min.js')?>"></script>
<script src="<?=URL::asset('bower_components/tinymce/tinymce.min.js')?>"></script>
<script src="<?=URL::asset('bower_components/jquery.maskedinput/jquery.maskedinput.min.js')?>"></script>
<script src="<?=URL::asset('bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script src="<?=URL::asset('bower_components/flot/jquery.flot.js')?>"></script>
<script src="<?=URL::asset('bower_components/flot/jquery.flot.pie.js')?>"></script>
<script src="<?=URL::asset('bower_components/moment/min/moment-with-langs.min.js')?>"></script>
<script>
    var base_url="<?=url()?>";
</script>
<script src="<?=URL::asset('js/backend.js')?>"></script>
</body>
</html>
