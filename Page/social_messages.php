<?php
require_once 'database.php';
require('tchat/chat.php');
?>
<div class="row">
    <div class="col-md-12">
        <h3>Forum:</h3>
        <hr>
        <br>
        <?php
        liste($db_connection);
        ?>
        <br>
    </div>
</div>