
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap 101 Template</title>
        <link href="<?php echo $simplesidebar ?>" rel="stylesheet">
    <body>
        <div class="page">
            <h1>Test</h1>
        </div>
<!--        <div id="wrapper">

             Sidebar 
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand"><img src="<?php echo $minilogonextwatt ?>" alt="Mini Logo Nextwatt" />
                    </li>
                    <li><a href="#">Dashboard</a>
                    </li>
                    <li><a href="#">Shortcuts</a>
                    </li>
                    <li><a href="#">Overview</a>
                    </li>
                    <li><a href="#">Events</a>
                    </li>
                    <li><a href="#">About</a>
                    </li>
                    <li><a href="#">Services</a>
                    </li>
                    <li><a href="#">Contact</a>
                    </li>
                </ul>
            </div>

             Page content 
        </div>-->
        <div class="sidebar">
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
    <script language="JavaScript" type="text/javascript" src="<?php echo $jquery ?>"></script> 
    <script language="JavaScript" type="text/javascript" src="<?php echo $bootstrap ?>"></script>

</html>