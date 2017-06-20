<?php

function addabs($db_connection, $desc, $nom, $prenom, $dated, $datef, $id){
    $requete = "INSERT INTO absence VALUES (NULL, '" . $id . "', '" . $nom . "', '" . $prenom . "', '"  . $desc .  "', '"  . $dated .  "', '"  . $datef .  "', 'NJ');";
    // execution de la requte avec des résultats
    $req = mysqli_query($db_connection, $requete) or die('Erreur SQL !<br />' . $requete . '<br />' . mysqli_error($db_connection));

}