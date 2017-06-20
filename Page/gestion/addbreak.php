<?php

function addbreak($db_connection, $nom, $prenom, $dated, $datef, $id){
    $requete = "INSERT INTO break VALUES (NULL, '" . $id . "', '" . $nom . "', '" . $prenom . "', '"  . $dated .  "', '"  . $datef .  "', 'wait');";
    // execution de la requte avec des résultats
    $req = mysqli_query($db_connection, $requete) or die('Erreur SQL !<br />' . $requete . '<br />' . mysqli_error($db_connection));
    
}