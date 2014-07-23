<div class='row'>
    <div class='col-xs-12'>
        <div class="row">
            <div class="col-xs-12 text-center">
                <a class="btn btn-primary btn-sm" href="<?php echo site_url("CI_client/Consult_Client?dossier=TRUE"); ?>">
                    <i class="ace-icon fa fa-plus align-top bigger-125"/></i>Nouveau dossier
                </a>
                <br/>
            </div>
        </div>
        <br/>

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading align-left">Liste des dossiers en cours
                        <span class="badge badge-success"><?php echo count($dossiers);?></span>
                    </div>
                    <?php $this->fonctionspersos->creerTableau($dossiers, array(), 'CI_Dossier/select_dossier') ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading align-left">Liste des dossiers archivés
                        <span class="badge badge-success"><?php echo count($dossiers_archive);?></span>
                    </div>
                    <?php $this->fonctionspersos->creerTableau($dossiers_archive, array(), 'CI_Dossier/select_dossier') ?>
                </div>
            </div>
        </div>
    </div>
</div>