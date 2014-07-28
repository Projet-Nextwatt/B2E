<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->



<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1>Liste des Types</h1>
</div>

<div class="row">
    <div class="col-xs-12">

        <div class="row">
            <div class="col-xs-12 text-center">
                <a class="btn btn-primary btn-sm" href="<?php echo site_url("CI_catalogue/gererlistetype_form"); ?>">
                    <i class="ace-icon fa fa-plus align-top bigger-125"/></i>Ajouter un type
                </a>
                <br/>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading align-left">Liste des Types</div>
                    <?php
                    $this->fonctionspersos->creerTableau($soustypes, $entetesoustype, 'CI_catalogue/modif_soustype');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>