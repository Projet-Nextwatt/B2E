<div class="page-header">

    <div  class="position-absolute">
        <a href=""></a>
        <div class="panel panel-success inline" >
            <div class="panel-heading">
                Client
            </div>
            <div class="panel-body">
                <p><?php
                echo($nomclient1 . '  ' . $prenomclient1);
                if ($prenomclient2 != null) {
                    echo(' et ');
                    echo($prenomclient2);
                    echo('<br/>');
                } else {
                    echo('<br/>');
                }
                echo($adresse . '<br/>');
                echo('Tel :'. $tel . '<br/>');
                ?></p>
            </div>
        </div>
    </div>
    <h1 align="center">
        DOSSIER</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Que voulez-vous ajouter au dossier ?</small>
    </h1>
    <br/>
</div>

<br/><br/><br/>
<div class="row">
    <div align="center" >
        <a href="<?php echo site_url("pv/choixstation"); ?>">
            <button  type="button" class="btn btn-success">
                <i class="ace-icon fa fa-file-text-o"></i>
                Etude simple
            </button></a>
        <a href="<?php echo site_url("dossier/consult_dossier"); ?>">
            <button  type="button" class="btn btn-success disabled">
                <i class="ace-icon fa fa-folder-open-o"></i>
                Bilan énergétique (en construction)
            </button></a>
        <a href="<?php echo site_url("CI_catalogue/devis_form"); ?>">
            <button  type="button" class="btn btn-success">
                <i class="ace-icon fa fa-list"></i>
                Création de devis
            </button></a>
    </div>
</div>
