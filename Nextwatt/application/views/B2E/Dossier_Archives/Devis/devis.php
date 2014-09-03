<style>
    .divArticle:hover{
        cursor: pointer;
    }
</style>
<div class="page-header">
    <h1 class='center'>DEVIS</h1>

    <div align="center">
        <br/>

        <div class="btn-group">
            <a href="<?php echo site_url("CI_dossier/select_dossier"); ?>">
                <button type="button" class="btn btn-sm btn-primary">Retour</button>
            </a>
            <a href="<?php echo site_url("CI_dossier/archiver"); ?>">
                <button type="button" class="btn btn-sm btn-grey disabled">Archiver le dossier (en construction)
                </button>
            </a>
            <a href="<?php echo site_url("CI_catalogue/pdf"); ?>">
                <button type="button" class="btn btn-sm btn-primary"><i class="ace-icon fa fa-print bigger-120"></i>Devis
                    PDF
                </button>
            </a>
            <a href="<?php echo site_url("CI_catalogue/upload_catalogue_form"); ?>">
                <button type="button" class="btn btn-sm btn-grey disabled">Bdc PDF (en construction)</button>
            </a>
        </div>
    </div>
</div>

<div class="page-content">

    <div class="row form-group">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-0 col-md-4 col-md-offset-2">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Client
                        </div>
                        <div class="panel-body">
                            <strong>
                            <?php
                            if (empty($client['prenom1'])) {
                                $civ = $client['civilite'];
                                echo($civ == 1 ? 'Madame ' : '');
                                echo($civ == 2 ? 'Mademoiselle ' : '');
                                echo($civ == 3 ? 'Monsieur ' : '');
                            }
                            echo $client['nom1'] . ' ' . $client['prenom1'];
                            if (!(empty($client['prenom2']))) {
                                echo ' et ';
                                if ($client['nom1'] != $client['nom2']) {
                                    echo $client['nom2'];
                                }

                                echo ' ' . $client['prenom2'];
                            }
                            ?>
                            </strong>
                            <br/>
                            <br/>
                    <strong>Votre contact : </strong> <?php echo $user['prenom'].' '.$user['nom']; ?>

                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-xs-offset-0 col-md-4 col-md-offset-0">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Tarif
                        </div>
                        <div class="panel-body bigger-120">
                            <p><strong>Total TTC : <?php echo number_format($devis['TOTAL_TTC'], 2, ',', ' '); ?>
                                    €</strong></p>

                            <p class="smaller-95">Dont TVA
                                : <?php echo number_format($devis['TOTAL_TVA'], 2, ',', ' '); ?> €</p>
                        </div>
                    </div>
                </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-xs-12 col-xs-offset-0 col-md-8 col-md-offset-2">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Votre devis
                            <div class="" style="float: right">
                                <a href="<?php echo site_url("CI_devis/consult_catalogue_devis"); ?>">
                                    <button class="btn btn-white btn-inverse btn-bold btn-xs">
                                        <i class="ace-icon fa fa-plus-square bigger-110"></i>
                                        Ajouter un article
                                    </button>
                                    <!--                                    <button class="btn btn-info btn-sm">-->
                                    <!--                                        <i class="ace-icon fa fa-plus-square  bigger-110 icon-only"></i>-->
                                    <!--                                        <i class="ace-icon fa fa-plus-square-o bigger-200"></i>-->
                                    <!--                                    </button>-->
                                </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php foreach ($devis['produits'] as $d) { ?>
                                <div class="widget-box divArticle" style="opacity: 1; z-index: 0; margin: 5px;"
                                     onclick="location.href='../CI_devis/aff_detail_article/<?php echo $d['id'];?>'">
                                    <div class="widget-header">
                                        <h4 class="widget-title lighter green"><?php echo $d['Libelle_Mat_SansMarque'] ?></h4>
                                        <h4 class="widget-title lighter green"
                                            style="float: right;padding-right: 10px;">Prix TTC</h4>

                                    </div>

                                    <div class="widget-body background-blue divArticle">
                                        <div class="widget-main padding-6 no-padding-left no-padding-right"
                                             style="margin: 5px;">
                                            <div class="bigger-110 "><p
                                                    class="width-80 no-margin inline"><?php echo html_entity_decode($d['Libelle_Mat']) ?></p>

                                                <p style="float: right"><?php echo number_format($d['Prix_Mat_Annonce_TTC'], 2, ',', ' ') ?>
                                                    €</p><br/>
                                            </div>
                                            <br/>

                                            <div class="bigger-110">Main d'oeuvre : <p
                                                    style="float: right"><?php echo number_format($d['Prix_MO'], 2, ',', ' ') ?>
                                                    €</p></div>
                                            <div class="bigger-110"><?php echo $d['Libelle_Garantie'] ?></div>
                                            <?php
                                            if (isset($d['complements'])) {
                                                ?>
                                                <br/>
                                                <div class="bigger-110 green">Option :</div>
                                                <?php foreach ($d['complements'] as $c) { ?>

                                                    <div class="hr hr-2 hr-dotted"></div>
                                                    <div class="bigger-110"><?php echo $c['Nom'] ?><p class="no-margin"
                                                                                                      style="float: right"><?php echo number_format($c['Prix_Mat_Annonce_TTC'], 2, ',', ' ') ?>
                                                            €</p><br/>
                                                    </div>
                                                    <?php if ($c['Prix_MO_TTC'] != 0) { ?>
                                                        <div class="bigger-110">Main d'oeuvre : <p style="float: right"
                                                                                                   class="no-margin"><?php echo number_format($c['Prix_MO_TTC'], 2, ',', ' ') ?>
                                                                €</p></div>
                                                        <div
                                                            class="bigger-110"><?php echo $c['Libelle_Garantie'] ?></div>
                                                    <?php }
                                                }
                                            } ?>
                                            <br/>

                                            <div class="hr hr-4 hr-double"></div>
                                            <table class="bigger-110" style="float: right; width: auto">
                                                <?php if ($d['total_CEE'] != 0) { ?>
                                                    <tr>

                                                        <td><span style="float: right;margin-right: 15px"><em>Remise CEE
                                                                    : </em></span></td>
                                                        <td><span
                                                                style="float: right"><?php echo number_format($d['total_CEE'], 2, ',', ' ') ?>
                                                                €  </span></td>
                                                    </tr>
                                                <?php
                                                }
                                                if ($d['total_remise']) {
                                                    ?>
                                                    <tr>
                                                        <td><span style="float: right;margin-right: 15px"><em>Remise
                                                                    exceptionnelle : </em> </span></td>
                                                        <td><span
                                                                style="float: right;"><?php echo number_format($d['total_remise'], 2, ',', ' ') ?>
                                                                €</span></td>
                                                    </tr>
                                                <?php } ?>
                                                <tr>
                                                    <td><span style="float: right;margin-right: 15px"><strong>Sous-total
                                                                TTC :</strong> </span></td>
                                                    <td><span style="float: right"><strong
                                                                class="green"><?php echo number_format($d['total_TTC'], 2, ',', ' ') ?>
                                                                €</strong></span></td>
                                                </tr>
                                                <tr class="smaller-90">
                                                    <td><span style="float: right;margin-right: 15px">Dont TVA : </span>
                                                    </td>
                                                    <td><span
                                                            style="float: right"><?php echo number_format($d['total_TVA'], 2, ',', ' ') ?>
                                                            €</span></td>
                                                </tr>
                                            </table>
                                            <br/><br/><br/><br/><br/>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>