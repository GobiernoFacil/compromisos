<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li><a href="<?=URL::to('backend/usuarios'); ?>">Usuarios</a></li>
    <li class="active">Ver</li>
</ol>

<table class="table table-bordered">
    <tr>
        <th class="col-xs-3">Nombres</th>
        <td><?= $usuario->nombres; ?></td>
    </tr>
    <tr>
        <th>Apellidos</th>
        <td><?= $usuario->apellidos; ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?= $usuario->email; ?></td>
    </tr>
</table>
<a href="javascript:history.back();" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left"></span> Volver</a>