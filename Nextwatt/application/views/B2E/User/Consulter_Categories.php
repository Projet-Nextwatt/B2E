<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->



<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1>Liste des catégories</h1>
</div>

<div class="row">
    <div class="col-xs-12">

        <div class="row">
            <div class="col-xs-12 text-center">
                <a class="btn btn-primary btn-sm" href="<?php echo site_url("CI_user/addcategorie"); ?>">
                    <i class="ace-icon fa fa-plus align-top bigger-125"/></i>Ajouter une cat&eacute;gorie
                </a>
                <br/>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading align-left">Liste des catégories</div>
                    <?php $this->fonctionspersos->creerTableau($categories, array() , 'CI_user/modifcategorie','CI_user/ajax_supprimercategorie ',true); ?>
                </div>
            </div>
        </div>
    </div>
</div>