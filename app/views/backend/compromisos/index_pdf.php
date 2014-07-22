<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</head>
<body>
<img src="<?=public_path('img/minsegpres.jpg')?>" alt="" width="100"/>

            <?php foreach($compromisos as $compromiso): ?>
                <div>
                        <h3><?= $compromiso->nombre; ?></h3>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Institucion Responsable:</strong><br />
                                <?=$compromiso->institucionResposablePlan->nombre?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Sectorialista Responsable:</strong><br />
                                    <?=$compromiso->usuario->nombres?> <?=$compromiso->usuario->apellidos?></p>
                            </div>
                        </div>
                        <?=$compromiso->descripcion?>
                </div>
                <hr/>
            <?php endforeach; ?>
            <?php if(!count($compromisos)): ?>
                <div>
                    <th class="text-center" colspan="3">No se han encontrado compromisos.</th>
                </div>
            <?php endif; ?>



</html>
</body>