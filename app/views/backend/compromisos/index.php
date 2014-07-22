<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li class="active">Compromisos</li>
</ol>


<p><a href="<?=URL::to('backend/compromisos/nuevo')?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Crear Compromiso</a></p>

<!-- Nav tabs -->
<ul class="nav nav-tabs">
    <li class="active"><a href="#listado" data-toggle="tab"><span class="glyphicon glyphicon-list"></span> Resultados</a></li>
    <li><a href="#visualizaciones" data-toggle="tab"><span class="glyphicon glyphicon-stats"></span> Visualizaciones</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="listado">

        <?php if(count($compromisos)):?>

        <p style="margin: 20px 0;">Se han encontrado <?=$compromisos->getTotal()?> resultados.</p>

        <p class="text-right">Exportar a <a href="<?=str_replace('compromisos','compromisos.pdf',URL::full())?>">PDF</a>, <a href="<?=str_replace('compromisos','compromisos.xls',URL::full())?>">XLS</a></p>

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Avance (%)</th>
                    <th>Responsable Implementación</th>
                    <th>Última Actualización</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($compromisos as $compromiso): ?>
                <tr>
                    <td>
                        <?= $compromiso->nombre; ?>
                    </td>
                    <td><?=number_format($compromiso->avance*100,2,',','.')?></td>
                    <td><?=$compromiso->institucionResposableImplementacion->nombre?></td>
                    <td><?=$compromiso->updated_at->format('d-m-Y')?></td>
                    <td class="text-right">
                        <a href="<?= URL::to('backend/compromisos/editar/'.$compromiso->id); ?>" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                        <a href="<?= URL::to('backend/compromisos/eliminar/'.$compromiso->id); ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-backend"><i class="glyphicon glyphicon-remove"></i> Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="text-center">
        <?=$compromisos->links()?>
        </div>
        <?php else:?>
        <p>No se han encontrado compromisos.</p>
        <?php endif ?>

    </div>
    <div class="tab-pane" id="visualizaciones">
        <div class="chart pie" data-data='<?=json_encode($compromisos_chart)?>'></div>
    </div>
</div>


