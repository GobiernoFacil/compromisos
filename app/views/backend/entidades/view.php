<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li><a href="<?=URL::to('backend/entidades'); ?>">Entidades</a></li>
    <li class="active">Ver</li>
</ol>

<table class="table table-bordered">
    <tr>
        <th class="col-xs-3">Nombre</th>
        <td><?= $entidad->nombre; ?></td>
    </tr>
    <tr>
        <th>¿Es Borrador?</th>
        <td><?= $entidad->borrador?'Sí':'No' ?></td>
    </tr>
    <tr>
        <th>Número de boletín</th>
        <td><?= $entidad->numero_boletin; ?></td>
    </tr>
    <tr>
        <th>Estado</th>
        <td><?= $entidad->estado; ?></td>
    </tr>
    <tr>
        <th>Fecha de Ingreso a la Cámara</th>
        <td><?= $entidad->fecha_ingreso->format('d-m-Y'); ?></td>
    </tr>
    <tr>
        <th>Cámara de Origen</th>
        <td><?= $entidad->camara_origen; ?></td>
    </tr>
    <tr>
        <th>Etapa</th>
        <td><?= $entidad->etapa; ?></td>
    </tr>
    <tr>
        <th>Subetapa</th>
        <td><?= $entidad->subetapa; ?></td>
    </tr>
    <tr>
        <th>Iniciativa</th>
        <td><?= $entidad->iniciativa; ?></td>
    </tr>
    <tr>
        <th>Urgencia Actual</th>
        <td><?= $entidad->urgencia_actual; ?></td>
    </tr>
</table>
<a href="javascript:history.back();" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left"></span> Volver</a>