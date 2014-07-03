<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1 align="center">
        CATALOGUE</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Différentiel des catalogues</small>
    </h1>

</div>
<?php echo form_open('CI_catalogue/validercatalogue'); ?>
<div class="row col-xs-12">
    <div class="row col-xs-12">
        <div class="col-md-offset-5 col-md-4">
            <a href="<?php echo site_url("CI_catalogue/validercatalogue"); ?>">
                <button type="submit" class="btn btn-sm btn-info">
                    <i class="ace-icon fa fa-floppy-o bigger-160"></i>
                    Enregistrer
                </button>
            </a>
            <a href="<?php echo site_url("CI_catalogue"); ?>">
                <button type="button" class="btn btn-danger btn-sm">
                    <i class="ace-icon fa fa-trash-o bigger-160"></i>
                    Annuler
                </button>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <?php
        $this->load->library('fonctionspersos');
        $entete = $this->fonctionspersos->set_entete_catalogue_complet();
        ?>
        <h2>
            Ajouts :
        </h2>
        <?php
        if (isset($ajouts)) {
            $this->fonctionspersos->creerTableau($ajouts, $entete);
        } else {
            echo('<h3>  Aucun ajout dans la base de données</h3><br/>');
        }
        ?>
        <h2>
            Suppressions :
        </h2>

        <?php
        if (isset($supp)) {

            foreach ($supp as $ref) {
                ?>
                <div class='row form-group'>
                    <label class="col-sm-4 no-padding-right control-label"
                           for='<?php echo($ref) ?>'> <?php echo($ref) ?> </label>
                    <!--            <input type='hidden' name="Droit_Edit_Devis" value="off"/>-->
                    <label class="col-sm-4">
                        <input type="checkbox"
                               name="check_list[]"
                               id='<?php echo($ref) ?>'
                               class='ace ace-switch ace-switch-2 btn-empty'
                               value='<?php echo($ref) ?>'/>

                        <span class="lbl"  data-lbl="Oui&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Non"></span>
                    </label>

                    <div class="col-sm-4">
                        <?php echo form_error('$ref'); ?>
                    </div>
                </div>

            <?php
            }
            echo form_close();
        } else {
            echo('<h3> Aucun ajout dans la base de données</h3><br/>');
        }
        ?>
    </div>
</div>
