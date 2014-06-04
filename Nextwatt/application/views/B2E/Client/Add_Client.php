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
                            PAGE CLIENT</br>
                            <small><i class="ace-icon fa fa-angle-double-right"></i> Accueil des clients</small>
                        </h1>
                    </div>

                    <form class="form-horizontal" role="form">

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-5 control-label">Civilité</label>
                            <div class="col-sm-3">
                                <select name="myselect" class="dropdown">
                                    <option value="1" >Madame</option>
                                    <option value="2">Mademoiselle</option>
                                    <option value="3" selected>Monsieur</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-5 control-label">Nom et Prénom </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" placeholder="Votre Nom">
                            </div>
                            <div  class="col-sm-2">
                                <input  type="text" class="form-control" placeholder="Votre prénom">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-5 control-label">Nom et Prénom (Conjoint)</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" placeholder="Votre Nom">
                            </div>
                            <div  class="col-sm-2">
                                <input  type="text" class="form-control" placeholder="Votre prénom">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-5 control-label">Adresse</label>
                            <div class="col-sm-4">
                                <textarea class="col-sm-9" rows="3" placeholder="Votre adresse"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-5 control-label">Code Postal et Vile </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" placeholder="Code Postal">
                            </div>
                            <div  class="col-sm-2">
                                <input  type="text" class="form-control" placeholder="Ville">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-5 control-label">Email</label>
                            <div class="col-sm-3">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email" required value>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-5 control-label">Téléphone (fixe et portable)</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="Teléphone fixe">
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="Teléphone portable">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-5 control-label">Responsable</label>
                            <div class="col-sm-3">
                                <select name="myselect" class="dropdown">
                                    <option value="1">Stephane</option>
                                    <option value="2">Xavier</option>
                                    <option value="2">Marc</option>
                                </select>
                            </div>
                        </div></br>

                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-10">
                                <button class="btn btn-sm btn-info btn-white">
                                    <i class="ace-icon fa fa-floppy-o bigger-160"></i>
                                    Enregistrer
                                </button>
                            </div>
                        </div>
                    </form>



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



        <script src="<?php echo $acemin ?>"></script>
        <script src="<?php echo $aceelementsmin ?>"></script>

        <script type="text/javascript">
            //If page has any inline scripts, it goes here
            //    jQuery(function ($) {
            //        alert('hello!');
            //    });
        </script>
    </body>
</html>