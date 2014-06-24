<div class="page-header ">
    <h1 align="center">
        Calcul de recette</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Recette par an et sur 20 ans</small>
    </h1>
</div>
<h4 align="center">Veuillez renseigner les champs ci-dessous.</h4>

<div class="row form-horizontal">
    <div class="col-sm-12 ">
        <div class='form-group'>
            <label class="col-sm-6 no-padding-right control-label" for='Production'>Production : </label>

            <div class="col-sm-6">
                <?php
                $production = array(

                    'name' => 'production',

                    'id' => 'production',

                    'placeholder' => 'Production',

                    'value' => set_value('Production')

                );
                echo form_input($production);
                ?>
            </div>
        </div>
        <div class='form-group'>
            <label class="col-sm-6 no-padding-right control-label" for='Tarifedf'>Tarif EDF : </label>

            <div class="col-sm-6">
                <?php
                $tarifedf = array(

                    'name' => 'tarifedf',

                    'id' => 'tarifedf',

                    'placeholder' => 'Tarif EDF'
                );
                echo form_input($tarifedf);
                ?>
            </div>
        </div>

        <div align="center"><?php echo form_submit('recetteannuelles', 'valider'); ?></div>
    </div>
</div>

<br/>
<h3 align="center" id="recetteannuelle"></h3>
<h3 align="center" id="recettevingtans"></h3>