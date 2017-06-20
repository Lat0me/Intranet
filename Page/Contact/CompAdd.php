<?php

function addc($db_connection, $nom, $desc){

    $requete = "INSERT INTO compagnie VALUES (NULL, '" . $nom . "', '"  . $desc .  "');";

// execution de la requte avec des résultats
    $req = mysqli_query($db_connection, $requete) or die('Erreur SQL !<br />' . $requete . '<br />' . mysqli_error($db_connection));
}

function liste($db_connection)
{
$query = "SELECT * FROM compagnie";

    if ($result = mysqli_query($db_connection, $query)) {
    /* Récupère un tableau associatif */
        while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $nom = $row["nom"];
        $desc = $row["Description"];

        echo "<div class=\"col-md-4\">
        <div class=\"card\">
            <div class=\"card-block\"><i class=\"fa fa-industry\" aria-hidden=\"true\"></i>  ", $nom, "<br>";
                echo "<i class=\"fa fa-arrow-right\" aria-hidden=\"true\"></i> ",$desc, "<br>
        
                ";
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

