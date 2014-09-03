<?php $pdf = true; ?>
<div class="inline col-sm-6">

    <table class="table" style="width: auto;">
        <tr>
            <th colspan="2" style="border:none; border-bottom: 1px solid">
                Votre sélection
            </th>
        </tr>
        <tr>
            <td style="border:none; padding: 2px;">
            <span id="valeurhepp">
            <?php
            if (isset($this->session->userdata['HEPP']) && $this->session->userdata['HEPP'] != '') {
                echo "Station météo la plus proche : <strong>" . $this->session->userdata['Ville'] . "</strong>";
                echo " <small><em>(". $this->session->userdata['HEPP']." HEPP)</em></small>";
            } else {
                $pdf = false;
                ?>
                <span>Aucune station choisie : </span>
                <a href="<?php echo site_url("pv/choixstation") ?>">Choisir station</a>
            <?php } ?></span>
            </td>
            <?php if (isset($this->session->userdata['HEPP']) && $this->session->userdata['HEPP'] != '') { ?>
                <td style="border:none; padding: 2px; ">
                    <a href="<?php echo site_url("pv/choixstation") ?>">
                        <button class="btn btn-white btn-primary btn-round btn-sm"><i
                                class="ace-icon fa fa-edit bigger-120"></i></button>
                    </a>
                </td>
            <?php } ?>
        </tr>
        <tr>
            <td style="border:none; padding: 2px;">
            <span id="choixorient"><?php
                if (isset($this->session->userdata['Orientation']) && $this->session->userdata['Orientation'] != '') {
                    echo "Orientation du toit : <strong>" . $listorientation[$this->session->userdata('ChoixOrientation')] ."</strong>";
                    echo " <small><em>(". (100-$this->session->userdata('Orientation'))." % de pertes)</em></small>";
                } else {
                    $pdf = false;
                    ?>
                    <span>Aucune orientation choisi : </span>
                    <a href="<?php echo site_url("pv/choixorientation") ?>">Choisir orientation</a>
                <?php } ?></span>
            </td>
            <?php if (isset($this->session->userdata['Orientation']) && $this->session->userdata['Orientation'] != '') { ?>
                <td style="border:none; padding: 2px;">
                    <a href="<?php echo site_url("pv/choixorientation") ?>">
                        <button class="btn btn-white btn-primary btn-round btn-sm"><i
                                class="ace-icon fa fa-edit bigger-120"></i></button>
                    </a>
                </td>
            <?php } ?>
        </tr>
        <tr>
            <td style="border:none; padding: 2px;">
            <span id="masque"><?php
                $textemasque=(100-($this->session->userdata('Ratioc'))).' % de pertes';
                echo "Masque : <strong>" . ($this->session->userdata('Ratioc')==100?'Aucun':$textemasque) ."</strong>";?>

            </td>
            <td style="border:none; padding: 2px;">
                <a href="<?php echo site_url("pv/calculmasque") ?>">
                    <button class="btn btn-white btn-primary btn-round btn-sm"><i
                            class="ace-icon fa fa-edit bigger-120"></i></button>
                </a>
            </td>
        </tr>
        <tr>
            <td style="border:none; padding: 2px;">
            <span id="resultratioc"><?php
                if (isset($this->session->userdata['Panneau']) && $this->session->userdata['Panneau'] != '') {
                    echo "Le kit choisi est : <strong>" . $this->session->userdata['Panneau'];
                    if (isset($this->session->userdata['bonusProd']) && $this->session->userdata['bonusProd'] != 0) {
                        echo "<br/>";
                        echo '<i class="ace-icon fa fa-plus-circle green bigger-120"></i> ';
                        echo "<strong>Rentabilité optimisée : +".($this->session->userdata['bonusProd']/100)." %</strong>";
                    }
                    if (isset($this->session->userdata['Chauffe']) && $this->session->userdata['Chauffe'] != 0) {
                        echo "<br/>";
                        echo '<i class="ace-icon fa fa-plus-circle green bigger-120"></i> ';
                        echo "<strong>Chauffage</strong>";
                    }
                    if (isset($this->session->userdata['ECSsol']) && $this->session->userdata['ECSsol'] != 0) {
                        echo "<br/>";
                        echo '<i class="ace-icon fa fa-plus-circle green bigger-120"></i> ';
                        echo "<strong>Eau Chaude Sanitaire</strong>";
                    }



                } else {
                    $pdf = false;
                    ?>
                    <span>Aucun kit choisi : </span>
                    <a href="<?php echo site_url("pv/calculprod") ?>">Choisir un kit</a>
                <?php } ?></span>
            </td>
            <?php if (isset($this->session->userdata['Panneau']) && $this->session->userdata['Panneau'] != '') { ?>
                <td style="border:none; padding: 2px;">
                    <a href="<?php echo site_url("pv/calculprod") ?>">
                        <button class="btn  btn-white btn-primary btn-round btn-sm"><i
                                class="ace-icon fa fa-edit bigger-120"></i></button>
                    </a>
                </td>
            <?php } ?>
        </tr>
    </table>
</div>

<div class="inline center col-sm-6" style="padding-top: 3%">
    <?php if (isset($msgsucces)) { ?>
        <a href=" <?php echo site_url("CI_dossier/select_dossier"); ?>">
            <button class="btn btn-primary btn-white btn-round"><h4><i class="ace-icon fa fa-reply bigger-120"></i>
                    Revenir sur dossier</h4></button>
        </a>
        <br/><br/>
        <p><?php if (isset($msgsucces)) {
                echo($msgsucces);
            } ?></p>
    <?php } else { ?>
        <a href=" <?php echo site_url("pv/enregistrer_etude"); ?>">
            <button class="btn btn-primary btn-white btn-round"><h4>Enregistrer l'étude</h4></button>
        </a>
        <br/><br/>

    <?php } ?>
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
                    Tarif à l'année ( en €/kWh )
                </th>
                <th>
                    Recette à l'année ( en € )
                </th>
                <th>
                    Recette cumulé ( en € )
                </th>
            </tr>
            </thead>
            <tr>
                <td> Année 1</td>
                <td><?php echo number_format($Prodannuelle[0],0, ',', ' ') ?></td>
                <td><?php echo $tarifannuel[0] ?></td>
                <td><?php echo number_format($flouzannuel[0], 0, ',', ' ') ?></td>
                <td><strong><?php echo number_format($flouzcumul[0], 0, ',', ' ') ?></strong></td>

            </tr>
            <tr>
                <td> Année 2</td>
                <td><?php echo number_format($Prodannuelle[1], 0, ',', ' ') ?></td>
                <td><?php echo $tarifannuel[1] ?></td>
                <td><?php echo number_format($flouzannuel[1], 0, ',', ' ') ?></td>
                <td><strong><?php echo number_format($flouzcumul[1], 0, ',', ' ') ?></strong></td>
            </tr>
            <tr>
                <td> Année 3</td>
                <td><?php echo number_format($Prodannuelle[2], 0, ',', ' ') ?></td>
                <td><?php echo $tarifannuel[2] ?></td>
                <td><?php echo number_format($flouzannuel[2], 0, ',', ' ') ?></td>
                <td><strong><?php echo number_format($flouzcumul[2], 0, ',', ' ') ?></strong></td>
            </tr>
            <tr>
                <td> Année 10</td>
                <td><?php echo number_format($Prodannuelle[9],0, ',', ' ') ?></td>
                <td><?php echo $tarifannuel[9] ?></td>
                <td><?php echo number_format($flouzannuel[9], 0, ',', ' ') ?></td>
                <td><strong><?php echo number_format($flouzcumul[9], 0, ',', ' ') ?></strong></td>
            </tr>
            <tr>
                <td> Année 15</td>
                <td><?php echo number_format($Prodannuelle[14], 0, ',', ' ') ?></td>
                <td><?php echo $tarifannuel[14] ?></td>
                <td><?php echo number_format($flouzannuel[14], 0, ',', ' ') ?></td>
                <td><strong><?php echo number_format($flouzcumul[14], 0, ',', ' ') ?></strong></td>
            </tr>
            <tr>
                <td> Année 20</td>
                <td><?php echo number_format($Prodannuelle[19], 0, ',', ' ') ?></td>
                <td><?php echo $tarifannuel[19] ?></td>
                <td><?php echo number_format($flouzannuel[19], 0, ',', ' ') ?></td>
                <td><strong><?php echo number_format($flouzcumul[19], 0, ',', ' ') ?></strong></td>
            </tr>
            <tr>
                <td style="border-color: #ffffff; background-color: white"></td>
                <td style="border-color: #ffffff; background-color: white">-0.5 %/an - source : Etude INES</td>
                <td style="border-color: #ffffff; background-color: white">
                    +<?php echo $this->session->userdata('Inflation') ?>%/an - source : EDF
                </td>
                <td style="border-color: #ffffff; background-color: white"></td>
                <td style="border-color: #ffffff; background-color: white"></td>
            </tr>
        </table>
    </div>
</div>
<div class="col-xs-12 col-sm-offset-5">
    <p><h4><strong>Recette sur 20 ans : <span class="green"><?php echo number_format($flouzcumul[19], 0, ',', ' ') ?>
                €</span></strong></h4></p>
    <!--    <br/>-->
</div>
<?php if($this->session->userdata('Chauffe') !=null) {?>
<div class="col-xs-12 col-sm-offset-5">
    <h4><strong>Et des économies annuelle de chauffage jusqu'à : </strong></h4>
    <ul class="list-unstyled">
        <li><h4><strong><i class="ace-icon fa fa-flash green "></i><span
                        class="green"> - <?php echo number_format($this->session->userdata('ecoElec'), 0, ',', ' ') ?>
                        €</span> avec un chauffage électrique <span class="green">- </span></strong><i class="ace-icon fa fa-flash green "></i></h4>
        </li>
        <li><h4><strong><i class="ace-icon fa fa-tint green"></i><span
                        class="green"> - <?php echo number_format($this->session->userdata('ecoFioul'), 0, ',', ' ') ?>
                        €</span> avec un chauffage au fioul <span class="green">- </span></strong><i class="ace-icon fa fa-tint green"></i></h4></li>
        <li><h4><strong><i class="ace-icon fa fa-cloud green"></i><span
                        class="green"> - <?php echo number_format($this->session->userdata('ecoGaz'), 0, ',', ' ') ?>
                        €</span> avec un chauffage au gaz <span class="green">- </span><i class="ace-icon fa fa-cloud green"></i></strong></h4></li>
    </ul>
</div>
<?php } ?>

<div class="col - xs - 12">
    <ul class="pager">
        <li class="previous">
            <a href=" <?php echo site_url("pv/calculprod"); ?>"><h4>← Choix système</h4></a>
        </li>
        <?php
        $disable = null;
        $link = site_url("pv/pdf");
        if ($pdf == false) {
            $disable = 'disabled';
            $link = null;
        } ?>

        <li class="next green <?php echo $disable ?>">
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
