<form class="ajaxForm form-horizontal form-usuario" method="post" action="<?= URL::to('backend/entidades/guardar/' . $entidad->id); ?>" data-onsuccess="actualizaEntidades">
    <div class="modal-body">
        <?= View::make('backend/entidades/form', array('entidad' => $entidad)); ?>
        <input type="hidden" name="is_modal" value="1"/>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Guardar</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-ban-circle"></i> Cancelar</button>
    </div>
</form>