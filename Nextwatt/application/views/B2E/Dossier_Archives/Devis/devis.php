<div class="page-header">
    <h1 class='center'>DEVIS</h1>

    <div align="center">
        <br/>

        <div class="btn-group">
            <a href="<?php echo site_url("CI_Dossier/choix_action"); ?>">
                <button type="button" class="btn btn-sm btn-primary">Retour</button>
            </a>
            <a href="<?php echo site_url("CI_Dossier/archiver"); ?>">
                <button type="button" class="btn btn-sm btn-grey">Archiver le dossier</button>
            </a>
            <a href="<?php echo site_url("CI_catalogue/consult_soustype"); ?>">
                <button type="button" class="btn btn-sm btn-grey">Devis PDF</button>
            </a>
            <a href="<?php echo site_url("CI_catalogue/upload_catalogue_form"); ?>">
                <button type="button" class="btn btn-sm btn-grey">Bdc PDF</button>
            </a>
        </div>
    </div>
</div>

<?php //var_dump($devis);?>
<?php
function printr($array)
{
    static $indentation = '';
    static $array_key = '';
    $cst_indentation = '&nbsp;&nbsp;&nbsp;&nbsp;';

    echo $indentation . $array_key . '<b>array(</b><br />';
    reset($array);
    while (list($k, $v) = each($array)) {
        if (is_array($v)) {
            $indentation .= $cst_indentation;
            $array_key = '\'<i style="color: #334499 ;">' . addslashes(htmlspecialchars($k)) . '</i>\' => ';
            printr($v);
            $indentation = substr($indentation, 0, strlen($indentation) - strlen($cst_indentation));
        } else {
            echo $indentation . $cst_indentation . '\'<i style="color: #334499 ;">' .
                addslashes(htmlspecialchars($k)) . '</i>\' => \'' . addslashes(htmlspecialchars($v)) . '\',<br />';
        }
    }
    echo $indentation . '<b>)</b>' . (($indentation === '') ? ';' : ',') . '<br />';
}

printr($devis);?>
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
                            <?php
                            echo($nomclient1 . ' ' . $prenomclient1);
                            if ($prenomclient2 != null) {
                                echo(' et ');
                                echo($prenomclient2);
                                echo('<br/>');
                            } else {
                                echo('<br/>');
                            }
                            echo($adresse . '<br/>');
                            echo(' ' . $ville . '<br/>');
                            echo('Votre contact : <strong>' . $userprenom . ' ' . $usernom . '</strong>');
                            ?>
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
                                <a href="<?php echo site_url("CI_catalogue/consult_catalogue_devis"); ?>">
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
                            <?php foreach ($devis['produits'] as $d){ ?>
                            <div class="widget-box " style="opacity: 1; z-index: 0; margin: 5px"
                                 onclick="location.href='../CI_Dossier/aff_detail_article';"
                            ">
                            <div class="widget-header">
                                <h4 class="widget-title lighter green"><?php echo $d['Nom'] ?></h4>
                                <h4 class="widget-title lighter green" style="float: right;padding-right: 10px;">Prix
                                    TTC</h4>

                            </div>

                            <div class="widget-body background-blue">
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
                                                <div class="bigger-110"><?php echo $c['Libelle_Garantie'] ?></div>
                                            <?php }
                                        }
                                    } ?>
                                    <br/>

                                    <div class="hr hr-4 hr-double"></div>
                                    <table class="bigger-110" style="float: right; width: auto">
                                        <?php if ($d['total_CEE'] != 0) { ?>
                                            <tr>

                                                <td><span style="float: right;margin-right: 15px"><em>Remise CEE : </em></span>
                                                </td>
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
                                            <td><span style="float: right;margin-right: 15px"><strong>Sous-total TTC
                                                        :</strong> </span></td>
                                            <td><span style="float: right"><strong
                                                        class="green"><?php echo number_format($d['total_TTC'], 2, ',', ' ') ?>
                                                        €</strong></span></td>
                                        </tr>
                                        <tr class="smaller-90">
                                            <td><span style="float: right;margin-right: 15px">Dont TVA : </span></td>
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