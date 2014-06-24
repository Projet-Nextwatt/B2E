<html>
<head>
    <title> B2E - Nextwatt </title>
</head>
<body>

<div class="page-header">
    <h1 align="center">
        UPLOAD</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Upload d'un nouveau Catalogue</small>
    </h1>
</div>


<?= form_open_multipart('Catalogue/upload_catalogue_action') ?>

<div align="center" class="col-xl-14">
    <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
    Fichier : <input type="file" name="userfile" size="20" />
    <br/>
    <input type="submit" name="valider" value="Confirmer"/>
</div>

<?php form_close();?>

</body>
</html>