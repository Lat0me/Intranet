<?php
require('database.php');
require('view_projet/addprojet.php');
?>
    <form method="post">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Chercher un Projet" name="mot">
            <div class="input-group-btn">
                <input type="submit" name="search" value="Chercher" class="btn btn-primary">
            </div>
        </div>
    </form>
    <button class="btn btn-primary btn-sm" onclick="afficherMasquer(2)"><i class="fa fa-plus-square-o"
                                                                           aria-hidden="true"></i></button>
    <br>
    <div style="display:none" id="2">
        <br>
        <h3>Ajouter un Projet</h3>
        <form method="post">
            Titre: <input type="text" name="titre" class="form-control">
            Description: <input type="textaera" name="desc" class="form-control">
            Date de fin: <input type="date" name="datef" class="form-control">
            <select class="form-control" id="comp" name="comp">
                <option value="1" >Forte </option>
                <option value="2" >Moyenne </option>
                <option value="3" >Faible </option>
            </select>
            <input type="submit" name="add" value="Ajouter" class="btn btn-primary">
        </form>
    </div>
<?php
if (isset($_POST['search'])) {
    $mot = $_POST["mot"];
    recherche($db_connection, $mot);
}
?>
    <br>
    <div class="row">
        <?php printp($db_connection); ?>
    </div>
    <br>

<?php
if (isset($_POST['add'])) {
    if ($_SESSION['profil'] == "admin") {
        $titre = $_POST["titre"];
        $desc = $_POST["desc"];
        $datef = $_POST["datef"];
        if ($_POST["comp"] == 1){
            $prio = 1;
            addp($db_connection, $titre, $desc, $datef, $prio);
        }
        if ($_POST["comp"] == 2){
            $prio = 2;
            addp($db_connection, $titre, $desc, $datef, $prio);
        }
        if ($_POST["comp"] == 3){
            $prio = 3;
            addp($db_connection, $titre, $desc, $datef, $prio);
        }

    } else {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
                    <strong>Erreur</strong> Il faut être administrateur.
              </div>";
    }
    mysqli_close($db_connection);
}
?>