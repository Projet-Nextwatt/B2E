<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <!-- use the following meta to force IE use its most up to date rendering engine -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <meta name="description" content="page description"/>
    <!--    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"/>-->
    <link rel="SHORTCUT ICON" href="<?php echo img_url('favicon.ico'); ?>"/>
    <style type="text/css">

        ::selection {
            background-color: #E13300;
            color: white;
        }

        ::moz-selection {
            background-color: #E13300;
            color: white;
        }

        ::webkit-selection {
            background-color: #E13300;
            color: white;
        }

        @page {
            //margin: 0px;
        }

        #footer {
            position: fixed;
            left: 0px;
            bottom: -30px;
            right: 0px;
            height: 40px; }

        #ampoule {
            font-family: Arial Black;
            text-align: center;
            position: absolute;
            bottom: 2%;
            right: 5%;
            z-index: -999999;
        }

        body {
            background-color: #fff;
            margin: 0px;
            font: 15px/19px normal;
            color: black;
        }


        .tablepdf {
            border-collapse: collapse;
        }

        th {
            background-color: #61AE51;
            color: white;
        }

        td {
            text-align: center;
        }

        h1 {
            margin-top: 45px;;
            margin-bottom: 8px;
            font-weight: normal;
        }

        .rowfonce {
            background-color: #D5E3CF;
        }

        .rowclair {
            background-color: #EBF1E9;
        }

        caption {
            font-weight: bold
        }



        .alignleft {
            text-align: left;
        }

        .alignright {
            text-align: right;
        }

        .center {
            text-align: center;
        }

        #tabannuite th {
            text-align: left;
            padding-left: 10px;
        }

        #tabannuite td {
            text-align: left;
            padding-left: 10px;
        }
        .doublefieldset{
            height: 120px;
        }

        img {
            margin:0px;
            padding:0px;
        }

    </style>
</head>
<body>
<div id="footer" class="center">
    <p>www.nextwatt.fr
    <br/><img height="20px" src="<?php echo img_url('0_820_20_49_00.png'); ?>"/></p>
</div>
<div id="ampoule">
    <img height="240px" src="<?php echo img_url('ampoule.png'); ?>"/>
</div>
<table class="tablepdf">
    <tr>
        <td class="alignleft" style="width:400px;">
            <img height="80px" src="<?php echo img_url('logo.png'); ?>"/>
        </td>
        <td>
            <fieldset class="alignleft">
                <legend>
                    <strong>
                    <?php
                    if (empty($client['prenom1'])) {
                        $civ = $client['civilite'];
                        echo($civ == 1 ? 'Madame ' : '');
                        echo($civ == 2 ? 'Mademoiselle ' : '');
                        echo($civ == 3 ? 'Monsieur ' : '');
                    }
                    echo $client['nom1'] . ' ' . $client['prenom1'];
                    if (!(empty($client['prenom2']))) {
                        echo ' et ';
                        if ($client['nom1'] != $client['nom2']) {
                            echo $client['nom2'];
                        }

                        echo ' ' . $client['prenom2'];
                    }
                    ?>
                    </strong>
                </legend>

                <?php
                echo ""
                    . nl2br($client['adresse']) . '<br/>'
                    . $client['codepostal'] . ' ' . $client['ville'];
                ?>


                <?php if (!(empty($client['email']))) { ?>
                    <br/>
                    <strong>E-mail : </strong> <?php echo $client['email'] ?>

                <?php } ?>

                <?php if (!(empty($client['tel1'])) OR !(empty($client['tel2']))) { ?>
                    <br/>
                    <strong>Téléphone : </strong>
                    <?php
                    echo $client['tel1'];
                    echo((empty($client['tel1']) OR (empty($client['tel2']))) ? '' : ' / ');
                    echo $client['tel2'];
                    ?>

                <?php } ?>

                <!--<br/><br/>
                    <strong>Responsable : </strong> <?php echo $responsable; ?>-->
            </fieldset>
        </td>
    </tr>
</table>

<table class="tablepdf">
    <tr>
        <td colspan="2"><h1>Estimation de production Photovoltaïque</h1></td>
    </tr>
    <tr>
        <td colspan="2" class="alignleft"><?php
            $civ = $client['civilite'];
            echo($civ == 1 ? 'Madame ' : '');
            echo($civ == 2 ? 'Mademoiselle ' : '');
            echo($civ == 3 ? 'Monsieur ' : '');
            echo  $client['nom1']?>, <br/>dans le cadre de nos échanges, vous avez souhaité une
            estimation des revenus de
            production de votre future installation.
        </td>
    </tr>
    <tr>
        <td colspan="2"><br/></td>
    </tr>
    <tr>
        <td>
            <fieldset class="alignleft doublefieldset">
                <legend><strong style="font-size: 120%">Données environnementales</strong></legend>
                Station météo la plus proche : <strong><?php echo $this->session->userdata['Ville'] ?></strong> <br/>
                Orientation du toit : <strong> <?php echo $listorientation[$this->session->userdata('ChoixOrientation')] ?> </strong><br/>
                Présence de masques : <strong><?php
                    $textemasque=(100-($this->session->userdata('Ratioc'))).' % de pertes';
                    echo ($this->session->userdata('Ratioc')==100?'Aucun':$textemasque);?></strong>
            </fieldset>
        </td>
        <td>
            <fieldset class="alignleft doublefieldset">
                <legend><strong style="font-size: 120%">Centrale de production</strong></legend>
                Matériel : <strong><?php echo $this->session->userdata['Panneau'] ?></strong> <br/>
                Marque : <strong><?php echo $this->session->userdata['MarquePanneau'] ?></strong><br/>
                Intégration : <strong>Intégrée au bâtiment.</strong><br/>
                Puissance crête : <strong><?php echo number_format($this->session->userdata['Puissance'], 0, ',', ' ') ?> Watts</strong><br/>
                <?php
                $bonusProd = $this->session->userdata('bonusProd');
                if(isset($bonusProd) && $bonusProd != 0){
                    echo 'Rentabilité optimisée : <strong> +'.$bonusProd/100 .' %</strong><br/>';
                }?>
                Prix du kit : <strong><?php echo number_format($this->session->userdata['PrixPanneau'], 0, ',', ' ') ?> €</strong>
            </fieldset>
        </td>
    </tr>

    <tr><td><br/></td></tr>
    <tr style="font:18px;">
        <td colspan="2">
            <table style="width: 100%;" id="tabannuite">
                <thead>
                <tr>
                    <th>
                        Annuitées
                    </th>
                    <th>
                        Production (***)
                    </th>
                    <th>
                        Tarif (*) (**)
                    </th>
                    <th>
                        Recette
                    </th>
                </tr>
                </thead>
                <tr class="rowfonce">
                    <td> Année 1</td>
                    <td><?php echo number_format($Prodannuelle[0], 0, ',', ' ') ?> kWh</td>
                    <td><?php echo number_format($tarifannuel[0], 4, ',', ' ') ?> €/kWh</td>
                    <td><strong><?php echo number_format($flouzannuel[0], 0, ',', ' ') ?> €</strong></td>

                </tr>
                <tr class="rowclair">
                    <td> Année 2</td>
                    <td><?php echo number_format($Prodannuelle[1], 0, ',', ' ') ?> kWh</td>
                    <td><?php echo number_format($tarifannuel[1], 4, ',', ' ') ?> €/kWh</td>
                    <td><strong><?php echo number_format($flouzannuel[1], 0, ',', ' ') ?> €</strong></td>
                </tr>
                <tr class="rowfonce">
                    <td> Année 3</td>
                    <td><?php echo number_format($Prodannuelle[2], 0, ',', ' ') ?> kWh</td>
                    <td><?php echo number_format($tarifannuel[2], 4, ',', ' ') ?> €/kWh</td>
                    <td><strong><?php echo number_format($flouzannuel[2], 0, ',', ' ') ?> €</strong></td>
                </tr>
                <tr class="rowclair">
                    <td> Année 10</td>
                    <td><?php echo number_format($Prodannuelle[9], 0, ',', ' ') ?> kWh</td>
                    <td><?php echo number_format($tarifannuel[9], 4, ',', ' ') ?> €/kWh</td>
                    <td><strong><?php echo number_format($flouzannuel[9], 0, ',', ' ') ?> €</strong></td>
                </tr>
                <tr class="rowfonce">
                    <td> Année 15</td>
                    <td><?php echo number_format($Prodannuelle[14], 0, ',', ' ') ?> kWh</td>
                    <td><?php echo number_format($tarifannuel[14], 4, ',', ' ') ?> €/kWh</td>
                    <td><strong><?php echo number_format($flouzannuel[14], 0, ',', ' ') ?> €</strong></td>
                </tr>
                <tr class="rowclair">
                    <td> Année 20</td>
                    <td><?php echo number_format($Prodannuelle[19], 0, ',', ' ') ?> kWh</td>
                    <td><?php echo number_format($tarifannuel[19], 4, ',', ' ') ?> €/kWh</td>
                    <td><strong><?php echo number_format($flouzannuel[19], 0, ',', ' ') ?> €</strong></td>
                </tr>
                <tr class="rowfonce" style="font: 22px">
                    <td></td>
                    <td colspan="2">Total des revenus sur 20 ans</td>
                    <td><?php echo number_format($flouzcumul[19], 0, ',', ' ') ?> €</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="alignleft">(*) Estimation en date du <?php echo date('j/m/Y')?>, tarif de rachat en vigueur
            : <?php echo $this->session->userdata['Tarifedf'] ?> €/kWh, sous réserve d'éligibilité au près d'ERDF.
        </td>
    </tr>
    <tr>
        <td colspan="2" class="alignleft">(**) Hypothèse d'augmentation du tarif de rachat: <?php echo $this->session->userdata('Inflation') ?>% - source : EDF</td>
    </tr>
    <tr>
        <td colspan="2" class="alignleft">(***) Hypothèse de dégradation du panneau: 0.5 % / an - source : Etude INES</td>
    </tr>
    <tr>
        <td colspan="2"><br/></td>
    </tr>
    <tr>
        <td colspan="2" class="alignleft">Ce document représente une estimation des revenus.</td>
    </tr>
    <tr>
        <td colspan="2" class="alignleft">Nextwatt ne garantie pas celle-ci.</td>
    </tr>
    <tr>
        <td colspan="2" class="alignleft">VOIR LE TEXTE avec Damien.</td>
    </tr>
</table>