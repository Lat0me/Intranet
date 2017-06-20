<?php

function fonction ($username, $password, $db_connection)
{
    $query = 'SELECT fonction FROM utilisateur WHERE username = "' . $username . '" AND password = "' . md5($password) . '";';

    $req = mysqli_query($db_connection, $query) or die('Erreur SQL !<br />' . $query . '<br />' . mysqli_error());

    $rid = mysqli_fetch_array($req);
    $fonction = $rid[0];

    return $fonction;
}

function nom ($username, $password, $db_connection)
{
    $query = 'SELECT nom FROM utilisateur WHERE username = "' . $username . '" AND password = "' . md5($password) . '";';

    $req = mysqli_query($db_connection, $query) or die('Erreur SQL !<br />' . $query . '<br />' . mysqli_error());

    $rid = mysqli_fetch_array($req);
    $nom = $rid[0];

    return $nom;
}

function seDeconnecter($db_connection)
{
    mysqli_close($db_connection);
}
function connexion($username, $password, $db_connection)
{
    $requete = 'SELECT count(*) FROM utilisateur WHERE
username="' . $username . '" AND password="' . md5($password) . '";';

    // execution de la requte avec des résultats
    $req = mysqli_query($db_connection, $requete) or die('Erreur SQL !<br />' . $requete . '<br />' . mysqli_error());
    $data = mysqli_fetch_array($req);
    mysqli_free_result($req);
    // si on obtient une réponse, alors l'utilisateur est un membre
    if ($data[0] == 1) {
        session_start();
        $_SESSION['connex'] = $username;
        $_SESSION['id'] = id($username, $password, $db_connection);
        $_SESSION['email'] = email($username, $password, $db_connection);
        $_SESSION['profil'] = profil($username, $password, $db_connection);
        $_SESSION['fonction'] = fonction($username, $password, $db_connection);
        $_SESSION['nom'] = nom($username, $password, $db_connection);
        header('Location:intranet.php?page=5');
        exit();
    } // si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
    elseif ($data[0] == 0) {
        $erreur = 'Compte non reconnu.';
        echo $erreur;
    } // sinon, alors la, il y a un gros problème :)
    else {
        $erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
        echo $erreur;
    }
}
