<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li class="active">Entidades de Ley</li>
</ol>

<a href="<?=URL::to('backend/entidades/nueva')?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Crear Entidad de Ley</a>

<table class="table">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Borrador</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($entidades as $entidad): ?>
        <tr>
            <td><?= $entidad->nombre; ?></td>
            <td><?= $entidad->borrador?'Sí':'No' ?></td>
            <td><?= $entidad->estado; ?></td>
            <td>
                <a href="<?= URL::to('backend/entidades/ver/'.$entidad->id); ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-search"></span> Ver</a>
                <a href="<?= URL::to('backend/entidades/editar/'.$entidad->id); ?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                <a href="<?= URL::to('backend/entidades/eliminar/'.$entidad->id); ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-backend"><span class="glyphicon glyphicon-remove"></span> Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>