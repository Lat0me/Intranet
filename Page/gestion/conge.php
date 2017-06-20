<?php
$id = $_GET["id"];
require_once 'database.php';
require_once 'addbreak.php';
echo "<br>";
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-block">
                <h4>Demande de congé</h4>
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
    <input type="submit" name="add" value="Demander" class="btn btn-primary"><br>
</form>
<?php
if (isset($_POST['add'])) {
    if ($_SESSION['id'] == $id) {
        $dated = $_POST["dated"];
        $datef = $_POST["datef"];
        $nom = $_SESSION["nom"];
        $prenom = $_SESSION['connex'];

        addbreak($db_connection, $nom, $prenom, $dated, $datef, $id);
        echo "<div class=\"alert alert-info\" role=\"alert\">
                   <strong>Demande!</strong> Bien enregistré.
              </div>";

    }
}
?>