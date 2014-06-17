<html>
<head>
    <title> UPLOAD </title>
</head>
<body>

<?php
var_dump($error);
echo $error;
?>

<?= form_open_multipart('test/upload') ?>

<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
Ficher : <input type="file" name="userfile" size="20" />
<br/>
<input type="submit" name="valider" value/>


<?php form_close();?>

</body>
</html>