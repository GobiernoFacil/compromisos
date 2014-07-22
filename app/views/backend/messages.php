<?php
$messages = Session::get('messages');
if($messages):
    foreach($messages as $tipo => $message):
    ?>
        <div class="alert alert-<?= $tipo; ?>">
            <p><?= $message; ?></p>
        </div>
    <?php
    endforeach;
endif;