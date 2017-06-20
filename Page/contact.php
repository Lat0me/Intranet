<?php
require_once 'database.php';
require_once 'Contact/ContactAdd.php';

$query = "SELECT * FROM compagnie";
?>
<button class="btn btn-primary btn-sm" onclick="afficherMasquer(4)"><i class="fa fa-user-plus" aria-hidden="true"></i>
</button>
<br>
<div style="display:none" id="4">
    <center>
        <h3>Ajouter un Contact</h3>
        <form method="post">
            <input type="text" placeholder="Nom" name="nom" class="form-control"><br>
            <input type="text" placeholder="Prenom" name="prenom" class="form-control"><br>
            <input type="text" placeholder="Numéro de téléphone" name="phone" class="form-control"><br>
            <input type="email" placeholder="email" name="mail" class="form-control"><br>
            <select class="form-control" id="comp" name="comp">
                <option value="" disabled="disabled">Compagnie </option>
                <?php
                if ($result = mysqli_query($db_connection, $query)) {
                    /* Récupère un tableau associatif */
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["id"];
                        $nom = $row["nom"];
                        $desc = $row["Description"];
                        echo "<option value=\"",$id,"\">", $nom ,"</option>";
                    }
                }
                ?>
            </select><br>
            <input type="submit" name="add" value="Ajouter" class="btn btn-primary"><br>
        </form>
    </center>
</div>
<?php
if (isset($_POST['add'])) {
    if ($_SESSION['profil'] == "admin") {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $phone = $_POST["phone"];
        $mail = $_POST["mail"];
        $comp = $_POST["comp"];
        addc($db_connection, $nom, $prenom, $phone, $mail, $comp);
        echo "<div class=\"alert alert-info\" role=\"alert\">
                   <strong>Contact!</strong> Bien enregistré.
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

