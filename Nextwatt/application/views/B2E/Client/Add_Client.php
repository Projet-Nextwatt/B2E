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
    <link rel="stylesheet" href="<?php echo $acepart2 ?>"/>
    <![endif]-->
    <link rel="stylesheet" href="<?php echo $acertl ?>"/>
    <!--[if lte IE 9]>
    <link href="<?php echo $aceie ?>" rel="stylesheet"/>
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
            <i class="fa-arrows-h"></i>
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

            <?php echo form_open('client/verif_form_client');

            $dd_civilite = array(
                'monsieur' => 'Monsieur',
                'madame' => 'Madame',
                'mademoiselle' => 'Mademoiselle',

            );

            $placement_dd = 'form_control';

            $attributs2 = array(
                'class' => 'col-sm-2 control-label',
            );
            $form = array(
                'class' => 'form-horizontal',
            );
            $lblnom2 = array(
                'class' => 'col-sm-5 align="center"',
            );
            $nom1 = array(
                'name' => 'nom1',
                'id' => 'nom1',
                'class' => 'form-control',
                'value' => set_value('nom1')
            );
            $prenom1 = array(
                'name' => 'prenom1',
                'id' => 'prenom1',
                'class' => 'form-control',
                'value' => set_value('prenom1')
            );
            $nom2 = array(
                'name' => 'nom2',
                'id' => 'nom2',
                'class' => 'form-control',
                'value' => set_value('nom2')
            );
            $prenom2 = array(
                'name' => 'prenom2',
                'id' => 'prenom2',
                'class' => 'col-sm-offset-1',
                'value' => set_value('prenom2')
            );
            $adresse = array(
                'name' => 'adresse',
                'id' => 'adresse',
                'class' => 'col-sm-offset-1',
                'value' => set_value('adresse')
            );
            $codepostal = array(
                'name' => 'codepostal',
                'id' => 'codepostal',
                'class' => 'col-sm-offset-1',
                'value' => set_value('codepostal')
            );
            $ville = array(
                'name' => 'ville',
                'id' => 'ville',
                'class' => 'col-sm-offset-1',
                'value' => set_value('ville')
            );
            $email = array(
                'name' => 'email',
                'id' => 'email',
                'class' => 'col-sm-offset-1',
                'value' => set_value('email')
            );
            $telfixe = array(
                'name' => 'telfixe',
                'id' => 'telfixe',
                'class' => 'col-sm-offset-1',
                'value' => set_value('telfixe')
            );
            $telportable = array(
                'name' => 'telportable',
                'id' => 'telportable',
                'class' => 'col-sm-offset-1',
                'value' => set_value('telportable')
            );
            $responsable = array(
                'name' => 'responsable',
                'id' => 'responsable',
                'class' => 'col-sm-offset-1',
                'value' => set_value('responsable')
            );

            echo form_open('', $form);?>

            <?php echo validation_errors();?>

            <div class="form-group">
                <?php echo form_label('Nom et Prénom', 'nom1', $lblnom2); ?>
                <div class="col-sm-2">
                    <input type ="text" name="nom1"
                    <?php echo form_input($nom1); ?>
                </div>
                <div class="col-sm-2">
                    <?php echo form_input($prenom1); ?>
                </div>
            </div>
            </br></br></br>
            <div class="form-group">
                <?php echo form_label('Nom et Prénom du conjoint', 'nom2', $lblnom2); ?>
                <div class="col-sm-2">
                    <?php echo form_input($nom2); ?>
                </div>
                <div class="col-sm-2">
                    <?php echo form_input($prenom2); ?>
                </div>
            </div>
            </br></br>
            <div class="form-group">
                <?php echo form_label('Adresse', 'adresse', $lblnom2); ?>
                <div class="col-sm-2">
                    <?php echo form_textarea($adresse); ?>
                </div>
            </div>
            </br></br></br></br></br></br></br></br></br></br></br></br>
            <div class="form-group">
                <?php echo form_label('Code Postal et Ville', 'codepostalville', $lblnom2); ?>
                <div class="col-sm-2">
                    <?php echo form_input($codepostal); ?>
                </div>
                <div class="col-sm-2">
                    <?php echo form_input($ville); ?>
                </div>
            </div>
            </br></br>
            <div class="form-group">
                <?php echo form_label('E-mail', 'email', $lblnom2); ?>
                <div class="col-sm-2">
                    <?php echo form_input($email); ?>
                </div>
            </div>
            </br></br>
            <div class="form-group">
                <?php echo form_label('Téléphone fixe', 'telfixe', $lblnom2); ?>
                <div class="col-sm-2">
                    <?php echo form_input($telfixe); ?>
                </div>
            </div>
            </br></br>
            <div class="form-group">
                <?php echo form_label('Téléphone portable', 'telportable', $lblnom2); ?>
                <div class="col-sm-2">
                    <?php echo form_input($telportable); ?>
                </div>
            </div>
            </br></br>
            <?php echo form_submit('confirmerform', 'Valider');?>

            <?php echo form_close();?>


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