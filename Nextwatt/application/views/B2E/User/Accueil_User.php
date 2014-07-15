<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1 align="center">
        Gestion des utilisateurs<!-- </br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Accueil des users</small> -->
    </h1>    
</div>

<div class='row'>
    <div class='col-xs-12'>

        
        
        <div class="row">
            <div class="col-xs-12">
                <div class="btn-group">
                    <a href="<?php echo site_url("CI_user/add_user"); ?>">
                        <button  type="button" class="btn btn-white btn-sm btn-primary">
                            <i class="ace-icon fa fa-user icon-animated-vertical"></i>
                            Ajouter un utilisateur
                        </button>
                    </a>
                    <a href="<?php echo site_url("CI_user/gestioncategorie"); ?>">
                        <button type="button" class="btn btn-white btn-sm btn-primary">
                            <i class="ace-icon fa fa-users icon-animated-vertical"></i>
                            Gérer les droits et les catégories</button></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading align-left">Liste des utilisateurs</div>
                    <?php $this->fonctionspersos->creerTableau($users, array(), 'CI_User/modif_user') ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading align-left">Liste des utilisateurs désactivés</div>
                    <?php $this->fonctionspersos->creerTableau($usersinactifs, array(), 'CI_User/modif_user') ?>
                </div>
            </div>
        </div>
    </div>
</div>

