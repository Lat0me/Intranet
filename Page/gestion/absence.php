<?php
$id = $_GET["id"];
require_once 'database.php';
require_once 'addabs.php';
echo "<br>";
?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <h4>Prochaine absences</h4>
                    <?php echo $_SESSION['nom'], " ",$_SESSION['connex'], "<br>";
                    echo $_SESSION['email'], "<br>";
                    echo $_SESSION['fonction'];
                    ?>
                </div>
            </div>
        </div>
    </div>
    <br>
    <form method="post">
        Premier jour <input type="date" name="dated" class="form-control">
        <br>
        Dernier jour <input type="date" name="datef" class="form-control">
        <br>
        <input type="text" placeholder="Description" name="desc" class="form-control">
        <br>
        <input type="submit" name="add" value="Déclarer" class="btn btn-primary"><br>
    </form>
<?php
if (isset($_POST['add'])) {
    if ($_SESSION['id'] == $id) {
        $dated = $_POST["dated"];
        $datef = $_POST["datef"];
        $desc = $_POST["desc"];
        $nom = $_SESSION["nom"];
        $prenom = $_SESSION['connex'];

        addabs($db_connection, $desc, $nom, $prenom, $dated, $datef, $id);
        echo "<div class=\"alert alert-info\" role=\"alert\">
                   <strong>Demande!</strong> Bien enregistré.
              </div>";

    }
}
?>