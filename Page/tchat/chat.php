<?php
function liste($db_connection)
{
    $query = "SELECT * FROM chat ORDER BY id DESC LIMIT 0,10";
    if ($result = mysqli_query($db_connection, $query)) {
    /* Récupère un tableau associatif */
        while ($row = mysqli_fetch_assoc($result)) {
        echo"<div class=\"card\">
            <div class=\"card-block\">";
                echo "<h4><i class=\"fa fa-user\" aria-hidden=\"true\"></i>  ", $row["pseudo"], "</h4>";
                echo "<div class=\"card\">
                    <div class=\"card-block\">
                        <i class=\"fa fa-envelope\" aria-hidden=\"true\"></i> ", $row["date_message"], "<br>
                        <i class=\"fa fa-arrow-right\" aria-hidden=\"true\"></i> ",$row["message"], "<br>
                    </div>
                </div>";
                echo "<br>";
                echo"</div>
        </div>";
        }
    /* Libération des résultats */
        mysqli_free_result($result);
    }
}
function message($message, $pseudo, $db_connection)
{
    $requete = "INSERT INTO chat VALUES (NULL, '" . $pseudo . "', '"  . $message .  "', NOW() );";
    // execution de la requte avec des résultats
    $req = mysqli_query($db_connection, $requete) or die('Erreur SQL !<br />' . $requete . '<br />' . mysqli_error($db_connection));
}
function liste2($db_connection)
{
    $query = "SELECT * FROM chat ORDER BY id DESC LIMIT 0,3";
    if ($result = mysqli_query($db_connection, $query)) {
        /* Récupère un tableau associatif */
        while ($row = mysqli_fetch_assoc($result)) {
            echo"<div class=\"card\">
            <div class=\"card-block\">";
            echo "<h4><i class=\"fa fa-user\" aria-hidden=\"true\"></i>  ", $row["pseudo"], "</h4>";
            echo "<div class=\"card\">
                    <div class=\"card-block\">
                        <i class=\"fa fa-envelope\" aria-hidden=\"true\"></i> ", $row["date_message"], "<br>
                        <i class=\"fa fa-arrow-right\" aria-hidden=\"true\"></i> ",$row["message"], "<br>
                    </div>
                </div>";
            echo "<br>";
            echo"</div>
        </div>";
        }
        /* Libération des résultats */
        mysqli_free_result($result);
    }
}