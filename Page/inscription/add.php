<?php
function liste($db_connection)
{
$query = "SELECT * FROM utilisateur";

    if ($result = mysqli_query($db_connection, $query)) {
    /* Récupère un tableau associatif */
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $username = $row["username"];
            $nom = $row["nom"];
            $profil = $row["profil"];
            $mail = $row["mail"];
            $createdate = $row["date_creation"];
            $fonction = $row["fonction"];
            echo "<div class=\"col-md-4\">
                    <div class=\"card\">
                        <div class=\"card-block\">";
            if ($profil== "admin"){
                echo "<i class=\"fa fa-user-secret\" aria-hidden=\"true\"></i> ";
            }else{
                echo "<i class=\"fa fa-user\" aria-hidden=\"true\"></i> ";
            }
            echo "<a href='intranet.php?page=10&id=" . $id . "'>",$username, " ", $nom, "</a> <br>";
            echo "<i class=\"fa fa-envelope\" aria-hidden=\"true\"></i> ", $mail, "<br>";
            echo "<i class=\"fa fa-graduation-cap\" aria-hidden=\"true\"></i>",$fonction, "<br>" ;
            echo "<form method=\"post\">
                  <button type=\"submit\" name='".$id."' class=\"btn btn-danger btn-sm\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></button>
                  </form>";
            echo "<br>";
            if (isset($_POST[$id])) {
                if ($_SESSION['profil'] == "admin") {
                    del($db_connection, $id);
                } else {
                    echo "<div class=\"alert alert-danger\" role=\"alert\">
                         <strong>Erreur</strong> Il faut être administrateur.
                         </div>";
                }
            }
            echo "</div>
                    </div>
                    </div>";
        }
        /* Libération des résultats */
        mysqli_free_result($result);
    }
}
function inscription($username, $name, $password, $pro, $mail, $function, $db_connection)
{

    $requete = "INSERT INTO utilisateur VALUES (NULL, '" . $username . "', '"  . $name .  "', '"  . $pro .  "', '"  . md5($password) .  "', '" .  $mail . "', NOW(), '" .  $function . "' );";

    // execution de la requte avec des résultats
    $req = mysqli_query($db_connection, $requete) or die('Erreur SQL !<br />' . $requete . '<br />' . mysqli_error($db_connection));
}
function recherche($db_connection, $mot)
{
    $query = "SELECT * FROM utilisateur WHERE username = '".$mot."' or nom = '".$mot."' or mail = '".$mot."'";

    if ($result = mysqli_query($db_connection, $query)) {
        /* Récupère un tableau associatif */
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class=\"col-md-4\">    <div class=\"card\">
        <div class=\"card-block\"><i class=\"fa fa-user\" aria-hidden=\"true\"></i>  ", $row["username"], "<br>";
            echo "<i class=\"fa fa-envelope\" aria-hidden=\"true\"></i> ",$row["mail"], "<br></div></div></div><br>";
            echo "<br>";
        }
        /* Libération des résultats */
        mysqli_free_result($result);
    }
    /* Fermeture de la connexion */

}
function del($db_connection, $id)
{
    $query = "DELETE FROM utilisateur WHERE id = '".$id."' ";
    $req = mysqli_query($db_connection, $query) or die('Erreur SQL !<br />' . $query . '<br />' . mysqli_error($db_connection));

}