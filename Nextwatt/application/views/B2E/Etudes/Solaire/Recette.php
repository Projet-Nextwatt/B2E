<div class="
<?php
if (isset($this->session->userdata['HEPP']) || isset($this->session->userdata['Orientation']) || isset($this->session->userdata['Orientation'])) {
    echo "col-xs-4";
} else {
    echo "col-xs-3";
}?>
">

    <table class="table">
        <tr>
            <td style="border:none">
            <span id="valeurhepp">
            <?php
            if (isset($this->session->userdata['HEPP']) && $this->session->userdata['HEPP'] != '') {
                echo "Vous avez choisi la station météo de <strong>" . $this->session->userdata['Ville'] . "</strong>";
            } else {
                ?>
                <span>Aucune station choisie : </span>
                <a href="<?php echo site_url("pv/choixstation") ?>">Choisir station</a>
            <?php } ?></span>
            </td>
            <?php if (isset($this->session->userdata['HEPP']) && $this->session->userdata['HEPP'] != '') { ?>
                <td style="border:none">
                    <a href="<?php echo site_url("pv/choixstation") ?>">Changer de station</a>
                </td>
            <?php } ?>
        </tr>
        <tr>
            <td style="border:none">
            <span id="choixorient"><?php
                if (isset($this->session->userdata['Orientation']) && $this->session->userdata['Orientation'] != '') {
                    echo "L'orientation sera de : <strong>" . $this->session->userdata['Orientation'] . "</strong>";
                } else {
                    ?>
                    <span>Aucune orientation choisi : </span>
                    <a href="<?php echo site_url("pv/choixorientation") ?>">Choisir orientation</a>
                <?php } ?></span>
            </td>
            <?php if (isset($this->session->userdata['Orientation']) && $this->session->userdata['Orientation'] != '') { ?>
                <td style="border:none">
                    <a href="<?php echo site_url("pv/choixorientation") ?>">Changer orientation</a>
                </td>
            <?php } ?>
        </tr>
        <tr>
            <td style="border:none">
            <span id="resultratioc"><?php
                if (isset($this->session->userdata['Panneau']) && $this->session->userdata['Panneau'] != '') {
                    echo "Le kit choisi est : <strong>" . $this->session->userdata['Panneau'];
                } else {
                    ?>
                    <span>Aucun kit choisi : </span>
                    <a href="<?php echo site_url("pv/calculprod") ?>">Choisir un kit</a>
                <?php } ?></span>
            </td>
            <?php if (isset($this->session->userdata['Panneau']) && $this->session->userdata['Panneau'] != '') { ?>
                <td style="border:none">
                    <a href="<?php echo site_url("pv/calculprod") ?>">Changer le kit</a>
                </td>
            <?php } ?>
        </tr>
    </table>
</div>

<div class="col-xs-12">
    <?php
    $panneau = $this->session->userdata('Panneau');
    $tarifdedf = $this->session->userdata('Tarifedf');
    $raccordement = $this->session->userdata('Raccordement');
    if (!isset($panneau) || $panneau == '' ||
        !isset($tarifdedf) || $tarifdedf == 0 ||
        !isset($raccordement) || $raccordement == ''
    ) {
        ?>
        <div class="table-header" style="background-color: #fff"> "<span class='text-danger'>
    <i class='ace-icon fa fa-exclamation-triangle icon-animated-bell bigger-125'></i> Calcul impossible donnée(s) manquante(s) :
                <?php if (!isset($panneau) || $panneau == 0) { ?>
                    <a href="<?php echo site_url("pv/calculprod") ?>">
                        <button type="button" class="btn btn-danger btn-xs">Panneau</button>
                    </a>
                <?php } ?>
                <?php if (!isset($tarifdedf) || $tarifdedf == 0) { ?>
                    <a href="<?php echo site_url("pv/calculrecette") ?>">
                        <button type="button" class="btn btn-danger btn-xs">Tarif EDF</button>
                    </a>
                <?php } ?>
                <?php if (!isset($raccordement) || $raccordement == 0) { ?>
                    <a href="<?php echo site_url("pv/calculprod") ?>">
                        <button type="button" class="btn btn-danger btn-xs">Raccordement</button>
                    </a>
                <?php } ?>
    </span>
        </div>
    <?php } ?>

    <table class="table table-bordered table-responsive text-center table-hover table-striped">
        <thead>
        <tr>
            <th>
                Annuitées
            </th>
            <th>
                Production à l'année ( en kWh )
            </th>
            <th>
                Production cumulée jusqu'à l'année ( en kWh )
            </th>
            <th>
                Tarif à l'année ( en € )
            </th>
            <th>
                Flouz à l'année ( en € )
            </th>
            <th>
                Flouz cumulé à l'année ( en € )
            </th>
        </tr>
        </thead>
        <tr>
            <td id=""> Année 1</td>
            <td id="Prod1"></td>
            <td id="ProdCumul1"></td>
            <td id="tarif1"></td>
            <td id="flouz1"></td>
            <td id="cumulflouz1"></td>

        </tr>
        <tr>
            <td id=""> Année 2</td>
            <td id="Prod2"></td>
            <td id="ProdCumul2"></td>
            <td id="tarif2"></td>
            <td id="flouz2"></td>
            <td id="cumulflouz2"></td>
        </tr>
        <tr>
            <td id=""> Année 3</td>
            <td id="Prod3"></td>
            <td id="ProdCumul3"></td>
            <td id="tarif3"></td>
            <td id="flouz3"></td>
            <td id="cumulflouz3"></td>
        </tr>
        <tr>
            <td id=""> Année 10</td>
            <td id="Prod10"></td>
            <td id="ProdCumul10"></td>
            <td id="tarif10"></td>
            <td id="flouz10"></td>
            <td id="cumulflouz10"></td>
        </tr>
        <tr>
            <td id=""> Année 15</td>
            <td id="Prod15"></td>
            <td id="ProdCumul15"></td>
            <td id="tarif15"></td>
            <td id="flouz15"></td>
            <td id="cumulflouz15"></td>
        </tr>
        <tr>
            <td id=""> Année 20</td>
            <td id="Prod20"></td>
            <td id="ProdCumul20"></td>
            <td id="tarif20"></td>
            <td id="flouz20"></td>
            <td id="cumulflouz20"></td>
        </tr>
    </table>
</div>


<div class="col - xs - 12">
    <ul class="pager">
        <li class="previous">
            <a href=" <?php echo site_url("pv/calculrecette"); ?>"><h4>← Calculer Recette</h4></a>
        </li>

        <li class="next">
            <a href="<?php echo site_url("pv/recette"); ?>"><h4>Chuuuuuut cliques pas ! →</h4></a>
        </li>
    </ul>
</div>

