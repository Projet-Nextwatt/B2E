
<html>
<head>
<title>My Blog</title>
</head>
<body>
	<h1>Welcome to my Blog!</h1>
        
        <?php foreach( $voitures as $voiture ){ ?>
        <h2>Voiture N°<?php echo $voiture->id; ?></h2>
        
        <b>name:</b> <span><?php echo $voiture->name; ?></span><br/>
        <b>color:</b> <span><?php echo $voiture->color; ?></span><br/>
        
        <?php } ?>
        <a href="http://localhost/B2E/Nextwatt/index.php/catalogue">allez à l'index</a>
</body>
</html>
