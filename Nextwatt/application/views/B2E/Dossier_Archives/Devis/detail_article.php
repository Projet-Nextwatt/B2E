<div class="page-content">
    <div class="row form-group">
        <div class="col-xs-12">
            <div class="row" align="center">
                <a href="<?php echo site_url("CI_devis/devis_form"); ?>">
                    <button type="button" class="btn btn-white ntn-bold btn-round">
                        <i class="ace-icon fa fa-angle-left bigger-140"></i>
                        Retour au devis
                    </button>
                </a>
            </div>
        </div>
        <br/><br/><br/>

        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-md-8 col-md-offset-2">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Détail de l'article
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <p style="float: left"> R25AZD689AD535</p>

                            <div align="center">
                                <button type="button" class="btn btn-white disabled">
                                    Faire une remise (en construction)
                                </button>

                                <a href="<?php echo site_url("CI_devis/supprimer_article"); ?>">
                                <button style="float: right" type="button" class="btn btn-white">
                                    Supprimer (en construction)
                                </button></a>
                            </div>
                        </div>
                        <br/>

                        <div class="row">
                            <div class="widget-box transparent" style="opacity: 1; z-index: 0; margin: 5px">
                                <div class="widget-header">
                                    <h4 class="widget-title lighter green"><?php echo('NOM DU TYPE DU PRODUIT') ?></h4>
                                    <h4 class="widget-title lighter green" style="float: right">Prix TTC</h4>

                                </div>

                                <div class="widget-body">
                                    <div class="widget-main padding-6 no-padding-left no-padding-right"
                                         style="margin: 5px;">
                                        <div class="bigger-110 "><p
                                                class="width-80 no-margin inline"><?php echo 'Panneau yolo trop SWAG' ?></p>

                                            <p style="float: right"><?php echo('19 235') ?> €</p><br/>
                                        </div>
                                        <br/>


                                        <div class="bigger-110 green">Option :</div>
                                        <div class="hr hr-2 hr-dotted"></div>
                                        <div class="bigger-110"><?php echo('Option numéro 1 Trop génial') ?><p
                                                class="no-margin" style="float: right"><?php echo('765,00') ?> €</p>
                                            <br/>
                                        </div>
                                        <div class="bigger-110">Main d'oeuvre : <p style="float: right"
                                                                                   class="no-margin"><?php echo('423,00') ?>
                                                €</p></div>
                                    </div>

                                </div>
                            </div>
                            <div class="widget-box transparent" style="opacity: 1; z-index: 0; margin: 5px">
                                <div class="widget-header">
                                    <h4 class="widget-title lighter green"><?php echo('Options disponibles pour le produit') ?></h4>
                                    <h4 class="widget-title lighter green" style="float: right">Prix TTC</h4>

                                </div>

                                <div class="widget-body">
                                    <div class="widget-main padding-6 no-padding-left no-padding-right"
                                         style="margin: 5px;">
                                        <?php $this->fonctionspersos->creerTableau($options, $entete = null, 'CI_devis/select_produit_devis', null); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
</div>
=======
</div>
>>>>>>> origin/Developpement
