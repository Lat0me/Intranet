<?php
function printone($db_connection, $id)
{
    $query = "SELECT * FROM utilisateur WHERE id = " . $id . " ";

    if ($result = mysqli_query($db_connection, $query)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $username = $row["username"];
            $nom = $row["nom"];
            $profil = $row["profil"];
            $mail = $row["mail"];
            $createdate = $row["date_creation"];
            $fonction = $row["fonction"];


            echo "<br><div class=\"col-md-12\">
                    <div class=\"card\">
                        <div class=\"card-block\">";
            echo "<table class=\"table table-bordered\"><tr>
                    <td>";
            if ($profil == "admin") {
                echo "<i class=\"fa fa-user-secret\" aria-hidden=\"true\"></i> ";
            } else {
                echo "<i class=\"fa fa-user\" aria-hidden=\"true\"></i> ";
            }
            echo "Prénom</td><td><center><a href='intranet.php?page=10&id=" . $id . "'>", $username, "</a></center></td>
            <td>
                <center><button class=\"btn btn-primary btn-sm\" onclick=\"afficherMasquer(1)\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></button></center>
            </td>
            </tr>
            <tr>
            <td><i class=\"fa fa-user-o\" aria-hidden=\"true\"></i> Nom</td>
                <td>
                    <center>", $nom, "</center>
                </td>
                <td>
                    <center><button class=\"btn btn-primary btn-sm\" onclick=\"afficherMasquer(6)\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></button></center>
                </td>
            </tr>";
            echo "<tr>
                        <td><i class=\"fa fa-envelope\" aria-hidden=\"true\"></i>Mail</td>
                        <td>
                            <center> ", $mail, "</center>
                        </td>   
                        <td> 
                            <center><button class=\"btn btn-primary btn-sm\" onclick=\"afficherMasquer(4)\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></button></center>
                        </td>
                </tr>";
            echo "<tr>
                    <td><i class=\"fa fa-graduation-cap\" aria-hidden=\"true\"></i>Fonction dans l'entreprise</td>
                    <td>    
                        <center> ", $fonction, "</center>  
                    <td>    
                        <center><button class=\"btn btn-primary btn-sm\" onclick=\"afficherMasquer(5)\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></button></center> 
                    </td>
                  </tr>";
            echo "<tr>  
                    <td>
                        <i class=\"fa fa-calendar\" aria-hidden=\"true\"></i> Inscrit le         
                    </td>
                    <td>
                    <center> ", $createdate,"</center>
                    </td>";
            echo "</tr>
            ";

        }
    }
}

function add1($username, $db_connection, $id){
    $requete = "UPDATE utilisateur SET username = '".$username."' WHERE id = ".$id.";";

    // execution de la requte avec des résultats
    $req = mysqli_query($db_connection, $requete) or die('Erreur SQL !<br />' . $requete . '<br />' . mysqli_error($db_connection));
}

function add2($pro, $db_connection, $id){
    $requete = "UPDATE utilisateur SET profil = '".$pro."' WHERE id = ".$id.";";

    // execution de la requte avec des résultats
    $req = mysqli_query($db_connection, $requete) or die('Erreur SQL !<br />' . $requete . '<br />' . mysqli_error($db_connection));
}

function add3($password, $db_connection, $id){
    $requete = "UPDATE utilisateur SET password = '".md5($password)."' WHERE id = ".$id.";";

    // execution de la requte avec des résultats
    $req = mysqli_query($db_connection, $requete) or die('Erreur SQL !<br />' . $requete . '<br />' . mysqli_error($db_connection));
}

function add4($mail, $db_connection, $id){
    $requete = "UPDATE utilisateur SET mail = '".$mail."' WHERE id = ".$id.";";

    // execution de la requte avec des résultats
    $req = mysqli_query($db_connection, $requete) or die('Erreur SQL !<br />' . $requete . '<br />' . mysqli_error($db_connection));
}

function add5($fonction, $db_connection, $id){
    $requete = "UPDATE utilisateur SET fonction = '".$fonction."' WHERE id = ".$id.";";

    // execution de la requte avec des résultats
    $req = mysqli_query($db_connection, $requete) or die('Erreur SQL !<br />' . $requete . '<br />' . mysqli_error($db_connection));
}
