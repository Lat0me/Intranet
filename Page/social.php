<?php
require_once 'database.php';
require('tchat/chat.php');
?>
    <script type="text/javascript">
        $(function () {
            function callAjax() {
                $('#chat').load("Page/social_messages.php");
            }

            setInterval(callAjax, 1);
        });
    </script>
    <div class="row">
        <div class="col-md-12">
            <form method="post">
                <h3 style="color:white"><u>Votre message :<u></h3> <input type="text" name="message" class="form-control"/><br/>
                <input class="btn btn-primary" type="submit" value="Envoyer" id="refresh"/>
            </form>
        </div>
    </div>
    <div id="chat">
            <center><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></center>
    </div>

<?php
if (isset($_POST['message'])) {
    $message = $_POST["message"];
    $pseudo = $_SESSION['connex'];
    message($message, $pseudo, $db_connection);
}
/* Fermeture de la connexion */
mysqli_close($db_connection);
?>
