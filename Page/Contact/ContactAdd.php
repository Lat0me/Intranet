<?php

function id_company($db_connection,$idcomp){
    $query = "SELECT * FROM compagnie WHERE id = ".$idcomp." ";
    if ($result = mysqli_query($db_connection, $query)) {
        /* Récupère un tableau associatif */
        while ($row = mysqli_fetch_assoc($result)) {
            $nom = $row["nom"];
            echo $nom;
        }
        mysqli_free_result($result);
    }
}
function liste($db_connection)
{
    $query = "SELECT * FROM contact";

    if ($result = mysqli_query($db_connection, $query)) {
        /* Récupère un tableau associatif */
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $nom = $row["nom"];
            $prenom = $row["prenom"];
            $phone = $row["phone"];
            $mail = $row["mail"];
            $idcomp = $row["company_id"];
            echo "<div class=\"col-md-4\">
            <div class=\"card\">
                <div class=\"card-block\"><i class=\"fa fa-user\" aria-hidden=\"true\"></i>  ", $nom," ", $prenom, "<br>";
            echo "<i class=\"fa fa-envelope\" aria-hidden=\"true\"></i> ",$mail, "<br>
                    <i class=\"fa fa-phone\" aria-hidden=\"true\"></i> ",$phone, "<br>";
            echo "<i class=\"fa fa-industry\" aria-hidden=\"true\"></i> ";
            id_company($db_connection,$idcomp);
            echo "<br>";
            echo "</div>
            </div>
            </div>";
        }
        /* Libération des résultats */
        mysqli_free_result($result);
    }
    /* Fermeture de la connexion */
}

function addc($db_connection, $nom, $prenom, $phone, $mail, $comp){

        $requete = "INSERT INTO contact VALUES (NULL, '" . $nom . "', '"  . $prenom .  "', '"  . $phone .  "', '" .  $mail . "', '" .  $comp . "');";

        // execution de la requte avec des résultats
        $req = mysqli_query($db_connection, $requete) or die('Erreur SQL !<br />' . $requete . '<br />' . mysqli_error($db_connection));

}