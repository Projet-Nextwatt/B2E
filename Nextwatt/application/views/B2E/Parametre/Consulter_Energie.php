<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->



<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1>Liste des énergies</h1>
</div>

<div class="row">
    <div class="col-xs-12">

        <div class="row">
            <div class="col-xs-12 text-center">
                <a class="btn btn-primary btn-sm" href="<?php echo site_url("parametre/add_energie"); ?>">
                    <i class="ace-icon fa fa-plus align-top bigger-125"/></i>Ajouter une &eacute;nergie
                </a>
                <br/>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading align-left">Liste des énergies</div>
                    <?php $this->fonctionspersos->creerTableau($energies, $eneteteEnergies, 'parametre/modif_energie'/* ,'parametre/ajax_supprimerenergie ' */); ?>
                </div>
            </div>
        </div>
    </div>
</div>