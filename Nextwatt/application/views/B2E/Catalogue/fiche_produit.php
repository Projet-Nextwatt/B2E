<div class="page-header">
    <h1 align="center">
        Fiche Produit</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Fiche de : <?php echo(''.$produit['Reference'].'') ?></small>
    </h1>
</div>
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <?php
            var_dump($produit);

            if(isset($options))
            {
                $this->fonctionspersos->creerTableau($options, null, 'CI_catalogue/aff_fiche_produit');
            }
            else
            {
                echo('<h4> Aucune option à afficher </h4>');
            }
                ?>
        </div>
    </div>
</div>
