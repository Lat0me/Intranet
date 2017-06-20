<?php
function id ($username, $password, $db_connection)
{
    $query = 'SELECT id FROM utilisateur WHERE username = "' . $username . '" AND password = "' . md5($password) . '";';

    $req = mysqli_query($db_connection, $query) or die('Erreur SQL !<br />' . $query . '<br />' . mysqli_error());

    $rid = mysqli_fetch_array($req);
    $id = $rid[0];

    return $id;
}
function email ($username, $password, $db_connection)
{
    $query = 'SELECT mail FROM utilisateur WHERE username = "' . $username . '" AND password = "' . md5($password) . '";';

    $req = mysqli_query($db_connection, $query) or die('Erreur SQL !<br />' . $query . '<br />' . mysqli_error());

    $rid = mysqli_fetch_array($req);
    $mail = $rid[0];

    return $mail;
}
function profil ($username, $password, $db_connection)
{
    $query = 'SELECT profil FROM utilisateur WHERE username = "' . $username . '" AND password = "' . md5($password) . '";';

    $req = mysqli_query($db_connection, $query) or die('Erreur SQL !<br />' . $query . '<br />' . mysqli_error());

    $rid = mysqli_fetch_array($req);
    $profil = $rid[0];

    return $profil;
}