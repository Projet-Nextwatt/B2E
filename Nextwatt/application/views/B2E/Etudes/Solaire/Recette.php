<?php var_dump($this->session->all_userdata()); ?>


<div class="
<?php
if (isset($this->session->userdata['HEPP']) || isset($this->session->userdata['Orientation']) || isset($this->session->userdata['Orientation'])) {
    echo "col-xs-4";
} else {
    echo "col-xs-3";
}?>
">
    <table class="table table-bordered">
        <tr>
            <td>
            <span id="valeurhepp">
            <?php
            if (isset($this->session->userdata['HEPP']) && $this->session->userdata['HEPP'] != '') {
                echo "Vous avez choisi la station météo de <strong>" . $this->session->userdata['Ville'] . "</strong>";
            } else {
                ?>
                <span>Aucun HEPP :</span>
                <a href="<?php echo site_url("pv/choixstation") ?>">Choisir station</a>
            <?php } ?></span>
            </td>
            <?php if (isset($this->session->userdata['HEPP']) && $this->session->userdata['HEPP'] != '') { ?>
                <td>
                    <a href="<?php echo site_url("pv/choixstation") ?>">Changer de station</a>
                </td>
            <?php } ?>
        </tr>
        <tr>
            <td>
            <span id="choixorient"><?php
                if (isset($this->session->userdata['Orientation']) && $this->session->userdata['Orientation'] != '') {
                    echo "L'orientation sera de : <strong>" . $this->session->userdata['Orientation'] . "</strong>";
                } else {
                    ?>
                    <span>Aucune orientation :</span>
                    <a href="<?php echo site_url("pv/choixorientation") ?>">Choisir orientation</a>
                <?php } ?></span>
            </td>
            <?php if (isset($this->session->userdata['Orientation']) && $this->session->userdata['Orientation'] != '') { ?>
                <td>
                    <a href="<?php echo site_url("pv/choixorientation") ?>">Changer orientation</a>
                </td>
            <?php } ?>
        </tr>
        <tr>
            <td>
            <span id="resultratioc"><?php
                if (isset($this->session->userdata['Production']) && $this->session->userdata['Production'] != '') {
                    echo "La production est de : <strong>" . $this->session->userdata['Production'] . " kWh/an</strong>";
                } else {
                    ?>
                    <span>Aucune production de calculer :</span>
                    <a href="<?php echo site_url("pv/calculprod") ?>">Calculer la production</a>
                <?php } ?></span>
            </td>
            <?php if (isset($this->session->userdata['Production']) && $this->session->userdata['Production'] != '') { ?>
                <td>
                    <a href="<?php echo site_url("pv/calculprod") ?>">Recalculer la production</a>
                </td>
            <?php } ?>
        </tr>
    </table>
</div>

<table class="table table-bordered table-responsive text-center">
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
        <td id=""></td>
        <td id=""></td>
        <td id=""></td>

    </tr>
    <tr>
        <td id=""> Année 2</td>
        <td id="Prod2"></td>
        <td id="ProdCumul2"></td>
        <td id=""></td>
        <td id=""></td>
        <td id=""></td>
    </tr>
    <tr>
        <td id=""> Année 3</td>
        <td id="Prod3"></td>
        <td id="ProdCumul3"></td>
        <td id=""></td>
        <td id=""></td>
        <td id=""></td>
    </tr>
    <tr>
        <td id=""> Année 10</td>
        <td id="Prod10"></td>
        <td id="ProdCumul10"></td>
        <td id=""></td>
        <td id=""></td>
        <td id=""></td>
    </tr>
    <tr>
        <td id=""> Année 15</td>
        <td id="Prod15"></td>
        <td id="ProdCumul15"></td>
        <td id=""></td>
        <td id=""></td>
        <td id=""></td>
    </tr>
    <tr>
        <td id=""> Année 20</td>
        <td id="Prod20"></td>
        <td id="ProdCumul20"></td>
        <td id=""></td>
        <td id=""></td>
        <td id=""></td>
    </tr>
</table>
</div>