<html>
<head>
    <title> UPLOAD </title>
</head>
<body>

<?php
var_dump($error);
echo $error;
?>

<?= form_open_multipart('Essais/uploadfile') ?>

<input type="file" name="userfile" size="20" />
<br/>
<input type="submit" />


<?php form_close();
?>

</body>
</html>