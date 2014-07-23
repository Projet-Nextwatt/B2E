<div class="
<?php
$pdf = true;
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
                $pdf = false;
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
                    $pdf = false;
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
                    $pdf = false;
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
    if (!isset($panneau) || $panneau == '' ||
        !isset($tarifdedf) || $tarifdedf == 0
    ) {
        ?>
        <div class="table-header" style="background-color: #fff"> "<span class='text-danger'>
    <i class='ace-icon fa fa-exclamation-triangle icon-animated-bell bigger-125'></i> Calcul impossible donnée(s) manquante(s) :
                <?php if (!isset($panneau) || $panneau == 0) {
                    $pdf = false;
                    ?>
                    <a href="<?php echo site_url("pv/calculprod") ?>">
                        <button type="button" class="btn btn-danger btn-xs">Panneau</button>
                    </a>
                <?php } ?>
                <?php if (!isset($tarifdedf) || $tarifdedf == 0) {
                    $pdf = false;
                    ?>
                    <a href="<?php echo site_url("pv/calculrecette") ?>">
                        <button type="button" class="btn btn-danger btn-xs">Recette</button>
                    </a>
                <?php } ?>
    </span>
        </div>
    <?php } ?>
    <div class="table-responsive">
        <table class="table table-bordered text-center table-hover table-striped">
            <thead>
            <tr>
                <th>
                    Annuitées
                </th>
                <th>
                    Production à l'année ( en kWh )
                </th>
                <th>
                    Tarif à l'année ( en € )
                </th>
                <th>
                    Recette à l'année ( en € )
                </th>
                <th>
                    Recette cumulé à l'année ( en € )
                </th>
            </tr>
            </thead>
            <tr>
                <td> Année 1</td>
                <td><?php echo $Prodannuelle[0] ?></td>
                <td><?php echo $tarifannuel[0] ?></td>
                <td><?php echo $flouzannuel[0] ?></td>
                <td><?php echo $flouzcumul[0] ?></td>

            </tr>
            <tr>
                <td> Année 2</td>
                <td><?php echo $Prodannuelle[1] ?></td>
                <td><?php echo $tarifannuel[1] ?></td>
                <td><?php echo $flouzannuel[1] ?></td>
                <td><?php echo $flouzcumul[1] ?></td>
            </tr>
            <tr>
                <td> Année 3</td>
                <td><?php echo $Prodannuelle[2] ?></td>
                <td><?php echo $tarifannuel[2] ?></td>
                <td><?php echo $flouzannuel[2] ?></td>
                <td><?php echo $flouzcumul[2] ?></td>
            </tr>
            <tr>
                <td> Année 10</td>
                <td><?php echo $Prodannuelle[9] ?></td>
                <td><?php echo $tarifannuel[9] ?></td>
                <td><?php echo $flouzannuel[9] ?></td>
                <td><?php echo $flouzcumul[9] ?></td>
            </tr>
            <tr>
                <td> Année 15</td>
                <td><?php echo $Prodannuelle[14] ?></td>
                <td><?php echo $tarifannuel[14] ?></td>
                <td><?php echo $flouzannuel[14] ?></td>
                <td><?php echo $flouzcumul[14] ?></td>
            </tr>
            <tr>
                <td> Année 20</td>
                <td><?php echo $Prodannuelle[19] ?></td>
                <td><?php echo $tarifannuel[19] ?></td>
                <td><?php echo $flouzannuel[19] ?></td>
                <td><?php echo $flouzcumul[19] ?></td>
            </tr>
        </table>
    </div>
</div>

<div class="col - xs - 12">
    <ul class="pager">
        <li class="previous">
            <a href=" <?php echo site_url("pv/calculrecette"); ?>"><h4>← Calculer Recette</h4></a>
        </li>
        <?php if (isset($msgsucces)){ ?>
        <li class="center">
            <a href=" <?php echo site_url("pv/retour_menu_dossier"); ?>"><h4>Revenir sur dossier</h4></a>
            <br/><br/>
        </li>
        <p><?php if (isset($msgsucces)) {
                echo($msgsucces);
            } ?></p>
        <?php } else{ ?>
        <li class="center"">
            <a href=" <?php echo site_url("pv/enregistrer_etude"); ?>"><h4>Enregistrer l'étude</h4></a>
            <br/><br/>

            <?php } ?>
        </li>
        <?php
        $disable = null;
        $link = site_url("pv/pdf");
        if ($pdf == false) {
            $disable = 'disabled';
            $link = null;
        } ?>

        <li class="next <?php echo $disable ?>">
            <a href="<?php echo $link; ?>" target="_blank">
                <?php if ($pdf == false) { ?>
                    <div class="alert alert-danger">

                        <strong>
                            Manque d'information pour générer le PDF
                        </strong>
                        <br>
                    </div>
                <?php } ?>
                <h4><i class="ace-icon fa fa-print bigger-120"></i> Générer le PDF →</h4></a>
        </li>
    </ul>
</div>
