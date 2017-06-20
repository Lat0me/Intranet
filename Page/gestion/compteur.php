<?php
function waitabs($db_connection, $id)
{

    $query = "SELECT COUNT(*) FROM break WHERE id_user = '" . $id . "' AND waiting = 'wait'";

    if ($result = mysqli_query($db_connection, $query)) {
        $data = mysqli_fetch_array($result);
        echo $data['0'];

        /* Libération des résultats */
        mysqli_free_result($result);
    }
    /* Fermeture de la connexion */
}

function okabs($db_connection, $id)
{

    $query = "SELECT COUNT(*) FROM break WHERE id_user = '" . $id . "' AND waiting = 'on'";

    if ($result = mysqli_query($db_connection, $query)) {
        $data = mysqli_fetch_array($result);
        echo $data['0'];

        /* Libération des résultats */
        mysqli_free_result($result);
    }
    /* Fermeture de la connexion */
}

function totalAbs($db_connection, $id)
{
    $query = "SELECT COUNT(*) FROM absence WHERE id_user = '" . $id . "'";

    if ($result = mysqli_query($db_connection, $query)) {
        $data = mysqli_fetch_array($result);
        echo $data['0'];
        /* Libération des résultats */
        mysqli_free_result($result);
    }
    /* Fermeture de la connexion */
}

function justAbs($db_connection, $id)
{

    $query = "SELECT COUNT(*) FROM absence WHERE id_user = '" . $id . "' AND statut = 'J'";

    if ($result = mysqli_query($db_connection, $query)) {
        $data = mysqli_fetch_array($result);
        echo $data['0'];
        /* Libération des résultats */
        mysqli_free_result($result);
    }
    /* Fermeture de la connexion */
}

function NoJustAbs($db_connection, $id)
{
    $query = "SELECT COUNT(*) FROM absence WHERE id_user = '" . $id . "' AND statut = 'NJ'";

    if ($result = mysqli_query($db_connection, $query)) {
        $data = mysqli_fetch_array($result);
        echo $data['0'];
        /* Libération des résultats */
        mysqli_free_result($result);
    }
    /* Fermeture de la connexion */
}