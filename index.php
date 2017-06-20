<style>
    img {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        width: 150px;
    }

    body {
        background: url(Image/Brain.jpg) no-repeat, linear-gradient(to bottom,  #000033 0%,#000033 100%);
        background-position: top;
        background-attachment: fixed;
    }
    div.container {
        background-color:rgba(255, 255, 255, 0.1); !important;
    }
    div.row {
        background-color:rgba(255, 255, 255, 0.1); !important;
    }
    div.col {
        background-color:rgba(255, 255, 255, 0.1); !important;
    }



</style>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Intranet-Connexion</title>
    <link rel="shortcut icon" type="image/x-icon" href="Image/favicon.ico"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<?php
require_once 'Page/database.php';
require_once 'SessionInfo.php';
require_once 'function/conexion.php';
?>
<body>
<br>
<br>
<br>
<br>
<nav class="navbar navbar-light bg-faded">
    <center>
	<div class="container">
        <div class="row">
            <div class="col">

                <h2>Connexion Intranet:</h2>
                <img id="neuralink" src="Image/neuralink_logo_black.png" alt="Neuralink"/>
                <form method="post" action="index.php">
                    <table>
                        <tr>
                            <td>
                                <input type="text" placeholder="Prénom " name="username" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" placeholder="Mots de passe" name="password"
                                       class="form-control">
                            </td>
                        </tr>
                    </table>
                    <br>
                    <input type="submit" name="connex" value="Connexion" class="btn btn-primary">
                </form>
            </div>
        </div>
	</div>
    </center>
    <?php
    if (isset($_POST['connex'])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        connexion($username, $password, $db_connection);
    }
    seDeconnecter($db_connection);
    ?>
</body>
</html>
