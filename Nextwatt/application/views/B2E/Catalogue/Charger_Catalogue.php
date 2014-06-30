<html>
<head>
    <title> UPLOAD </title>
</head>
<body>

<?php
//echo $error;
?>

<?= form_open_multipart('CI_catalogue/upload_catalogue_action') ?>
    <fieldset align="center">
        <legend>Upload d'un nouveau catalogue</legend>
        <br/>
        <br/>
        <div align="center">
            <input align="center" type="file" name="userfile" />
        </div>
        <br/>
        <br/>
        <button type="submit" class=" btn btn-white btn-sm btn-primary ">Envoyer !</button>
    </fieldset>

<?php

form_close();


?>

</body>
</html>

