<<<<<<< HEAD
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
=======
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
>>>>>>> origin/Developpement
