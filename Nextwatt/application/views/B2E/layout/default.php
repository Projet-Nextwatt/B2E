
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <!-- use the following meta to force IE use its most up to date rendering engine -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title> <?php echo $title_for_layout ?></title>
    <meta name="description" content="page description"/>
    <?php echo $css_for_layout ?>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="SHORTCUT ICON" href="<?php echo img_url('favicon.ico'); ?>">
</head>

<body class="skin-1">
<div class="navbar" id="navbar">
    <!-- navbar goes here -->
    <div id="navbar-container" class="navbar-container">
        <!-- toggle buttons are here or inside brand container -->
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
            <span class="sr-only">Toggle sidebar</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="navbar-header pull-left ">
            <!-- brand text here -->
            <a href="<?php echo site_url("Accueil"); ?>" >
                <img src="<?php echo img_url('LogoNextwatt.png'); ?>" width="190" height="40" alt="Logo Nextwatt"/>
            </a>
        </div>
        <!-- /.navbar-header -->

<!--        <div class="navbar-buttons navbar-header pull-right">-->
<!--            <ul class="nav ace-nav">-->
<!---->
<!--                <!-- user buttons such as messages, notifications and user menu -->
<!--            </ul>-->
<!--        </div>-->
        <!-- /.navbar-buttons -->


        <nav class="navbar-menu pull-right col-md-9">
            <?php if (isset($breadcrumbs_for_layout)) {
                echo $breadcrumbs_for_layout;
            } ?>
            <!-- optional menu & form inside navbar -->
        </nav>
        <!-- /.navbar-menu -->

    </div>
    <!-- /.navbar-container -->
</div>

<div class="main-container" id="main-container">
    <div class="sidebar responsive" id="sidebar">
        <!-- sidebar goes here -->

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
            
            <a href="<?php echo site_url("login/deconnexion"); ?>">se deconnecter</a>
        </div>

        <ul class="nav nav-list">
            <!-- first level item -->
            <li>
                <a href="<?php echo site_url("CI_catalogue"); ?>">
                    <i class="menu-icon fa fa-book"></i>
                    Catalogue
                </a>
            </li>

            <!-- second level item -->
            <li>
                <a href="<?php echo site_url("CI_client/consult_client"); ?>">
                    <i class="menu-icon fa fa-user"></i>
                    Client
                </a>
            </li>
            <!-- third level item -->
            <li>
                <a href="<?php echo site_url("dossier/consult_dossier"); ?>">
                    <i class="menu-icon fa fa-folder"></i>
                    Dossier
                </a>
            </li>
            <!-- fourth level item -->
            <li>
                <a href="<?php echo site_url("CI_user/consult_user"); ?>">
                    <i class="menu-icon fa fa-users"></i>
                    Utilisateurs
                </a>
            </li>
            <!-- fifth level item -->
            <li>
                <a href="<?php echo site_url("personnalisation/accueil_perso"); ?>">
                    <i class="menu-icon fa fa-cog"></i>
                    Mon compte
                </a>
            </li>
            <li>
                <a href="<?php echo site_url("parametre"); ?>">
                    <i class="menu-icon fa fa-cog"></i>
                    Param&egrave;tres
                </a>
            </li>

        </ul>

        <div class="sidebar-toggle sidebar-collapse">
            <i class="fa-arrows-h"></i>
        </div>

    </div>

    <div class="main-content">
        <!--        <div class="breadcrumbs">-->
        <!---->
        <!--        </div>-->
        <div class="page-content">

            <?php echo $content_for_layout; ?>

        </div>
    </div>
    <!-- /.main-content -->

    <!-- footer area -->
</div>

<!-- /.main-container -->
<?php echo $js_for_layout; ?>
<?php echo $funcjs_for_layout; ?>
</body>
</html>
