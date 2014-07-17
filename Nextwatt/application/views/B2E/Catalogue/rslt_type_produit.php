<div class="page-header">
    <h1 align="center">
        CATALOGUE</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Lier un type à un produit</small>
    </h1>
</div>

<?php
echo('Vous avez update : ' . $rsltupdate . ' produits <br/> <br/>');
?>

<div class="row col-xs-12">
    <div class="row col-xs-12">
        <div class="col-md-offset-4 col-md-4">
            <a href="<?php echo site_url("CI_catalogue"); ?>">
                <button type="submit" class="btn btn-sm btn-info">
                    <i class="ace-icon fa fa-book bigger-160"></i>
                    Retour catalogue
                </button>
            </a>
            <a href="<?php echo site_url("Accueil"); ?>">
                <button type="button" class="btn btn-info btn-sm">
                    <i class="ace-icon fa fa-bank bigger-160"></i>
                    Retourner à l'accueil
                </button>
            </a>
        </div>
    </div>
</div>