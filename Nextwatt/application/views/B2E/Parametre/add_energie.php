<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->


<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
    <p>Ace-setting...</p>
</div>

<div class="page-header">
    <?php if (isset($energie)) { 
    echo '<h1>Modifier une énergie</h1>';
    }
    else{
        echo '<h1>Ajouter une énergie</h1>'; 
    }
    ?>
</div>

<div class="row">
    <div class="col-xs-12">
        <?php //echo validation_errors(); ?>
        
        <?php
            $attributes = array('role' => 'form', 'id' => 'myform', 'class' => 'form-horizontal');
            $hidden = array();
            if (isset($energie)) {
                $hidden = array('ID_PrixEnergie' => $energie['ID_PrixEnergie'],'Energie'=>$energie['Energie']);
                echo form_open('parametre/modif_energie', $attributes, $hidden);
            }
            else
            {
                echo form_open('parametre/add_energie', $attributes, $hidden);
            }
        ?>

        <div class='row form-group'>
            <label class="col-sm-4 no-padding-right control-label" for='Energie'>Nom de l'énergie</label>
            <div class="col-sm-4">
                <input type="text" 
                       name="Energie" 
                       id='Energie' 
                       value="<?php if (empty($_POST) AND isset($energie)) { echo $energie['Energie']; } else { echo set_value('Energie'); }  ?>" 
                       class='form-control'
                       <?php if (isset($energie)) { echo 'disabled'; }  ?>
                />
            </div>
            <div class="col-sm-4">   
                <?php echo form_error('Energie'); ?>
            </div>
        </div>


        <div class='row form-group'>
            <label class="col-sm-4 no-padding-right control-label" for='Prix'>Prix du kWh</label>
            <div class="col-sm-4">
                <input type="text" 
                       name="Prix" 
                       id='Prix' 
                       value="<?php if (empty($_POST) AND isset($energie)) { echo $energie['Prix'];} else { echo set_value('Prix');} ?>" 
                       class='form-control'
                />
            </div>
            <div class="col-sm-4">
                <?php echo form_error('Prix'); ?>
            </div>
        </div>

        <div class='row form-group'>
            <label class="col-sm-4 no-padding-right control-label" for='Inflation'>Pourcentage d'inflation</label>
            <div class="col-sm-4">
                <input type="text" 
                       name="Inflation" 
                       id='Inflation' 
                       value="<?php if (empty($_POST) AND isset($energie)) { echo $energie['Inflation'];} else { echo set_value('Inflation');} ?>" 
                       class='form-control' />
            </div>
            <div class="col-sm-4">
                <?php echo form_error('Inflation'); ?>
            </div>
        </div>

        <div class='row form-group'>
            <label class="col-sm-4 no-padding-right control-label" for='Abonnement'>Cout de l'abonnement annuelle</label>
            <div class="col-sm-4">
                <input type="text" 
                       name="Abonnement" 
                       id="Abonnement" 
                       value="<?php if (empty($_POST) AND isset($energie)) { echo $energie['Abonnement'];} else { echo set_value('Abonnement');} ?>" 
                       class='form-control' />
            </div>
            <div class="col-sm-4">
                <?php echo form_error('Abonnement'); ?>
            </div>
        </div>

        <div class='row form-group'>
            <label class="col-sm-4 no-padding-right control-label" for='CO2'>Polution CO<sub>2</sub></label>
            <div class="col-sm-4">
                <input type="text"
                       name="CO2"
                       id="CO2"
                       value="<?php if (empty($_POST) AND isset($energie)) { echo $energie['CO2'];} else { echo set_value('CO2');} ?>" 
                       class='form-control' />
            </div>
            <div class="col-sm-4">
                <?php echo form_error('CO2'); ?>
            </div>
        </div>

        <div class='row form-group'>
            <div class='col-md-offset-4 col-md-4'>
                <button type="submit" class="btn btn-sm btn-info ">
                    <i class="ace-icon fa fa-floppy-o bigger-160"></i>
                    Enregistrer
                </button>
            </div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>

