<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Test sidebar</title>
        <link  rel="stylesheet" href="<?php echo $simplesidebar ?>">
    </head>
    <body>
        <div class="contenu" id="contenu">
            <span>Je suis un test</span>
        </div>
        <div class="sidebar" >
            <div class="sidebar-profil">
                <img src="<?php echo $minilogonextwatt ?>"/>
                <br/>
                <strong>Nextwatt</strong>
            </div>
            <a class="sidebar-item">Menu 1</a>
            <a class="sidebar-item">Menu 2</a>
            <a class="sidebar-item">Menu 3</a>
            <a class="sidebar-item">Menu 4</a>
        </div>
    </body>
</html>