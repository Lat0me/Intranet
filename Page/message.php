<?php
require_once 'database.php';
require('tchat/chat.php');
?>
<div class="row">
    <div class="col-md-12">
        <center><h3>Forum:</h3></center>
        <br>
        <?php
        liste2($db_connection);
        ?>
        <br>
    </div>
</div>