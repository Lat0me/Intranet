<?php
require_once 'database.php';
?>
<br>

<form action="stocker.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fichier" /><br />
    <input type="submit" value="Envoyer le fichier" />
</form>
