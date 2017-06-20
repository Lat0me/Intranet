<?php
$id = $_GET["id"];
require_once 'database.php';
require_once 'inscription/viewOne.php';

if ($_SESSION['id'] == $id){
    echo "<br> <h3>Votre Profil</h3>";
}
printone($db_connection, $id);
?>
<tr>
    <td>Modifier le profil Intranet</td><td></td>
    <td><center><button class="btn btn-primary btn-sm" onclick="afficherMasquer(2)"><i class="fa fa-pencil" aria-hidden="true"></i></button></center></td>
</tr>
<tr>
    <td>Modifier le mots de passe</td><td></td>
    <td><center><button class="btn btn-primary btn-sm" onclick="afficherMasquer(3)"><i class="fa fa-pencil" aria-hidden="true"></i></button></center></td>
</tr>
</table>
<br>

<div style="display:none" id="1">
    <br>
    <p>Il s'agit de l'identifiant de connexion</p>
    <form method="post">
        <input type="text" placeholder="Prenom" name="username" class="form-control">
        <input type="submit" name="add1" value="Modifier" class="btn btn-primary">
    </form>
<?php
if (isset($_POST['add1'])) {
    if ($_SESSION['profil'] == "admin") {
        $username = $_POST["username"];

        add1($username, $db_connection, $id);
        echo "<div class=\"alert alert-info\" role=\"alert\">
                   <strong>Modification!</strong> Bien enregistré.
              </div>";
    } else {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
                    <strong>Erreur</strong> Il faut être administrateur.
                </div>";
    }
}
?>
</div>

<div style="display:none" id="6">
    <br>
    <form method="post">
        <input type="text" placeholder="Nom" name="name" class="form-control">
        <input type="submit" name="add1" value="Modifier" class="btn btn-primary"><br>
    </form>
    <?php
    if (isset($_POST['add6'])) {
        if ($_SESSION['profil'] == "admin") {
            $name = $_POST["name"];

            add1($name, $db_connection, $id);
            echo "<div class=\"alert alert-info\" role=\"alert\">
                   <strong>Modification!</strong> Bien enregistré.
              </div>";
        } else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">
                    <strong>Erreur</strong> Il faut être administrateur.
                </div>";
        }
    }
    ?>
</div>

<div style="display:none" id="2">
    <br>
    <form method="post">
        Profil sur l'intranet:<select class="form-control" id="profil" name="profil">
            <option value="user">Utilisateur</option>
            <option value="admin">Administrateur</option>
            <option value="rh">RH</option>
        </select>
        <input type="submit" name="add2" value="Modifier" class="btn btn-primary"><br>
    </form>
    <?php
    if (isset($_POST['add2'])) {
        if ($_SESSION['profil'] == "admin") {

            $pro = $_POST["profil"];

            add2($pro, $db_connection, $id);
            echo "<div class=\"alert alert-info\" role=\"alert\">
                   <strong>Modification!</strong> Bien enregistré.
              </div>";
        } else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">
                    <strong>Erreur</strong> Il faut être administrateur.
                </div>";
        }
    }
    ?>
</div>

<div style="display:none" id="3">
    <br>
    <form method="post">
        <input type="password" placeholder="Mots de passe" name="pass1" class="form-control"><br>
        <input type="password" placeholder="Confirmation Mots de passe" name="pass2" class="form-control">
        <input type="submit" name="add3" value="Modifier" class="btn btn-primary"><br>
    </form>
<?php
if (isset($_POST['add3'])) {
    if ($_POST["pass1"] == $_POST["pass2"]) {
        if ($_SESSION['id'] == $id) {
            $password = $_POST["pass1"];
            add3($password, $db_connection, $id);
            echo "<div class=\"alert alert-info\" role=\"alert\">
                   <strong>Modification!</strong> Bien enregistré.
              </div>";
        } elseif ($_SESSION['profil'] == "admin"){
            $password = $_POST["pass1"];
            add3($password, $db_connection, $id);
            echo "<div class=\"alert alert-info\" role=\"alert\">
                   <strong>Modification!</strong> Bien enregistré.
              </div>";
        }
        else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">
                        <strong>Erreur</strong> Il faut être administrateur, ou être sur votre profil
                    </div>";
        }
    } else {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
                        <strong>Erreur</strong> Mots de passe non identique.
                    </div>";
    }
}
?>
</div>

<div style="display:none" id="4">
    <br>
    <form method="post">
        <input type="email" placeholder="email" name="mail" class="form-control">
        <input type="submit" name="add4" value="Modifier" class="btn btn-primary"><br>
    </form>
    <?php
    if (isset($_POST['add4'])) {
        if ($_SESSION['profil'] == "admin") {

            $mail = $_POST["mail"];

            add4($mail, $db_connection, $id);
            echo "<div class=\"alert alert-info\" role=\"alert\">
                   <strong>Modification!</strong> Bien enregistré.
              </div>";
        } else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">
                    <strong>Erreur</strong> Il faut être administrateur.
                </div>";
        }
    }
    ?>
</div>

<div style="display:none" id="5">
    <br>
    <form method="post">
        <input type="text" placeholder="Fonction dans l'entreprise" name="function" class="form-control">
        <input type="submit" name="add5" value="Modifier" class="btn btn-primary"><br>
    </form>
    <?php
    if (isset($_POST['add4'])) {
        if ($_SESSION['profil'] == "admin") {

            $fonction = $_POST["function"];

            add5($fonction, $db_connection, $id);
            echo "<div class=\"alert alert-info\" role=\"alert\">
                   <strong>Modification!</strong> Bien enregistré.
              </div>";
        } else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">
                    <strong>Erreur</strong> Il faut être administrateur.
                </div>";
        }
    }
    ?>
</div>