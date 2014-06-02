<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <!-- use the following meta to force IE use its most up to date rendering engine -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title> page tite </title>
    <meta name="description" content="page description"/>
    <link rel="stylesheet" href="<?php echo $bootstrapmincss ?>"/>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $acefonts ?>"/>
    <link rel="stylesheet" href="<?php echo $acemincss ?>"/>
    <!--[if lte IE 9]>
    <!--<link rel="stylesheet" href="<?php echo $acepart2 ?>"/>-->
    <![endif]-->
    <link rel="stylesheet" href="<?php echo $acertl ?>"/>
    <!--[if lte IE 9]>
    <!--<link href="<?php echo $aceie ?>" rel="stylesheet"/>-->
    <![endif]-->
    <link rel="stylesheet" href="<?php echo $aceskins ?>"/>
    <!-- some scripts should be  here, refer to files/javascript documentation -->
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

        <div class="navbar-header pull-left">
            <!-- brand text here -->
            <a href="<?php echo site_url("accueil/index"); ?>"><img src="<?php echo $minilogonextwatt ?>"></a>
        </div>
        <!-- /.navbar-header -->

        <div class="navbar-buttons navbar-header pull-right">
            <ul class="nav ace-nav">
                <!-- user buttons such as messages, notifications and user menu -->
            </ul>
        </div>
        <!-- /.navbar-buttons -->


        <nav class="navbar-menu pull-left">
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

        </div>

        <ul class="nav nav-list">
            <!-- first level item -->
            <li>
                <a href="<?php echo site_url("catalogue/consult_catalogue"); ?>">
                    <i class="menu-icon fa fa-book"></i>
                    Catalogue
                </a>
            </li>

            <!-- second level item -->
            <li>
                <a href="<?php echo site_url("client/consult_client"); ?>">
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
                <a href="<?php echo site_url("user/consult_user"); ?>">
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
        </ul>

        <div class="sidebar-toggle sidebar-collapse">
            <i class="fa-arrows-h" ></i>
        </div>

    </div>

    <div class="main-content">
        <div class="breadcrumbs">
            <!-- breadcrumbs goes here -->
        </div>

        <div class="page-content">
            <div class="ace-settings-container" id="ace-settings-container">
                <!-- settings box goes here -->
            </div>

            <div class="page-header">
                <h1 align="center">
                    <p>
                        <img src="/assets/images/mini_logo_NW.png" alt="NextWatt" />
                    </p>
                    PAGE CLIENT</br>
                   <small><i class="ace-icon fa fa-angle-double-right"></i> Accueil des clients</small>
                </h1>
            </div>
            
        </div>
        <!-- /.page-content -->
    </div>
    <!-- /.main-content -->

    <!-- footer area -->

    
</div>
<!-- /.main-container -->

<!-- list of script files -->
<!--[if !IE]> -->
<script src="<?php echo $jquerymin ?>"></script>
<!-- <![endif]-->
<!--[if lte IE 9]>
<script src="<?php echo $jquery1xmin ?>"></script>
<![endif]-->

<script src="<?php echo $bootstrapmin ?>"></script>


<script src="<?php echo $aceelementsmin ?>"></script>
<script src="<?php echo $acemin ?>"></script>

<script type="text/javascript">
    //If page has any inline scripts, it goes here
    //    jQuery(function ($) {
    //        alert('hello!');
    //    });
</script>
</body>
</html>