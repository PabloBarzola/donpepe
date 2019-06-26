<?php
    // editar.php

    $id = $_GET['id'];

    echo "El libro es $id";

?>

<form action="upload.php" method="post" enctype="multipart/form-data">  
    Enviar un nuevo archivo:
    <br>
    <input name="userfile" type="file">
    <input name="id" type = "hidden" value="<?php echo $id?>">

    <br>
    <input type="submit" value="Enviar">
</form>

