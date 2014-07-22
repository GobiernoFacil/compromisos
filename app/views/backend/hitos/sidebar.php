<aside>
    <div class="panel panel-default">
        <div class="panel-heading">Reportes</div>
        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
                <li <?= $item_menu == 'hitos' ? 'class="active"' : ''; ?>><a href="<?=URL::to('backend/reportes/hitos')?>">Próximos hitos</a></li>
            </ul>
        </div>
    </div>
</aside>