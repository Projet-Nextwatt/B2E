<div class="page-header">
    <h1 class='center'>DEVIS</h1>

    <div align="center">
        <br/>

        <div class="btn-group">
            <a href="<?php echo site_url("CI_Dossier/choix_action"); ?>">
                <button type="button" class="btn btn-sm btn-primary">Retour</button>
            </a>
            <a href="<?php echo site_url("CI_catalogue/consult_soustype"); ?>">
                <button type="button" class="btn btn-sm btn-grey">Archiver</button>
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

<div class="page-content">
    <div class="row form-group">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-3 col-xs-offset-2">
                    <div class="widget-box">
                        <div class="widget-header widget-header-small">
                            <h4 class="widget-title">
                                Client
                            </h4>
                        </div>
                        <div class="widget-body">
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
                <div class="col-md-3 col-xs-offset-2">
                    <div class="widget-box">
                        <div class="widget-header widget-header-small">
                            <h4 class="widget-title">
                                Tarif
                            </h4>
                        </div>
                        <div class="widget-body">
                            Total TTC : <strong><?php echo $tariftotal; ?> €</strong><br/>
                            Dont TVA : <strong><?php echo $tva; ?> €</strong>
                        </div>
                    </div>
                </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                    <div class="widget-box">
                        <div class="widget-header">
                            Votre devis
                            <div class="widget-toolbar no-border">
                                <a href="<?php echo site_url("CI_catalogue/consult_catalogue_devis"); ?>">
                                <button class="btn btn-minier btn-primary">
                                    <i class="ace-icon fa fa-plus-square-o bigger-250"></i>
                                </button>
                                </a>
                            </div>
                        </div>
                        <div class="widget-body">
                            <table>
                                <thead>
                                <tr>
                                    <td>Libellé</td>
                                    <td>Prix TTC</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>

                                </tr>
                                </tbody>
                            </table>
                            <?php foreach($article->result() as $a){
                                echo $a->Reference.'<br/>';
                                echo $a->Marque;
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>