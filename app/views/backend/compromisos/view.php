<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li><a href="<?=URL::to('backend/compromisos'); ?>">Compromisos</a></li>
    <li class="active">Ver</li>
</ol>

<table class="table table-bordered">
    <tr>
        <th class="col-xs-3">Nombre</th>
        <td><?= $compromiso->nombre; ?></td>
    </tr>
    <tr>
        <th>Descripción</th>
        <td><?= $compromiso->descripcion; ?></td>
    </tr>
</table>
<a href="javascript:history.back();" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left"></span> Volver</a>