<?php
function on ($db_connection, $id){
    $requete = "UPDATE break SET waiting = 'on' WHERE id = ".$id.";";
    // execution de la requte avec des résultats
    $req = mysqli_query($db_connection, $requete) or die('Erreur SQL !<br />' . $requete . '<br />' . mysqli_error($db_connection));
}

function off ($db_connection, $id){
    $requete = "UPDATE break SET waiting = 'wait' WHERE id = ".$id.";";
    // execution de la requte avec des résultats
    $req = mysqli_query($db_connection, $requete) or die('Erreur SQL !<br />' . $requete . '<br />' . mysqli_error($db_connection));
}


function listbreak($db_connection)
{
    $query = "SELECT * FROM break";
    if ($result = mysqli_query($db_connection, $query)) {
        echo "<table class=\"table table-bordered\">";
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $nom = $row["Nom"];
            $prenom = $row["prenom"];
            $dated = $row["date_debut"];
            $datef = $row["date_fin"];
            $statut = $row["waiting"];
            echo "<tr>";
            echo "<td>";
            echo $nom, " ", $prenom, "<br><br>";
            echo "Premier jour : ", $dated, "<br>";
            echo "Dernier jour : ", $datef, "<br>";
            echo "</td>";
            echo "<td>";

            if ($statut == "wait") {
                echo "<center><form method='post'><input type='submit' class=\"btn btn-primary btn-sm\" name='" . $id . "' value='Accepter'></form></center>";
                if (isset($_POST[$id])) {
                    on($db_connection, $id);
                    echo "<br><div class=\"alert alert-info\" role=\"alert\">
                                    <strong>Modification</strong> Bien enregistré.
                                </div>";
                }
            } elseif ($statut == "on") {
                echo "<br><center><form method='post'><input type='submit' class=\"btn btn-warning btn-sm\" name='" . $id . "' value='Annuler'></form></center>";
                if (isset($_POST[$id])) {
                    off($db_connection, $id);
                    echo "<div class=\"alert alert-info\" role=\"alert\">
                                    <strong>Modification</strong> Bien enregistré.
                                </div>";
                }

            } elseif ($statut == "off") {
                echo "<br><center><form method='post'><input type='submit' class=\"btn btn-danger btn-sm\" name='" . $id . "' value='Annuler'></form></center>";
                if (isset($_POST[$id])) {
                    off($db_connection, $id);
                    echo "<div class=\"alert alert-info\" role=\"alert\">
                                    <strong>Modification</strong> Bien enregistré.
                                </div>";
                }

            }

        }
        echo "</table>";
    }
}
function j ($db_connection, $id){
    $requete = "UPDATE absence SET statut = 'J' WHERE id = ".$id.";";
    // execution de la requte avec des résultats
    $req = mysqli_query($db_connection, $requete) or die('Erreur SQL !<br />' . $requete . '<br />' . mysqli_error($db_connection));
}

function nj ($db_connection, $id){
    $requete = "UPDATE absence SET statut = 'NJ' WHERE id = ".$id.";";
    // execution de la requte avec des résultats
    $req = mysqli_query($db_connection, $requete) or die('Erreur SQL !<br />' . $requete . '<br />' . mysqli_error($db_connection));
}
function listabs($db_connection)
{
    $query = "SELECT * FROM absence";
    if ($result = mysqli_query($db_connection, $query)) {
        echo "<table class=\"table table-bordered\">";
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $nom = $row["nom"];
            $prenom = $row["prenom"];
            $desc = $row["descr"];
            $dated = $row["date_debut"];
            $datef = $row["date_fin"];
            $statut = $row["statut"];
            echo "<tr>";
            echo "<td>";
            echo $nom, " ", $prenom, "<br><br>";
            echo "Premier jour : ", $dated, "<br>";
            echo "Dernier jour : ", $datef, "<br>";
            echo "Description : <br>";
            echo $desc;
            echo "</td>";
            echo "<td>";

            if ($statut == "NJ") {
                echo "<center><form method='post'><br><br><input type='submit' class=\"btn btn-primary btn-sm\" name='" . $id . "' value='Accepter'></form></center>";
                if (isset($_POST[$id])) {
                    j($db_connection, $id);
                    echo "<div class=\"alert alert-info\" role=\"alert\">
                                    <strong>Modification</strong> Bien enregistré.
                                </div>";
                }
            } elseif ($statut == "J") {
                echo "<center><form method='post'><br><br><input type='submit' class=\"btn btn-warning btn-sm\" name='" . $id . "' value='Annuler'></form></center>";
                if (isset($_POST[$id])) {
                    nj($db_connection, $id);
                    echo "<div class=\"alert alert-info\" role=\"alert\">
                                    <strong>Modification</strong> Bien enregistré.
                                </div>";
                }

            }
        }
	echo "</table>";
    }
}

