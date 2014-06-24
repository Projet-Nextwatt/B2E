<?php
$region = NULL;
?>

<div class="page-header">
    <h1 align="center">
        CHOIX DE LA STATION</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Choix de la station pour le calcul d'HEPP
            (Géolocalisation active)
        </small>
    </h1>

</div>

<div class="row form-horizontal">
    <div class="col-sm-12 ">
        <label class="col-sm-6 no-padding-right control-label" for='station'>Station : </label>

        <div class="col-sm-6">
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
        </div>
    </div>
    <br/>

    <h3 align="center" class="HEPP"></h3>

    <ul class="pager">
        <li class="previous">
            <a href="<?php echo site_url("dossier/consult_dossier"); ?>">← Accueil Dossier</a>
        </li>

        <li class="next">
            <a href="<?php echo site_url("pv/choixorientation"); ?>">Orientation →</a>
        </li>
    </ul>
</div>
