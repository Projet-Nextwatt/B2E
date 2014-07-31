<style>
    .ddDossier:hover {
        cursor: pointer;
    }
</style>

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
                    <a href="#actif" data-toggle="tab">Dossiers</a>

                </li>
                <li>
                    <a href="#archives" data-toggle="tab">Archives</a>
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

                                        <dt style="margin-right: 0"><?php echo $d['nom1']; ?></dt><br/>
                                        <?php     $nomClient = $d['nom1'];
                                    } ?>
                                    <dd style="background-color: #cde0f4;width: inherit;padding: 5px;display:inline-block"
                                        class="ddDossier">
                                        <div><strong><?php echo $d['titre'] ?></strong></div>
                                        <div>Montant : <?php echo number_format($d['montant'], 2, ',', ' ') ?> €</div>
                                        <div class="hidden">ID Dossier : <span
                                                class="ddIdDossier"><?php echo $d['idDossier'] ?></span></div>
                                    </dd>
                                </dl>
                            <?php } ?>
                        </div>


                    <?php } ?>
                </div>
                <div class="tab-pane" id="archives">
                    <?php
                    $nomClientArchive = null;
                    $tabClientDossierArchive = array();
                    foreach ($dossiers_archive as $dossierarchive => $dosArch) {
                        ?>
                        <div class="widget-box transparent">
                            <div class="widget-header">
                                <h4 class="widget-title lighter"><?php echo $dossierarchive; ?></h4>

                            </div>

                            <?php foreach ($dosArch as $da) {
                                $tabClientDossierArchive[$da['nom1']][] = $da; ?>
                                <dl id="dt-list-1" class="dl-horizontal">
                                    <?php    if ($da['nom1'] != $nomClientArchive) {
                                        ?>

                                        <dt style="margin-right: 0"><?php echo $da['nom1']; ?></dt><br/>
                                        <?php     $nomClientArchive = $da['nom1'];
                                    } ?>
                                    <dd style="background-color: #cde0f4;width: inherit;padding: 5px;display:inline-block"
                                        class="ddDossier">
                                        <div><strong><?php echo $da['titre'] ?></strong></div>
                                        <div>Montant : <?php echo number_format($da['montant'], 2, ',', ' ') ?> €</div>
                                        <div class="hidden">ID Dossier : <span
                                                class="ddIdDossier"><?php echo $da['idDossier'] ?></span></div>
                                    </dd>
                                </dl>
                            <?php } ?>
                        </div>


                    <?php } ?>
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