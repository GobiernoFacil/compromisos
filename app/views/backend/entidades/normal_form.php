<form class="ajaxForm form-horizontal form-usuario" method="post" action="<?= URL::to('backend/entidades/guardar/' . $entidad->id); ?>">
    <ol class="breadcrumb">
        <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
        <li><a href="<?=URL::to('backend/entidades'); ?>">Entidades</a></li>
        <li class="active"><?= $entidad->id ? 'Editar' : 'Nueva'; ?></li>
    </ol>

    <fieldset>
        <legend><?= $entidad->id ? 'Editar' : 'Nueva'; ?> Entidad</legend>

        <?= View::make('backend/entidades/form', array('entidad' => $entidad)); ?>

    </fieldset>
    <hr/>
    <div class="text-right">
        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>
        <a href="javascript:history.back();" class="btn btn-warning"><span class="glyphicon glyphicon-ban-circle"></span> Cancelar</a>
    </div>
</form>