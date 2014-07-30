<div class="page-header">
    <h1 align="center">
        CATALOGUE</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Lier un type à un produit</small>
    </h1>
</div>


<?php
if(isset($rsltupdate))
{?><p align="center"><i class="ace-icon fa fa-exclamation-triangle bigger-125"></i><?php
    echo($rsltupdate);?></p> <br/><?php
}
echo form_open('CI_catalogue/lier_type_produit_action');
foreach ($produit as $prod) {
    ?>
    <div class='row form-horizontal col-xs-12'>

        <label class="col-sm-6 no-padding-right control-label"
               for="<?php echo($prod['Nom']) ?>"> <?php echo($prod['Nom']) ?> </label>

        <div class="col-sm-offset-7">
            <?php
            if($soustypes != NULL){
            $this->fonctionspersos->creerDropdown($soustypes, $prod['soustype_id'], $prod['id']);
            }
            else{
                echo('<h6><strong>Aucune donnée disponible, veuillez rajoutez des sous types</strong></h6> ');
            }
            ?>
        </div>
        <div class="col-sm-4">
            <?php echo form_error('$ref'); ?>
        </div>
    </div>
<?php } ?>
    <div class="row form-group">
        <div class="col-xs-offset-3 col-md-6">
            <button type="submit" class="btn btn-sm btn-info">
                <i class="ace-icon fa fa-floppy-o bigger-160"></i>
                Enregistrer
            </button>
        </div>
    </div>
<?php
echo form_close();
?>