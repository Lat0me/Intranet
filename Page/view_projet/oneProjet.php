<?php
require_once ('upload.php');
function printone($db_connection, $id)
{
    $query = "SELECT * FROM Projet WHERE id = ".$id." ";
    if ($result = mysqli_query($db_connection, $query)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $titre = $row["Titre"];
            $desc = $row["Description"];
            $dated = $row["date_debut"];
            $datef = $row["date_fin"];
            $dir = __DIR__."/dirProjet/".$titre."";
            $file = scandir($dir);
            echo "<div class='row'>
                    <div class='col-md-12'>
                    <div class=\"card\">
                            <div class=\"card-block\">";
                    echo "<h3>", $titre,"</h3><br>";
                    echo "Date de lancement : ",  $dated, "<br>";
                    echo "Date de fin : ", $datef, "<br><br>";
                    echo "<h4>Description :</h4>";
                    echo $desc, "<br>";
            echo "<div class=\"card\">
                            <div class=\"card-block\">";
            echo "<h4>Fichier du Projet</h4>";
            echo "<button class=\"btn btn-primary btn-sm\" onclick=\"afficherMasquer(5)\"><i class=\"fa fa-folder-open-o\" aria-hidden=\"true\"></i>
    </button>";
            echo "<br>";
            echo "<div style=\"display:none\" id=\"5\">";
            echo "    <form method=\"post\" enctype=\"multipart/form-data\">
                        <center>
                        <input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\" class=\"btn btn-outline-info btn-sm\"><br>
                        <br>
                        <input type=\"submit\" value=\"Upload du fichier\" name=\"submit\" class=\"btn btn-outline-primary btn-sm\">
                        </center>
                     </form>
            ";
            echo "</div>";
            echo"<br>";
            echo "<table class=\"table table-striped\">";
            $i = 0;
            foreach ($file as $value)
            {
                $i ++;
                if ($value == "."){}
                elseif ($value == "..") {}
                else {
                    echo "<tr><td>";
                    $path_parts = pathinfo($dir . "/" . $value);
                    $path_parts['extension'];
                    if ($path_parts['extension'] == "txt") {
                        echo "<i class=\"fa fa-file-text-o\" aria-hidden=\"true\"></i> ";

                    } elseif (in_array($path_parts['extension'], ['jpg', 'png', 'gif', 'bmp', 'png', 'swf', 'ai', 'tif'])){
                        echo "<i class=\"fa fa-file-image-o\" aria-hidden=\"true\"></i> ";
                    }
                    elseif (in_array($path_parts['extension'], ['doc', 'docx'])){
                        echo "<i class=\"fa fa-file-word-o\" aria-hidden=\"true\"></i> ";
                    }
                    elseif (in_array($path_parts['extension'], ['xls', 'xlsx'])){
                        echo "<i class=\"fa fa-file-excel-o\" aria-hidden=\"true\"></i> ";
                    }
                    elseif (in_array($path_parts['extension'], ['ppt', 'pptx'])){
                        echo "<i class=\"fa fa-file-powerpoint-o\" aria-hidden=\"true\"></i> ";
                    }
                    elseif ($path_parts['extension'] == "mp3"){
                        echo "<i class=\"fa fa-file-audio-o\" aria-hidden=\"true\"></i> ";
                    }
                    elseif (in_array($path_parts['extension'], ['mp4', 'avi'])){
                        echo "<i class=\"fa fa-file-powerpoint-o\" aria-hidden=\"true\"></i> ";
                    }
                    elseif (in_array($path_parts['extension'], ['zip', 'tar', 'gz', 'tar'])){
                        echo "<i class=\"fa fa-file-archive-o\" aria-hidden=\"true\"></i> ";
                    }
                    else {
                        echo "<i class=\"fa fa-file\" aria-hidden=\"true\"></i> ";
                    }
                    echo $value, "<br>";
                    echo "</td><td>";
                    echo "<form method=\"post\">
                            <button type=\"submit\" name='down_".$i."' class=\"btn btn-info btn-sm\"><i class=\"fa fa-cloud-download\" aria-hidden=\"true\"></i></button>
                          </form>";
                    echo "</td><td>";
                    echo "<form method=\"post\">
                            <button type=\"submit\" name='dell_".$i."' class=\"btn btn-danger btn-sm\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></button>
                          </form>";
                    echo "</td></tr>";
                    if (isset($_POST["dell_".$i])){
                        if ($_SESSION['profil'] == "admin") {
                            unlink(__DIR__."/dirProjet/".$titre."/".$value);
                            echo "<div class=\"alert alert-danger\" role=\"alert\">
                                        <strong>Fichier!</strong> Bien supprimé.
                                </div>";
                        } else {
                            echo "<div class=\"alert alert-danger\" role=\"alert\">
                         <strong>Erreur</strong> Il faut être administrateur.
                         </div>";
                        }
                    }
                    if (isset($_POST["down_".$i])){
                        $filename = "Page/view_projet/dirProjet/".$titre."/".$value;
                        header('Content-Type: application/octet-stream');
                        header("Content-Transfer-Encoding: Binary");
                        header('Location:'.$filename);
                        readfile($filename);
                    }
                }
            }
            echo "</table>";
            if (isset($_POST['submit'])){
                $file = $_FILES['fileToUpload']['name'];
                $file_tmp = $_FILES['fileToUpload']['tmp_name'];
                upload($titre, $file, $file_tmp);
            }
            echo "</div></div>";
            echo "    </div>
                  </div>
                </div>
              </div>";
	    echo "<br>";
        }
    }
}
function addtask($db_connection, $titre, $desc, $datef, $id, $user)
{
    $requete = "INSERT INTO Projet_taches VALUES (NULL, '" . $titre . "', '" . $desc . "', NOW(), '$datef', '" . $id . "', '" . $user . "');";

    // execution de la requte avec des résultats
    $req = mysqli_query($db_connection, $requete) or die('Erreur SQL !<br />' . $requete . '<br />' . mysqli_error($db_connection));
}
function printTaches($db_connection, $id)
{
    $query = "SELECT * FROM Projet_taches WHERE id_projet = " . $id . " ";

    if ($result = mysqli_query($db_connection, $query)) {
        echo "<div class='row'>";
        while ($row = mysqli_fetch_assoc($result)) {
            $titre = $row["Titre"];
            $desc = $row["Description"];
            $dated = $row["date_debut"];
            $datef = $row["date_fin"];
            $user = $row["user"];
            $id = $row["id"];
            echo " <div class='col-md-3'>
                        <div class=\"card\">
                            <div class=\"card-block\">";
            echo "<h4>", $titre, "</h4><br>";
            echo "Date de lancement : ", $dated, "<br>";
            echo "Date de fin : ", $datef, "<br><br>";
            echo "<h5>Desciption :</h5>";
            echo $desc, "<br><br>";
            echo "Créateur : ", $user;
            echo "<form method=\"post\">
                        <button type=\"submit\" name='" . $id . "' class=\"btn btn-danger\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></button>
                    </form>";
            if (isset($_POST[$id])) {
                if ($_SESSION['profil'] == "admin") {
                    del($db_connection, $id);
                } else {
                    echo "<div class=\"alert alert-danger\" role=\"alert\">
                        <strong>Erreur</strong> Il faut être administrateur.
                    </div>";
                }
            }
            echo "    </div>
                        </div>
                    </div>";
        }
        echo "</div>";
    }
}
function del($db_connection, $id)
{
    $query = "DELETE FROM Projet_taches WHERE id = '".$id."' ";
    $req = mysqli_query($db_connection, $query) or die('Erreur SQL !<br />' . $query . '<br />' . mysqli_error($db_connection));
}
?>
