<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li><a href="<?=URL::to('backend/hitos')?>">Hitos</a></li>
    <li class="active">Próximos hitos relevantes</li>
</ol>


<table class="table">
    <thead>
    <tr>
        <th>Hito</th>
        <th>Compromiso</th>
        <th>Responsable</th>
        <th>Fecha Inicio</th>
        <th>Fecha Término</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($hitos as $h):?>
    <tr>
        <td><?=$h->descripcion?></td>
        <td><a href="<?=URL::to('backend/compromisos/editar/'.$h->compromiso->id)?>"><?=$h->compromiso->nombre?></a></td>
        <td><?=$h->compromiso->usuario->nombres?> <?=$h->compromiso->usuario->apellidos?></td>
        <td><time><?=$h->fecha_inicio?></time></td>
        <td><time><?=$h->fecha_termino?></time></td>
    </tr>
    <?php endforeach ?>
    </tbody>
</table>