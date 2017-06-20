<?php
require_once 'database.php';
require_once 'Contact/CompAdd.php';
?>
<button class="btn btn-primary btn-sm" onclick="afficherMasquer(4)"><i class="fa fa-plus-circle" aria-hidden="true"></i>
</button>
<br>
<div style="display:none" id="4">
    <center>
        <h3>Ajouter une Compagnie</h3>
        <form method="post">
            <input type="text" placeholder="Nom" name="nom" class="form-control"><br>
            <input type="text" placeholder="Description" name="desc" class="form-control"><br>
            <input type="submit" name="add" value="Ajouter" class="btn btn-primary"><br>
        </form>
    </center>
</div>
<?php
if (isset($_POST['add'])) {
    if ($_SESSION['profil'] == "admin") {
        $nom = $_POST["nom"];
        $desc = $_POST["desc"];

        addc($db_connection, $nom, $desc);
        echo "<div class=\"alert alert-info\" role=\"alert\">
                   <strong>Compagnie!</strong> Bien enregistré.
              </div>";
    } else {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
                    <strong>Erreur</strong> Il faut être administrateur.
                </div>";
    }
}
?>
<br>
<div class="row">
    <?php liste($db_connection); ?>
</div>

