<div class="validacion"></div>
<div class="form-group">
    <label for="nombre" class="col-sm-3 control-label">Nombre</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $entidad->nombre; ?>"/>
    </div>
</div>
<div class="form-group">
    <label for="tipo" class="col-sm-3 control-label">¿Es borrador?</label>
    <div class="col-sm-9">
        <label><input type="radio" name="borrador" value="1" <?=$entidad->borrador?'checked':''?> /> Sí</label>
        <label><input type="radio" name="borrador" value="0" <?=!$entidad->borrador?'checked':''?> /> No</label>
    </div>
</div>
<div class="form-group">
    <label for="numero_boletin" class="col-sm-3 control-label">Número de boletín</label>
    <div class="col-sm-9">
        <input type="text" data-mask="9999-99" class="form-control" name="numero_boletin" id="numero_boletin" value="<?= $entidad->numero_boletin; ?>"/>
    </div>
</div>
<div class="form-group">
    <label for="estado" class="col-sm-3 control-label">Estado</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="estado" id="estado" value="<?= $entidad->estado; ?>"/>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Fecha de Ingreso a la Cámara</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="<?= $entidad->fecha_ingreso? $entidad->fecha_ingreso->format('d-m-Y'):'' ?>"/>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Cámara de Origen</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="<?= $entidad->camara_origen ?>"/>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Etapa</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="<?= $entidad->etapa ?>"/>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Subetapa</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="<?= $entidad->subetapa ?>"/>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Iniciativa</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="<?= $entidad->iniciativa ?>"/>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Urgencia Actual</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" readonly value="<?= $entidad->urgencia_actual ?>"/>
    </div>
</div>