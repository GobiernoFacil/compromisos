<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li><a href="<?=URL::to('backend/fuentes'); ?>">Fuentes</a></li>
    <li class="active"><?= $fuente->id ? 'Editar' : 'Nueva'; ?></li>
</ol>

<form class="ajaxForm form-horizontal form-usuario" method="post" action="<?= URL::to('backend/fuentes/guardar/' . $fuente->id); ?>">
    <fieldset>
        <legend><?= $fuente->id ? 'Editar' : 'Nueva'; ?> Fuente</legend>
        <div class="validacion"></div>
        <div class="form-group">
            <label for="fuente_padre_id" class="col-sm-3 control-label">Fuente padre</label>
            <div class="col-sm-9">
                <select name="fuente_padre_id" id="fuente_padre_id" class="form-control form-control-select2">
                    <option value="">Sin padre</option>
                    <?php foreach($fuentes as $fuente_area): ?>
                        <option <?= $fuente->tipo == 'area' ? 'disabled' : ''; ?> <?= $fuente->esHijoDe($fuente_area) ? 'selected' : ''; ?> value="<?= $fuente_area->id; ?>"><?= $fuente_area->nombre; ?></option>
                        <?php foreach($fuente_area->hijos as $fuente_subarea): ?>
                            <option <?=  in_array($fuente->tipo, array('area', 'subarea')) ? 'disabled' : ''; ?> <?= $fuente->esHijoDe($fuente_subarea) ? 'selected' : ''; ?> value="<?= $fuente_subarea->id; ?>"> - <?= $fuente_subarea->nombre; ?></option>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="nombre" class="col-sm-3 control-label">Nombre</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $fuente->nombre; ?>"/>
            </div>
        </div>
    </fieldset>
    <hr/>
    <div class="text-right">
        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>
        <a href="javascript:history.back();" class="btn btn-warning"><span class="glyphicon glyphicon-ban-circle"></span> Cancelar</a>
    </div>
</form>