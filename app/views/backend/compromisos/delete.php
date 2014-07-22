<form action="<?= URL::to('backend/compromisos/eliminar/'.$compromiso->id); ?>" method="POST">
    <div class="modal-body">
        ¿Está seguro que desea eliminar el compromiso <strong><?= $compromiso->nombre; ?></strong>?
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-ok"></i> Eliminar</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-ban-circle"></i> Cancelar</button>
    </div>
    <input type="hidden" name="_method" value="delete"/>
</form>