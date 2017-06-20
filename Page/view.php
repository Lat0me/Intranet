<?php
require('database.php');
require('view_projet/oneProjet.php');
$id = $_GET["id"];
printone($db_connection, $id);
echo "<br>";
printTaches($db_connection, $id);
?>
<br>
<h3>Ajouter une tache :</h3>
<hr>
<div class="row">

    <div class="col-md-2">
<form method="post">
    <input placeholder="Titre" type="text" name="titre" class="form-control">
    <br>
    <input placeholder="Description" type="text" name="desc" class="form-control">
    <br>
    <input placeholder="Date de fin" type="date" name="datef" class="form-control">
    <br>
    <input type="submit" name="add" value="Ajouter" class="btn btn-primary">
</form>
</div>
</div>
<?php

if (isset($_POST['add'])) {
    if ($_SESSION['profil'] == "admin"){
        $titre = $_POST["titre"];
        $desc = $_POST["desc"];
        $datef = $_POST["datef"];

        addtask($db_connection, $titre, $desc, $datef, $id);
    }
    mysqli_close($db_connection);
}
?>