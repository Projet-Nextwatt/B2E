<?php $ref = NULL;
?>
<div class="page-header ">
    <h1 align="center">
        Calcul de production </br >
        <small><i class="ace-icon fa fa-angle-double-right"></i> Production par an</small>
    </h1>
</div>
<div class="row form-horizontal">
    <h4 align="center"> Veuillez renseigner les champs ci-dessous.</h4>

    <div class="col-sm-12 ">
        <div class="form-group">
            <label class="col-sm-6 no-padding-right control-label" for='type'> Type : </label>

            <div class="col-sm-6">
                <select name="typepanneau" id="typepanneau" class="dropdown">
                    <option value="1">PV</option>
                    <option value="2">ECS</option>
                    <option value="3">Chauffage</option>
                    <option value="4">ECS + Chauffage</option>
                </select>
            </div>
        </div>
        <div class='form-group'>
            <label class="col-sm-6 no-padding-right control-label" for='raccord'>Raccordement : </label>

            <div class="col-sm-6">
                <label>
                    <input name="switch-field-1" class="ace ace-switch" type="checkbox" id="raccord">
                    <span class="lbl" data-lbl="Oui&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Non"></span>
                </label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-6 no-padding-right control-label" for='produit'> Produit : </label>

            <div class="col-sm-6">
                <select name='Produit' id='produit'>
                    <option></option>
                    <?php
                    if (isset($panneau)) {
                    foreach ($panneau as $p) {
                    if ($p['Reference'] != $ref) {
                    ?>
                        <option value="<?php echo $p['id'] ?>"><?php echo $p['Nom'] ?></option>
                        <?php

                        }
                        }}
                        ?>
                </select>
            </div>
        </div>
        <?php
        $formPersonnalisation = 'hidden';
        if ($this->session->userdata['userconnect']['Droit_SUDO'] == 1) {
            $formPersonnalisation = '';
        } ?>
        <div class="<?php echo $formPersonnalisation ?>">
            <div class='row form-group'>
                <div class="col-xs-12 label label-lg label-success arrowed-right">
                    <b>Personnalisation</b>
                </div>
            </div>
            <div class='form-group'>
                <label class="col-sm-6 no-padding-right control-label" for='Puissance'>Puissance : </label>

                <div class="col-sm-6">
                    <?php
                    $puissance = array(

                        'name' => 'puissance',

                        'id' => 'puissance',

                        'placeholder' => 'puissance',

                        'value' => set_value('puissance')

                    );
                    echo form_input($puissance);
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

                <div class="col-sm-6 ">
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
    <span class="hidden" id="heppnet"><?php echo $this->session->userdata['Heppnet'] ?></span>

    <h3 align="center" id="resultprod"></h3>
</div>
<ul class="pager">
    <li class="previous">
        <a href="<?php echo site_url("pv/calculmasque"); ?>"><h4>← Calculer Masque</h4></a>
    </li>

    <li class="next">
        <a href="<?php echo site_url("pv/recette"); ?>"><h4>Récapitulatif →</h4></a>
    </li>
</ul>