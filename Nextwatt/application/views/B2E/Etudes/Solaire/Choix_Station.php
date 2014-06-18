<?php
$region = NULL;
?>
<span id="position"></span>
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

<ul class="pager">
    <li class="previous">
        <a href="<?php echo site_url("dossier/consult_dossier"); ?>">← Accueil Dossier</a>
    </li>

    <li class="next">
        <a href="<?php echo site_url("pv/choixorientation"); ?>"#">Orientation →</a>
    </li>
</ul>