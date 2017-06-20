<?php
require('database.php');
require('view_projet/oneProjet.php');
$id = $_GET["id"];
$user = $_SESSION['connex'];
printone($db_connection, $id);
echo "<br>";
?>

<div class="card">
    <div class="card-block">
        <button class="btn btn-primary btn-sm" onclick="afficherMasquer(4)"><i class="fa fa-plus-circle"
                                                                               aria-hidden="true"></i>
        </button>
        <br>
        <div style="display:none" id="4">
            <br>
            <h3>Ajouter une tache :</h3>
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
        </div>
        <br>
<?php
printTaches($db_connection, $id);
if (isset($_POST['add'])) {
    if ($_SESSION['profil'] == "admin") {
        $titre = $_POST["titre"];
        $desc = $_POST["desc"];
        $datef = $_POST["datef"];
        addtask($db_connection, $titre, $desc, $datef, $id, $user);
        echo "<div class=\"alert alert-info\" role=\"alert\">
           <strong>Tache!</strong> Bien enregistré.
      </div>";
    }
}
?>
    </div>
</div>
