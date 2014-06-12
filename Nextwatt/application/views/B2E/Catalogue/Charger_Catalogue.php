<html>
<head>
    <title> UPLOAD </title>
</head>
<body>

<?php
var_dump($error);
echo $error;
?>

<?= form_open_multipart('upload/uploadfile') ?>

<input type="file" name="userfile" size="20" />
<br/>
<input type="submit" />

<?php

echo 'ok';
form_close();

print_r($_SERVER);
?>

</body>
</html>