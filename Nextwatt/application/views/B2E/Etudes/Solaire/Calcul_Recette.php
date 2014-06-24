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
                if ($this->session->userdata('Production')) {
                    $value = $this->session->userdata('Production');
                } else {
                    $value = '';
                }
                $production = array(

                    'name' => 'Production',

                    'id' => 'Production',

                    'placeholder' => 'Production',

                    'value' => $value

                );
                echo form_input($production);
                ?>
            </div>
        </div>
        <div class='form-group'>
            <label class="col-sm-6 no-padding-right control-label" for='Tarifedf'>Tarif EDF : </label>

            <div class="col-sm-6">
                <?php
                if ($this->session->userdata('Tarifedf')) {
                    $value = $this->session->userdata('Tarifedf');
                } else {
                    $value = '';
                }
                $tarifedf = array(

                    'name' => 'tarifedf',

                    'id' => 'tarifedf',

                    'placeholder' => 'Tarif EDF',
                    'value' => $value
                );
                echo form_input($tarifedf);
                ?>
            </div>
        </div>

        <div align="center"><?php echo form_submit('recetteannuelles', 'Valider','class="btn btn-success btn-sm"'); ?></div>
    </div>
</div>
<h3 align="center" id="recetteannuelle"></h3>
<h3 align="center" id="recettevingtans"></h3>
<div class="col-xs-12">
    <ul class="pager">
        <li class="previous">
            <a href="<?php echo site_url("pv/calculprod"); ?>">← Calculer Production</a>
        </li>

        <li class="next">
            <a href="<?php echo site_url("pv/recette"); ?>">Récapitulatif →</a>
        </li>
    </ul>
</div>