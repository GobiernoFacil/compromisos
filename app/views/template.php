<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cumplimiento - <?=$title?></title>

    <!-- Bootstrap -->
    <link href="<?=URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= URL::asset('css/frontend.css'); ?>"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-offset-2 col-sm-8">
                <h1>Programa de Cumplimiento <span>2014-1018</span></h1>

                <form>
                    <input class="form-control" type="text" name="q" placeholder="ej.: energías renovables"/>
                    <button class="btn btn-buscar"><span class="icon"><span
                                class="glyphicon glyphicon-search"></span></span><span class="text">Buscar</span></button>
                </form>
            </div>
        </div>

    </div>


</header>

<main>
    <?=$content?>
</main>

<footer>

</footer>

<div class="modal fade" id="modal-backend" tabindex="-1" role="dialog" aria-labelledby="Modal Backend" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>

<script src="<?=URL::asset('bower_components/jquery/dist/jquery.min.js')?>"></script>
<script src="<?=URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script src="<?=URL::asset('js/frontend.js')?>"></script>
</body>
</html>
