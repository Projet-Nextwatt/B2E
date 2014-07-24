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
                            <p><strong>Total TTC : <?php echo $tariftotal; ?> €</strong></p>
                            <p>Dont TVA : <?php echo $tva; ?> €</p>
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
                            <div>
                                    <div class="widget-box transparent" style="opacity: 1; z-index: 0; margin: 5px">
                                        <div class="widget-header">
                                            <h4 class="widget-title lighter green" >Kit 9K Aerovoltaique</h4>
                                            <h4 class="widget-title lighter green" style="float: right">Prix TTC</h4>

                                        </div>

                                        <div class="widget-body">
                                            <div class="widget-main padding-6 no-padding-left no-padding-right" style="margin: 5px;">
                                                <div class="bigger-110">36 panneaux Systovi 250 Wc - Rvolt <p  style="float: right">11 386,75 €</p><br/>
                                                Onduleur Kostal Piko 8,3 <br/>
                                                Intégration Systovi<br/>
                                                Norme EN61215 ou NF EN61646 <br/>
                                                Module de ventilation pour récupération de chaleur et rafraichissement</div><br/>
                                                <div class="bigger-110">Main d'oeuvre : <p style="float: right">4 000,00 €</p></div>
                                                <div class="bigger-110">Garantie materiel : 20 ans</div>
                                                <div class="hr hr-4 hr-double"></div>
                                                <table  class="bigger-110" style="float: right; width: auto">
                                                    <tr >
                                                        <td><span style="float: right;margin-right: 15px">Remise CEE : </span></td>
                                                        <td><span style="float: right">15 386,75 €</span></td>
                                                    </tr>  <tr >
                                                        <td><span style="float: right;margin-right: 15px"> Remise commerciale : </span></td>
                                                        <td><span style="float: right">15 386,75 €</span></td>
                                                    </tr>  <tr >
                                                        <td><span style="float: right;margin-right: 15px">Total TTC : </span></td>
                                                        <td><span style="float: right">15 386,75 €</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span  style="float: right;margin-right: 15px">Dont TVA : </span></td>
                                                        <td><span style="float: right">1 234,00 €</span></td>
                                                    </tr>
                                                </table>
                                        </div>
                                        </div>
                                    </div><br/><br/><br/><br/>
                                    <div class="widget-box transparent" style="opacity: 1; z-index: 0; margin: 5px">
                                        <div class="widget-header">
                                            <h4 class="widget-title lighter green" >Pompe à chaleur Air / Air Multisplit</h4>
                                            <h4 class="widget-title lighter green" style="float: right">Prix TTC</h4>

                                        </div>

                                        <div class="widget-body">
                                            <div class="widget-main padding-6 no-padding-left no-padding-right" style="margin: 5px;">
                                                <div class="bigger-110"> Daikin MultiSplit
                                                    2MXS40H  <p  style="float: right">11 386,75 €</p><br/>
                                                    Une pompe à Chaleur Air/AIR Réversible de type : Daikin MultiSplit
                                                    2MXS40H<br/>COP 4,16 Certifié Eurovent + pose, accessoires et mise
                                                    en service inclus
                                                </div><br/>
                                                <div class="bigger-110">Main d'oeuvre : <p style="float: right">4 000,00 €</p></div>
                                                <div class="bigger-110">Garantie materiel : 20 ans</div>
                                                <br/>
                                                <div class="bigger-110 green">Option :</div>
                                                <div class="hr hr-2 hr-dotted"></div>
                                                <div class="bigger-110"> Unité intérieur Daikin Console 2x voie FVXS50F  <p class="no-margin" style="float: right">11 386,75 €</p><br/>
                                                </div>
                                                <div class="bigger-110">Main d'oeuvre : <p style="float: right" class="no-margin">4 000,00 €</p></div>
                                                <div class="hr hr-4 hr-double"></div>
                                                <table  class="bigger-110" style="float: right; width: auto">
                                                    <tr >
                                                        <td><span style="float: right;margin-right: 15px">Total TTC : </span></td>
                                                        <td><span style="float: right">15 321,75 €</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span  style="float: right;margin-right: 15px">Dont TVA : </span></td>
                                                        <td><span style="float: right">1 234,00 €</span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>