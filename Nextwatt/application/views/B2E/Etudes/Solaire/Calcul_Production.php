<div class="page-header ">
    <h1 align="center">
        Calcul de production</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Production par an</small>
    </h1>
</div>
<h4 align="center">Veuillez renseigner les champs ci-dessous.</h4>

<div class="row form-horizontal">
    <div class="col-sm-12 ">
        <div class='form-group'>
            <label class="col-sm-6 no-padding-right control-label" for='Systeme'>Système : </label>

            <div class="col-sm-6">
                <?php
                $systeme = array(

                    'name' => 'systeme',

                    'id' => 'systeme',

                    'placeholder' => 'Systeme',

                    'value' => set_value('systeme')

                );
                echo form_input($systeme);
                ?>
            </div>
        </div>
        <div class='form-group'>
            <label class="col-sm-6 no-padding-right control-label" for='HeppNet'>HEPP NET : </label>

            <div class="col-sm-6">
                <?php
                if (isset($this->session->userdata['Heppnet']) && $this->session->userdata['Heppnet'] != ''){
                    $value = $this->session->userdata['Heppnet'];
                }else{
                    $value = '';
                }
                $heppnet = array(

                    'name' => 'heppnet',

                    'id' => 'heppnet',

                    'placeholder' => ' HEPP net',
                    'value' => $value

                );
                echo form_input($heppnet);
                ?>
            </div>
        </div>
        <div class='form-group'>
            <label class="col-sm-6 no-padding-right control-label" for='Bonus'>Bonus : </label>

            <div class="col-sm-6">
                <?php
                $id = 'id="bonus"';
                $option = array(
                    '0' => ' Pas de bonus',
                    '10' => ' Bonus de 10%'
                );

                echo form_dropdown('Raccordementflouz', $option, '', $id);
                ?>
            </div>
        </div>
        <div align="center"><?php echo form_submit('calculprod', 'valider'); ?></div>
    </div>
</div>

<br/>
<h3 align="center" id="resultprod"></h3>

<ul class="pager">
    <li class="previous">
        <a href="<?php echo site_url("pv/calculhepp"); ?>">← Calculer HEPP</a>
    </li>

    <li class="next">
        <a href="<?php echo site_url("pv/recette"); ?>">Recette →</a>
    </li>
</ul>