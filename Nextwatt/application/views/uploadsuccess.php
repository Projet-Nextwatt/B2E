<html>
<head>
    <title> UPLOAD </title>
</head>
<body>
<h4>Le fichier a bien été uploadé</h4>

<?php
    foreach($uploaded_data as $k => $v)
    {
        echo "<br/>".$k." => ".$v;
    }
?>
<?php echo anchor("upload", 'Upload more files ') ?> ?
</body>
</html>