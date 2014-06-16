<?php
$region = NULL;
?>
<form name='formhepp'>
    <select name='station' id='station'>
        <?php
        if (isset($station)) {
        foreach ($station as $ensol) {
        if ($ensol['Region'] != $region) {
        ?>
        <optgroup label="<?php echo $ensol['Region'] ?>">
            <?php $region = $ensol['Region'];
            } ?>
            <option value="<?php echo $ensol['ID_Ensoleillement'] ?>"><?php echo $ensol['Ville'] ?></option>
            <?php

            }
            }
            ?>
    </select>
</form>

<fieldset style="display: inline-block">
    <legend>R&eacute;sultat</legend>
    <span class="HEPP"></span>
</fieldset>
<br/>
<br/>
<br/>
<br/>
<table style="text-align: center">
    <tr>
        <td>
        </td>
        <td>
            <img src="<?php echo $quinze ?>" height="251" width="200">
        </td>
        <td>
            <img src="<?php echo $vingt ?>" height="251" width="200">
        </td>
        <td>
            <img src="<?php echo $trente ?>" height="251" width="200">
        </td>
        <td>
            <img src="<?php echo $quarantecinq ?>" height="251" width="200">
        </td>
        <td>
            <img src="<?php echo $soixante ?>" height="251" width="200">
        </td>
    </tr>
    <tr>
        <td>
            <b> SUD</b>
        </td>
        <td>
            <span class="orientation"> 98 %</span>
        </td>
        <td>
            <span class="orientation"> 100 %</span>
        </td>
        <td>
            <span class="orientation"> 100 %</span>
        </td>
        <td>
            <span class="orientation"> 100 %</span>
        </td>
        <td>
            <span class="orientation"> 91 %</span>
        </td>
    </tr>
    <tr>
        <td>
            <b> SUD-EST / SUD-OUEST</b>
        </td>
        <td>
            <span class="orientation"> 93 %</span>
        </td>
        <td>
            <span class="orientation"> 96 %</span>
        </td>
        <td>
            <span class="orientation"> 95 %</span>
        </td>
        <td>
            <span class="orientation"> 91 %</span>
        </td>
        <td>
            <span class="orientation"> 84 %</span>
        </td>
    </tr>
    <tr>
        <td>
            <b> EST / OUEST</b>
        </td>
        <td>
            <span class="orientation"> 85 %</span>
        </td>
        <td>
            <span class="orientation">  88 %</span>
        </td>
        <td>
            <span class="orientation"> 84 %</span>
        </td>
        <td>
            <span class="orientation"> 77 %</span>
        </td>
        <td>
            <span class="orientation"> 68 %</span>
        </td>
    </tr>
</table>
<br/>
<span class="choixorient"></span>
<br/>
<br/>
<br/>
<br/>
<br/>
<fieldset style="display: inline-block">
    <legend>Pertes dues au masques</legend>
    <span> Ratio C (100% - perte): </span>
    <?php
    $ratioc = array(

        'name' => 'ratioc',

        'id' => 'ratioc',

        'placeholder' => '100%',

        'value' => '100'

    );
    echo form_input($ratioc);
    echo form_submit('envoiratioc', 'valider');
    ?>
    <br/>
    <span class="resultratioc"></span>
</fieldset>
<br/>
<br/>

<fieldset style="display: inline-block">
    <legend>HEPP "nette"</legend>
    <button id="calculhepp">Calculer</button>
    <span id="heppnette"></span>
</fieldset>
<br/>
<br/>

<fieldset style="display: inline-block">
    <legend>Production</legend>
    <?php
    $systeme = array(

        'name' => 'systeme',

        'id' => 'systeme',

        'placeholder' => 'Systeme',

        'value' => set_value('systeme')

    );
    echo form_input($systeme);
    $heppnet = array(

        'name' => 'heppnet',

        'id' => 'heppnet',

        'placeholder' => ' HEPP net',

    );
    echo form_input($heppnet);
    $id = 'id="bonus"';
    $option = array(
        '0' => ' Pas de bonus',
        '10' => ' Bonus de 10%'
    );

    echo form_dropdown('Raccordementflouz', $option, '', $id);
    echo form_submit('calculprod', 'valider');
    ?>
    <br/>
    <span id="resultprod"></span>
</fieldset>
<br/>
<fieldset style="display: inline-block">
    <legend>Recette</legend>
    <?php
    $production = array(

        'name' => 'production',

        'id' => 'production',

        'placeholder' => 'Production',

        'value' => set_value('Production')

    );
    echo form_input($production);
    $tarifedf = array(

        'name' => 'tarifedf',

        'id' => 'tarifedf',

        'placeholder' => 'Tarif EDF'
    );
    echo form_input($tarifedf);
    echo form_submit('recetteannuelles', 'valider');
    ?>
    <br/>
    <span id="recetteannuelle"></span>
    <br/>
    <span id="recettevingtans"></span>
</fieldset>
<br/>
<br/>
<fieldset style="display:inline-block">
    <legend>Production &acirc; l'ann&eacute;e</legend>
    <?php
    echo form_submit('BTNanneeprod', 'valider');
    ?>
    <br/>
    <span id="prodannuelle"></span>
</fieldset>
<fieldset style="display:inline-block">
    <legend>Production cumul&eacute;e jusqu'&acirc; l'ann&eacute;e</legend>
    <?php
    echo form_submit('BTNcumulprod', 'valider');
    ?>
    <br/>
    <span id="prodcumulee"></span>
</fieldset>
<fieldset style="display:inline-block">
    <legend>Tarif &acirc; l'ann&eacute;e</legend>
    <?php

    echo form_submit('BTNtarif', 'valider');
    ?>
    <br/>
    <span id="tarifannee"></span>
</fieldset>
<fieldset style="display:inline-block">
    <legend>Flouz &acirc; l'ann&eacute;e</legend>
    <?php
    $id = 'id="raccordementflouz"';
    $option = array(
        '2' => ' Raccord&eacute; (2 %)',
        '10' => ' Isol&eacute; (10 %)'
    );

    echo form_dropdown('Raccordementflouz', $option, '', $id);
    echo form_submit('BTNanneeflouz', 'valider');
    ?>
    <br/>
    <span id="flouzannuel"></span>
</fieldset>
<fieldset style="display:inline-block">
    <legend>Flouz cumul&eacute; &acirc; l'ann&eacute;e</legend>
    <?php
    $id = 'id="raccordementflouz"';
    $option = array(
        '2' => ' Raccord&eacute; (2 %)',
        '10' => ' Isol&eacute; (10 %)'
    );

    echo form_dropdown('Raccordementflouz', $option, '', $id);
    echo form_submit('BTNcumulflouz', 'valider');
    ?>
    <br/>
    <span id="flouzcumulee"></span>
</fieldset>