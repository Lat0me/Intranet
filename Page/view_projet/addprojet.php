<?php
function addp($db_connection, $titre, $desc, $datef, $prio)
{
    $requete = "INSERT INTO Projet VALUES (NULL, '" . $titre . "', '" . $desc . "', NOW(), '$datef', '$prio');";
    echo $requete;

    // execution de la requte avec des résultats
    $req = mysqli_query($db_connection, $requete) or die('Erreur SQL !<br />' . $requete . '<br />' . mysqli_error($db_connection));

    $old = umask(0);
    mkdir(__DIR__."/dirProjet/".$titre."", 0777, true);
    umask($old);

    if ($old != umask()) {
        die('Une erreur est survenue lors de la modification des droits');
    }
}
function selectp($db_connection, $id)
{
    $query = 'SELECT * FROM Projet WHERE id = "' . $id . '";';

    if ($result = mysqli_query($db_connection, $query)) {
        /* Récupère un tableau associatif */
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<h3>", $row["Titre"], "</h3>", "<br>", "Date de fin :", $row["date_fin"], "<br>";
            echo $row["Description"],"</br>";
            if ($row["priorite"] == 1){
                echo "Priorité forte";
            }
            if ($row["priorite"] == 2){
                echo "Priorité moyene";
            }
            if ($row["priorite"] == 3){
                echo "Priorité faible";
            }
        }
    }
}
function printp($db_connection)
{
    $query = "SELECT * FROM Projet";

    if ($result = mysqli_query($db_connection, $query)) {
        /* Récupère un tableau associatif */
        echo "<h3>Liste des Projets</h3>";
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $titre = $row['Titre'];
            echo "<div class=\"col-md-12\">
                    <div class=\"card\">
                        <div class=\"card-block\"><h3>",
                " <i class=\"fa fa-briefcase\" aria-hidden=\"true\"></i> <a href='intranet.php?page=6&id=" . $id . "'>",$row['Titre'],"</a><br></h3>",
            "Date de fin : ", $row["date_fin"], "</br>";
            if ($row["priorite"] == 1){
                echo "Priorité forte </br>";
            }
            if ($row["priorite"] == 2){
                echo "Priorité moyene </br>";
            }
            if ($row["priorite"] == 3){
                echo "Priorité faible </br>";
            }
            echo $row["Description"],
                "
                    <form method=\"post\">
                    <button type=\"submit\" name='".$id."' class=\"btn btn-danger\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></button>
                    </form>";
            echo "<br>";
    if (isset($_POST[$id])) {
        if ($_SESSION['profil'] == "admin") {
            del($db_connection, $id, $titre);
        } else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">
                        <strong>Erreur</strong> Il faut être administrateur.
                    </div>";
        }
    }
    echo"
                    
                        </div>
                    </div>
                </div><br>";

        };
    }
}
function recherche($db_connection, $mot)
{
    $query = "SELECT * FROM Projet WHERE Titre = '".$mot."' ";

    if ($result = mysqli_query($db_connection, $query)) {
        /* Récupère un tableau associatif */
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            echo "<div class=\"col-md-12\">
                    <div class=\"card\">
                        <div class=\"card-block\"><h3>",
                " <i class=\"fa fa-briefcase\" aria-hidden=\"true\"></i> <a href='intranet.php?page=6&id=" . $id . "'>",$row['Titre'],"</a><br></h3>",
            "Date de fin : ", $row["date_fin"], "<br>";
            echo $row["Description"], "
                        </div>
                    </div>
                </div><br>";

        };
    }
}
function del($db_connection, $id, $titre)
{
    $query = "DELETE FROM Projet WHERE id = '".$id."' ";
    $req = mysqli_query($db_connection, $query) or die('Erreur SQL !<br />' . $query . '<br />' . mysqli_error($db_connection));
    if (is_dir(__DIR__."/dirProjet/".$titre."")){
        rmdir(__DIR__."/dirProjet/".$titre."");
    }
}
function printp2($db_connection)
{
    $query = "SELECT * FROM Projet";

    if ($result = mysqli_query($db_connection, $query)) {
        /* Récupère un tableau associatif */
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            echo "<div class=\"col-md-12\">
                    <div class=\"card\">
                        <div class=\"card-block\"><h3>",
                " <i class=\"fa fa-briefcase\" aria-hidden=\"true\"></i> <a href='intranet.php?page=6&id=" . $id . "'>",$row['Titre'],"</a><br></h3>",
            "Date de fin : ", $row["date_fin"], "<br>";
            echo $row["Description"];
            echo "<br>";

            echo"
                        </div>
                    </div>
                </div><br>";

        };
    }
}