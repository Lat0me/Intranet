<?php
require('database.php');
require('view_projet/addprojet.php');
require('tchat/chat.php');
?>
<script type="text/javascript">
    $(function () {
        function callAjax() {
            $('#chat').load("Page/message.php");
        }

        setInterval(callAjax, 100);
    });
</script>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-block">
                <center>
                    <h3>Bienvenue <?php echo $_SESSION['connex']; ?></h3>
                    <p>Après chaque modification sur le site recharcher la page.</p>
                </center>

            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-block">
                <div id="chat">
                    <center><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></center>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-block">
                <center><h3>Liste des Projets:</h3></center>
                <p><?php printp2($db_connection); ?></p>
            </div>
        </div>
    </div>
</div>