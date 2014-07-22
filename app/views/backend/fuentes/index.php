<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li class="active">Fuentes</li>
</ol>

<a href="<?=URL::to('backend/fuentes/nueva')?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Crear Fuente</a>

<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Padre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($fuentes as $fuente): ?>
            <tr>
                <td><?= $fuente->nombre; ?></td>
                <td><?= $fuente->padre ? $fuente->padre->nombre : ' - '; ?></td>
                <td>
                    <a href="<?= URL::to('backend/fuentes/ver/'.$fuente->id); ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-search"></span> Ver</a>
                    <a href="<?= URL::to('backend/fuentes/editar/'.$fuente->id); ?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                    <a href="<?= URL::to('backend/fuentes/eliminar/'.$fuente->id); ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-backend"><span class="glyphicon glyphicon-remove"></span> Eliminar</a>
                </td>
            </tr>
            <?php foreach($fuente->hijos as $h): ?>
                <tr>
                    <td> - <?= $h->nombre; ?></td>
                    <td><?= $h->padre ? $h->padre->nombre : ' - '; ?></td>
                    <td>
                        <a href="<?= URL::to('backend/fuentes/ver/'.$h->id); ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-search"></span> Ver</a>
                        <a href="<?= URL::to('backend/fuentes/editar/'.$h->id); ?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                        <a href="<?= URL::to('backend/fuentes/eliminar/'.$h->id); ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-backend"><span class="glyphicon glyphicon-remove"></span> Eliminar</a>
                    </td>
                </tr>
                <?php foreach($h->hijos as $n): ?>
                    <tr>
                        <td> -- <?= $n->nombre; ?></td>
                        <td><?= $n->padre ? $n->padre->nombre : ' - '; ?></td>
                        <td>
                            <a href="<?= URL::to('backend/fuentes/ver/'.$n->id); ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-search"></span> Ver</a>
                            <a href="<?= URL::to('backend/fuentes/editar/'.$n->id); ?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                            <a href="<?= URL::to('backend/fuentes/eliminar/'.$n->id); ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-backend"><span class="glyphicon glyphicon-remove"></span> Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tbody>
</table>