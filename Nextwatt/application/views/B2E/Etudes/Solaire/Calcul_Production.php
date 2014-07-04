<?php $ref = NULL; ?>
<div class="page-header ">
    <h1 align="center">
        Calcul de production </br >
        <small><i class="ace-icon fa fa-angle-double-right"></i> Production par an</small>
    </h1>
</div>
<div class="row form-horizontal">
    <h4 align="center"> Veuillez renseigner les champs ci - dessous .</h4>

    <div class="col-sm-12 ">
        <div class="form-group">
            <label class="col-sm-6 no-padding-right control-label" for='produit'> Produit : </label>

            <div class="col-sm-6">
                <select name='Produit' id='produit'>
                    <?php
                    if (isset($panneau)) {
                    foreach ($panneau as $p) {
                    if ($p['Reference'] != $ref) {
                    ?>
                    <optgroup label="<?php echo $p['Reference'] ?>">
                        <?php $ref = $p['Reference'];
                        } ?>
                        <option value="<?php echo $p['id'] ?>"><?php echo $p['Nom'] ?></option>
                        <?php

                        }
                        }
                        ?>
                </select>
            </div>
        </div>
        <?php echo $panneau[0]['Spec']; ?>
        <?php $test = array('test' => 545, 'ert' => 'erer');
        $t = json_encode($test);
        var_dump($t);
        $spec = html_entity_decode($panneau[0]['Spec']);
        var_dump(json_decode($spec,true));
        ?>
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
            <label class="col-sm-6 no-padding-right control-label" for='HeppNet'>Raccordement : </label>

            <div class="col-sm-6">
                <?php
                $id = 'id="raccordement"';
                $option = array(
                    '2' => ' Raccordé (2 %)',
                    '10' => ' Isolé (10 %)'
                );

                echo form_dropdown('raccordement', $option, '', $id);
                ?>
            </div>
        </div>
        <div class='form-group'>
            <label class="col-sm-6 no-padding-right control-label" for='Bonus'>Bonus de production : </label>

            <div class="col-sm-6">
                <?php
                $id = 'id="bonus"';
                $option = array(
                    '0' => ' Pas de bonus',
                    '10' => ' Bonus de 10%'
                );

                echo form_dropdown('bonus', $option, '', $id);
                ?>
            </div>
        </div>
        <div class='form-group hidden'>
            <label class="col-sm-6 no-padding-right control-label" for='Bonus'>Bonus : </label>

            <div class="col-sm-6">
                <?php
                if ($this->session->userdata['Heppnet']) {
                    $value = $this->session->userdata['Heppnet'];
                } else {
                    $value = '';
                }

                $heppnet = array(

                    'name' => 'heppnet',

                    'id' => 'heppnet',

                    'placeholder' => 'heppnet',

                    'value' => $value

                );
                echo form_input($heppnet);
                ?>
            </div>
        </div>
        <!--        <div align="center">-->
        <?php //echo form_submit('calculprod', 'Valider', 'class="btn btn-success btn-sm"'); ?><!--</div>-->
    </div>
</div>

<br/>

<h3 align="center" id="resultprod"></h3>

<?php var_dump($panneau) ?>
<ul class="pager">
    <li class="previous">
        <a href="<?php echo site_url("pv/calculhepp"); ?>"><h4>← Calculer HEPP</h4></a>
    </li>

    <li class="next">
        <a href="<?php echo site_url("pv/calculrecette"); ?>"><h4>Recette →</h4></a>
    </li>
</ul>