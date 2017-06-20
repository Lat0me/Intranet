<?php

$server = "localhost";
$database_name = "";
$user = "root";
$pass = "";

$db_connection = mysqli_connect($server, $user, $pass, $database_name);
if(!$db_connection)
{
    die("<div class=\"alert alert-danger\" role=\"alert\">
            <center><strong>Erreur!</strong> de connexion à la base de données.<br>
            Admnistrateur : me@antoine-hr.fr</center>
        </div>");
}
