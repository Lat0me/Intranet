<?php
require_once 'database.php';
require_once 'inscription/add.php';
?>
<form method="post">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Chercher un utilisateur" name="mot">
        <div class="input-group-btn">
            <input type="submit" name="search" value="Chercher" class="btn btn-primary">
        </div>
    </div>
</form>
<br>

<button class="btn btn-primary btn-sm" onclick="afficherMasquer(1)"><i class="fa fa-user-plus" aria-hidden="true"></i></button>
<br>
<center>
    <br>
    <div style="display:none" id="1">
        <form method="post">
            <input type="text" placeholder="Prenom" name="username" class="form-control"><br>
            <input type="text" placeholder="Nom" name="name" class="form-control">
            Profil sur l'intranet:<select class="form-control" id="profil" name="profil">
                <option value="user">Utilisateur</option>
                <option value="admin">Administrateur</option>
                <option value="rh">RH</option>
            </select><br>
            <input type="password" placeholder="Mots de passe" name="pass1" class="form-control"><br>
            <input type="password" placeholder="Confirmation Mots de passe" name="pass2" class="form-control"><br>
            <input type="text" placeholder="Fonction dans l'entreprise" name="function" class="form-control"><br>
            <input type="email" placeholder="email" name="mail" class="form-control"><br>
            <input type="submit" name="add" value="Ajouter" class="btn btn-primary"><br>
        </form>
</center>

<?php
if (isset($_POST['search'])) {
    $mot = $_POST["mot"];
    recherche($db_connection, $mot);
}
?>
<div class="row">
    <div class="col-md-12">
        <h3>Liste des utilisateurs</h3>
        <hr>
        <div class="row">
            <?php liste($db_connection) ?>
        </div>
    </div>
</div>
    <?php
    if (isset($_POST['add'])) {
        if ($_POST["pass1"] == $_POST["pass2"]) {
            if ($_SESSION['profil'] == "admin") {
                $password = $_POST["pass1"];
                $pro = $_POST["profil"];
                $username = $_POST["username"];
                $name = $_POST["name"];
                $mail = $_POST["mail"];
                $function = $_POST["function"];

                inscription($username, $name, $password, $pro, $mail, $function, $db_connection);
                echo "<div class=\"alert alert-info\" role=\"alert\">
                            <strong>Utilisateur!</strong> Bien enregistré.
                        </div>";
            } else {
                echo "<div class=\"alert alert-danger\" role=\"alert\">
                        <strong>Erreur</strong> Il faut être administrateur.
                    </div>";
            }
        } else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">
                        <strong>Erreur</strong> Mots de passe non identique.
                    </div>";
        }
    }
    ?>

