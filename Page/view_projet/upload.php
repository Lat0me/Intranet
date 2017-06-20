<?php
function upload($titre, $file, $file_tmp){
    $target_dir = __DIR__."/dirProjet/".$titre."/";
    move_uploaded_file($file_tmp, $target_dir.  $file);
    echo "<div class=\"alert alert-info\" role=\"alert\">
                   <strong>Fichier!</strong> Bien enregistré.
              </div>";
}
?>