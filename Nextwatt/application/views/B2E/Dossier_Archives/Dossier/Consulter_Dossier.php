<div class='row'>
    <div class='col-xs-12'>
        <div class="row">
            <div class="col-xs-12 text-center">
                <a class="btn btn-primary btn-sm"
                   href="<?php echo site_url("CI_client/Consult_Client?dossier=TRUE"); ?>">
                    <i class="ace-icon fa fa-plus align-top bigger-125"/></i>Nouveau dossier
                </a>
                <br/>
            </div>
        </div>
        <br/>

        <div class="tabbable">

            <ul id="myTab" class="nav nav-tabs">
                <li <?php echo(empty($_POST) ? 'class="active"' : ''); ?>>
                    <a href="#actif" data-toggle="tab">Dossiers <span
                            class="badge badge-success"><?php echo count($dossiers); ?></span></a>

                </li>
                <li>
                    <a href="#archives" data-toggle="tab">Archives <span
                            class="badge badge-success"><?php echo count($dossiers_archive); ?></span></a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane in <?php echo(empty($_POST) ? 'active' : ''); ?>" id="actif">

                    <?php
                    $nomClient = null;
                    $tabClientDossier = array();
                    foreach ($dossiers as $dossier => $dos) {
                    ?>
                    <div class="widget-box transparent">
                        <div class="widget-header">
                            <h4 class="widget-title lighter"><?php echo $dossier; ?></h4>

                        </div>

                        <?php foreach ($dos as $d) {
                            $tabClientDossier[$d['nom1']][] = $d; ?>
                            <dl id="dt-list-1" class="dl-horizontal">
                        <?php    if ($d['nom1'] != $nomClient) {
                                ?>

                                <dt><?php echo $d['nom1']; ?></dt>
                                <?php     $nomClient = $d['nom1'];
                            } ?>
                            <dd>
                                <div>Titre : <?php echo $d['titre'] ?> </div>
                                <div>Montant : <?php echo number_format($d['montant'], 2, ',', ' ') ?> €</div>
                                <div class="hidden">ID Dossier : <?php echo $d['idDossier'] ?> </div>
                            </dd>
                            </dl>
                        <?php } ?>
                    </div>


                <?php } ?>
            </div>
                <div class="tab-pane" id="archives">
                    <div class="panel panel-success">
                        <div class="panel-heading align-left">Liste des dossiers archivés
                            <!--                            <span class="badge badge-success">-->
                            <?php //echo count($dossiers_archive);?><!--</span>-->
                        </div>
                        <?php $this->fonctionspersos->creerTableau($dossiers_archive, array(), 'CI_dossier/select_dossier') ?>
                    </div>

                </div>
            </div>
        </div>

        <!--        <div class="row">-->
        <!--            <div class="col-xs-12">-->
        <!--                <div class="panel panel-success">-->
        <!--                    <div class="panel-heading align-left">Liste des dossiers en cours-->
        <!--                        <span class="badge badge-success">-->
        <?php //echo count($dossiers);?><!--</span>-->
        <!--                    </div>-->
        <!--                    --><?php
        //
        //                    $this->fonctionspersos->creerTableau($dossiers, array(), 'CI_dossier/select_dossier')
        ?>
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!---->
        <!--        <div class="row">-->
        <!--            <div class="col-xs-12">-->
        <!--                <div class="panel panel-success">-->
        <!--                    <div class="panel-heading align-left">Liste des dossiers archivés-->
        <!--                        <span class="badge badge-success">-->
        <?php //echo count($dossiers_archive);?><!--</span>-->
        <!--                    </div>-->
        <!--                    --><?php //$this->fonctionspersos->creerTableau($dossiers_archive, array(), 'CI_dossier/select_dossier') ?>
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!---->
        <!--       <div class="row">-->
        <!--            <div class="col-xs-12">-->
        <!--                --><?php
        //                $idclient = null;
        //
        //                var_dump($dossiers);
        //
        ?>
        <!--            </div>-->
        <!--        </div>-->
    </div>
</div>