<div class="page-header">
    <h1 align="center">
        CATALOGUE</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Page d'accueil Catalogue</small>
    </h1>
</div>


<?php
//var_dump($produit);
foreach ($produit as $prod) {
?>
<div class='row form-group'>
    <label class="col-sm-4 no-padding-right control-label"
           for="<?php echo($prod[1]) ?>"> <?php echo($prod[1]) ?> </label>

        <?php
            $this->fonctionspersos->creerDropdown($soustypes, $respo, 'respo');
        ?>


    <div class="col-sm-4">
        <?php echo form_error('$ref'); ?>
    </div>
</div>

<?php
}
?>