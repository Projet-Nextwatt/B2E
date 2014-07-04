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
        <div class='form-group'>
            <label class="col-sm-6 no-padding-right control-label" for='Production'>Production : </label>

            <div class="col-sm-6">
                <?php
                $production = array(

                    'name' => 'production',

                    'id' => 'production',

                    'placeholder' => 'Production',

                    'value' => set_value('production')

                );
                echo form_input($production);
                ?>
            </div>
        </div>
        <div class='form-group'>
            <label class="col-sm-6 no-padding-right control-label" for='HeppNet'>Raccordement : </label>

            <div class="col-sm-6">
                <label>
                    <input name="switch-field-1" class="ace ace-switch" type="checkbox" id="raccordement">
                    <span class="lbl" data-lbl="Oui&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Non"></span>
                </label>
            </div>
        </div>


        <div class='form-group ' id="divbonus">
            <label class="col-sm-6 no-padding-right control-label" for='Bonus'>Bonus de production : </label>

            <div class="col-sm-6">
                <?php
                $bonus = array(

                    'name' => 'bonus',

                    'id' => 'bonus',

                    'placeholder' => 'Bonus',

                    'value' => set_value('bonus')

                );
                echo form_input($bonus);
                ?>
            </div>
        </div>
        <div class='form-group ' id="divchauffage">
            <label class="col-sm-6 no-padding-right control-label" for='Chauffage'>Chauffage : </label>

            <div class="col-sm-6">
                <?php
                $chauffage = array(

                    'name' => 'chauffage',

                    'id' => 'chauffage',

                    'placeholder' => 'Chauffage',

                    'value' => set_value('chauffage')

                );
                echo form_input($chauffage);
                ?>
            </div>
        </div>
        <div class='form-group ' id="divecs">
            <label class="col-sm-6 no-padding-right control-label" for='ECS'>ECS : </label>

            <div class="col-sm-6">
                <?php
                $ecs = array(

                    'name' => 'ecs',

                    'id' => 'ecs',

                    'placeholder' => 'ECS',

                    'value' => set_value('ecs')

                );
                echo form_input($ecs);
                ?>
            </div>
        </div>
        <!--        <div align="center">-->
        <?php //echo form_submit('calculprod', 'Valider', 'class="btn btn-success btn-sm"'); ?><!--</div>-->
    </div>
</div>
<br/>

<h3 align="center" id="resultprod"></h3>

<ul class="pager">
    <li class="previous">
        <a href="<?php echo site_url("pv/calculhepp"); ?>"><h4>← Calculer HEPP</h4></a>
    </li>

    <li class="next">
        <a href="<?php echo site_url("pv/calculrecette"); ?>"><h4>Recette →</h4></a>
    </li>
</ul>