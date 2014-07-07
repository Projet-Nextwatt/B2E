<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1 align="center">
        CATALOGUE</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Page d'accueil Catalogue</small>
    </h1>
</div>

<div class="row">
    <div class="col-xs-12">
        <h2 align="center">
            Mise à jour du catalogue effectué avec succès !
        </h2>
        <div align="center">
            <?php

                echo('Vous avez ajouté : '.$ligneajouté.' lignes <br/> <br/>');

            if($lignesuppr!=0)
            {
                echo('Vous avez supprimé : '.$lignesuppr.' lignes <br/> <br/>');
            }
            else
            {
                echo('Aucune suppression <br/> <br/>');
            }
            if($lignemodifiée!=0)
            {
               echo('Vous avez modifié : '.$lignemodifiée.' lignes <br/> <br/>');
            }
            else
            {
                echo('Aucune modification <br/> <br/>');
            }
            ?>
        </div>
        <br/>
        <div align="center">
            <a href="<?php echo site_url("CI_catalogue/consult_catalogue"); ?>">
            <button type="button" class="btn btn-success">
                <i class="ace-icon fa fa-book "></i>
                Retour au catalogue
            </button></a>
            <a href="<?php echo site_url("accueil"); ?>">
                <button type="button" class="btn btn-success">
                    <i class="ace-icon fa fa-bank"></i>
                    Retour à l'accueil
            </button></a>
        </div>
    </div>
</div>
<!--fa-desktop-->