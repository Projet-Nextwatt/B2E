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
                    <option value="<?php echo $ensol['id'] ?>"><?php echo $ensol['Ville'] ?></option>
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
            <a href="<?php echo site_url("dossier/consult_dossier"); ?>"><h4>← Accueil Dossier</h4></a>
        </li>
<!--        <li class="center">-->
<!--            <div class="control-group">-->
<!---->
<!--                <div class="radio inline">-->
<!--                    <label>-->
<!--                        <div>-->
<!---->
<!--                            <input name="panneau" type="radio" value="1" checked class="ace">-->
<!--                        </div>-->
<!--                        <span class="lbl"> Panneau 1</span>-->
<!--                    </label>-->
<!--                </div>-->
<!---->
<!--                <div class="radio inline">-->
<!--                    <label>-->
<!--                        <input name="panneau" type="radio" value="2" class="ace">-->
<!--                        <span class="lbl"> Panneau 2</span>-->
<!--                    </label>-->
<!--                </div>-->
<!---->
<!--                <div class="radio inline">-->
<!--                    <label>-->
<!--                        <input name="panneau" type="radio" value="3" class="ace">-->
<!--                        <span class="lbl"> Panneau 3</span>-->
<!--                    </label>-->
<!--                </div>-->
<!--            </div>-->
<!--        </li>-->
        <li class="next ">
            <a href="<?php echo site_url("pv/choixorientation"); ?>"><h4>Orientation →</h4></a>
        </li>
    </ul>
</div>
