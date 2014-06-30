<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1 align="center">
        PAGE CLIENT</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Accueil des clients</small>
    </h1>
</div>

<div class="row">
    <div class="col-xs-12">

        <div class="row">
            <div class="col-xs-12 text-center">
                <a class="btn btn-primary btn-sm" href="<?php echo site_url("CI_client/add_client"); ?>">
                    <i class="ace-icon fa fa-plus align-top bigger-125"/></i>Ajouter un client
                </a>
                <br/>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-xs-12">
                <?php
                                echo('vardump entete');
                var_dump($entete);
                ?>
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading align-left">Liste des clients</div>
                    <?php $this->fonctionspersos->creerTableau($clients, $entete, 'parametre/modif_energie','CI_client/ajax_supprimerclient '); ?>
                </div>
            </div>
        </div>
    </div>
</div>