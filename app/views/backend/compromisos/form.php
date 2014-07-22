<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li><a href="<?=URL::to('backend/compromisos')?>">Compromisos</a></li>
    <li class="active"><?= $compromiso->id ? 'Editar' : 'Nuevo'; ?></li>
</ol>

<form class="ajaxForm" method="post" action="<?= URL::to('backend/compromisos/guardar/' . $compromiso->id); ?>">
    <fieldset>
        <legend><?= $compromiso->id ? 'Editar' : 'Nuevo'; ?> Compromiso</legend>
        <div class="validacion"></div>
        <div class="form-group">
            <label for="nombre" class="control-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $compromiso->nombre; ?>" placeholder="Nombre del compromiso"/>
        </div>
        <div class="form-group">
            <label for="url" class="control-label">URL</label>
            <input type="text" class="form-control" name="url" id="url" value="<?= $compromiso->url; ?>" placeholder="URL del proyecto o información relacionada"/>
        </div>
        <hr />
        <div class="row form-horizontal">
            <div class="col-sm-6">
                <div class="form-group form-group-fuente">
                    <label for="publico" class="col-sm-3 control-label">Privacidad</label>
                    <div class="col-sm-9">
                        <select class="form-control form-control-select2" name="publico" id="publico">
                            <option value="0">Privado</option>
                            <option value="1">Público</option>
                        </select>
                    </div>

                </div>
                <div class="form-group form-group-fuente">
                    <label for="fuente" class="col-sm-3 control-label">Fuente</label>
                    <div class="col-sm-9">
                        <select class="form-control form-control-select2" name="fuente" id="area" data-placeholder="Seleccionar fuente">
                            <option></option>
                            <?php foreach($fuentes as $f): ?>
                                <option value="<?= $f->id; ?>" <?=$f->id==$compromiso->fuente_id?'selected':''?>><?= $f->nombre; ?></option>
                                <?php foreach($f->hijos as $h):?>
                                    <option value="<?= $h->id; ?>" <?=$h->id==$compromiso->fuente_id?'selected':''?>> - <?= $h->nombre; ?></option>
                                    <?php foreach($h->hijos as $n):?>
                                        <option value="<?= $n->id; ?>" <?=$n->id==$compromiso->fuente_id?'selected':''?>> -- <?= $n->nombre; ?></option>
                                    <?php endforeach ?>
                                <?php endforeach ?>
                            <?php endforeach ?>
                        </select>
                    </div>

                </div>

                <div class="form-group">
                    <label for="tags" class="col-sm-3 control-label">Tags</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control form-control-select2-tags" name="tags" data-tags='<?=json_encode($tags)?>' value="<?=implode(',',$compromiso->tags->lists('nombre'))?>" />
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="sector" class="col-sm-3 control-label">Sector Geográfico</label>
                    <div class="col-sm-9">
                        <select class="form-control form-control-select2" name="sectores[]" id="sector" data-placeholder="Chile" multiple>
                            <option></option>
                            <?php foreach($sectores as $s): ?>
                                <option value="<?= $s->id; ?>" <?=$compromiso->sectores->find($s->id)?'selected':''?>><?= $s->nombre; ?></option>
                                <?php foreach($s->hijos as $h): ?>
                                    <option value="<?= $h->id; ?>" <?=$compromiso->sectores->find($h->id)?'selected':''?>> - Provincia de <?= $h->nombre; ?></option>
                                    <?php foreach($h->hijos as $hh): ?>
                                        <option value="<?= $hh->id; ?>" <?=$compromiso->sectores->find($hh->id)?'selected':''?>> -- <?= $hh->nombre; ?></option>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="usuario" class="col-sm-3 control-label">Usuario responsable</label>
                    <div class="col-sm-9">
                        <?php if(Auth::user()->super):?>
                        <select class="form-control form-control-select2" name="usuario" id="usuario" data-placeholder="Seleccionar usuario">
                            <option></option>
                            <?php foreach($usuarios as $usuario): ?>
                                <option value="<?= $usuario->id; ?>" <?=$usuario->id==$compromiso->usuario_id?'selected':''?>><?= $usuario->nombres; ?> <?=$usuario->apellidos?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php else: ?>
                        <input type="text" class="form-control" readonly value="<?=Auth::user()->nombres.' '.Auth::user()->apellidos?>" />
                        <input type="hidden" name="usuario" value="<?=Auth::user()->id?>" />
                        <?php endif ?>
                    </div>
                </div>

            </div>

        </div>

        <hr />

        <div class="row form-horizontal">
            <div class="col-sm-6">
            <div class="form-group">
                <label for="institucion_responsable_plan" class="col-sm-3 control-label">Institución responsable Plan de Acción</label>
                <div class="col-sm-9">
                    <select class="form-control form-control-select2" name="institucion_responsable_plan" id="institucion_responsable_plan" data-placeholder="Seleccionar institución">
                        <option></option>
                        <?php foreach($instituciones as $i): ?>
                            <option value="<?= $i->id; ?>" <?=$i->id==$compromiso->institucion_responsable_plan_id?'selected':''?>><?= $i->nombre; ?></option>
                            <?php foreach($i->hijos as $h): ?>
                                <option value="<?= $h->id; ?>" <?=$h->id==$compromiso->institucion_responsable_plan_id?'selected':''?>> - <?= $h->nombre; ?></option>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            </div>
            <div class="col-sm-6">
            <div class="form-group">
                <label for="institucion_responsable_implementacion" class="col-sm-3 control-label">Institución responsable Implementación</label>
                <div class="col-sm-9">
                    <select class="form-control form-control-select2" name="institucion_responsable_implementacion" id="institucion_responsable_implementacion" data-placeholder="Seleccionar institución">
                        <option></option>
                        <?php foreach($instituciones as $i): ?>
                            <option value="<?= $i->id; ?>" <?=$i->id==$compromiso->institucion_responsable_implementacion_id?'selected':''?>><?= $i->nombre; ?></option>
                            <?php foreach($i->hijos as $h): ?>
                                <option value="<?= $h->id; ?>" <?=$h->id==$compromiso->institucion_responsable_implementacion_id?'selected':''?>> - <?= $h->nombre; ?></option>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            </div>
        </div>
        <div class="row form-horizontal">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="departamento" class="col-sm-3 control-label">Departamento responsable</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="departamento" id="departamento" value="<?=$compromiso->departamento?>" placeholder="Unidad/División/Departamento responsable" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row form-actores">
            <div class="col-sm-12">
                <label>Otros actores involucrados</label>

                <div><button class="btn btn-default form-actores-agregar" type="button"><span class="glyphicon glyphicon-plus"></span> Agregar nuevo actor</button></div>
                <table class="table form-actores-table">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th style="width: 0;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; foreach($compromiso->actores as $a):?>
                        <tr>
                            <td><input class="form-control" type="text" value="<?=$a->nombre?>" name="actores[<?=$i?>][nombre]" placeholder="Nombre del actor involucrado"/></td>
                            <td>
                                <button class="btn btn-danger" type="text"><span class="glyphicon glyphicon-remove"></span></button>
                            </td>
                        </tr>
                        <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <hr />


        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="descripcion">Problema o tema que buscar resolver</label>
                    <textarea class="form-control tinymce" rows="6" placeholder="Descripción sobre lo que consiste el compromiso." id="descripcion" name="descripcion"><?=$compromiso->descripcion?></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="objetivo">Objetivo General</label>
                    <textarea class="form-control tinymce" rows="6" placeholder="Descripción sobre el objetivo general del compromiso." id="objetivo" name="objetivo"><?=$compromiso->objetivo?></textarea>
                </div>
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-sm-4">
                <label>Porcentaje de Avance</label>
                <input type="text" class="form-control" value="<?=number_format($compromiso->avance*100,2,',','.')?> %" readonly />
            </div>
            <div class="col-sm-8">
                <label>Descripción del Estado de Avance</label>
                <textarea class="form-control tinymce" rows="6" name="avance_descripcion"><?=$compromiso->avance_descripcion?></textarea>
            </div>
        </div>



        <hr />

        <div class="row">
            <div class="col-sm-6">
                <label for="plazo">Plazo</label>
                <input class="form-control" type="text" id="plazo" name="plazo" value="<?=$compromiso->plazo?>"/>
            </div>
            <div class="col-sm-6">
                <label for="presupuesto">Presupuesto ($CLP)</label>
                <input class="form-control" type="number" step="0.01" id="presupuesto" name="presupuesto" value="<?=$compromiso->presupuesto?>" placeholder="En CLP"/>
            </div>
        </div>

        <hr />

        <div class="row form-hitos">
            <div class="col-sm-12">
                <label>Hitos</label>

                <div><button class="btn btn-default form-hitos-agregar" type="button"><span class="glyphicon glyphicon-plus"></span> Agregar nuevo hito</button></div>
                <table class="table form-hitos-table">
                    <thead>
                        <tr>
                            <th>Descripción</th>
                            <th>Ponderador (%)</th>
                            <th>Avance (%)</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Termino</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach($compromiso->hitos as $h):?>
                        <tr>
                            <td><input class="form-control" type="text" value="<?=$h->descripcion?>" name="hitos[<?=$i?>][descripcion]" placeholder="Descripción del hito"/></td>
                            <td><input class="form-control" type="number" min="0" max="100" value="<?=$h->ponderador*100?>" name="hitos[<?=$i?>][ponderador]" placeholder="Ponderador del hito (Valor entre 0 y 100)"/></td>
                            <td><input class="form-control" type="number" min="0" max="100" value="<?=$h->avance*100?>" name="hitos[<?=$i?>][avance]" placeholder="Porcentaje de avance (Valor entre 0 y 100)"/></td>
                            <td><input data-provide="datepicker" data-date-format="dd-mm-yyyy" data-date-autoclose="true" type="text" class="form-control" value="<?=$h->fecha_inicio->format('d-m-Y')?>" name="hitos[<?=$i?>][fecha_inicio]" placeholder="Fecha de inicio del hito" /></td>
                            <td><input data-provide="datepicker" data-date-format="dd-mm-yyyy" data-date-autoclose="true" type="text" class="form-control" value="<?=$h->fecha_termino->format('d-m-Y')?>" name="hitos[<?=$i?>][fecha_termino]" placeholder="Fecha de término del hito" /></td>
                            <td>
                                <button class="btn btn-danger" type="text"><span class="glyphicon glyphicon-remove"></span></button>
                            </td>
                        </tr>
                        <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <hr />

        <div class="row form-medios">
            <div class="col-sm-12">
                <label>Medios de verificación</label>
                <div><button class="btn btn-default form-medios-agregar" type="button"><span class="glyphicon glyphicon-plus"></span> Agregar nuevo Medio de Verificación</button></div>

                <table class="table form-medios-table">
                    <thead>
                    <tr>
                        <th class="col-sm-6">Descripción</th>
                        <th class="col-sm-3">Tipo</th>
                        <th class="col-sm-3">Enlace</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; foreach($compromiso->mediosDeVerificacion as $m):?>
                    <tr>
                        <td><input class="form-control" type="text" name="medios-de-verificacion[<?=$i?>][descripcion]" value="<?=$m->descripcion?>" placeholder="Descripción del medio de verificación" /></td>
                        <td><input class="form-control" type="text" name="medios-de-verificacion[<?=$i?>][tipo]" value="<?=$m->tipo?>" placeholder="pdf" /></td>
                        <td><input class="form-control" type="text" name="medios-de-verificacion[<?=$i?>][url]" value="<?=$m->url?>" placeholder="http://www.diariooficial.cl" /></td>
                        <td>
                            <button class="btn btn-danger" type="button"><span class="glyphicon glyphicon-remove"></span></button>
                        </td>
                    </tr>
                    <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </fieldset>
    <hr/>
    <div class="text-right">
        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>
        <a href="javascript:history.back();" class="btn btn-warning"><span class="glyphicon glyphicon-ban-circle"></span> Cancelar</a>
    </div>
</form>