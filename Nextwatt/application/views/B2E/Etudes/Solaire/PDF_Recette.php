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

        body {
            background-color: #fff;
            margin: 0px;
            font: 13px/20px normal "Open Sans", sans-serif;
            color: black;
        }

        .tablepdf {
            text-align: center;
            border-collapse: collapse;
        }

        th {
            background-color: #61AE51;
            color: white;
        }

        .rowclair {
            background-color: #DAF298;
        }

        td {
            text-align: center;
        }

        .rowfonce {
            background-color: #C4ED5C;
        }

        caption {
            font-weight: bold
        }

        #filigrane {
            font-family: Arial Black;
            text-align: center;
            position: absolute;
            color: #CCCCCC;
            opacity: 0.3;
            /*filter : alpha(opacity=30); */
            font-size: 72pt;
            width: 38cm;
            height: 4cm;
            margin-top: 15cm;
            top: 50%;
            margin-left: -15cm;
            left: 50%;
            -ms-transform: rotate(305deg);
            transform: rotate(305deg);
            -moz-transform: rotate(305deg);
            -webkit-transform: rotate(305deg);
            -khtml-transform: rotate(305deg);
            z-index: 999999;
        }

        .alignleft {
            text-align: left;
        }

        .alignright {
            text-align: right;
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
            height: 200px;
        }
    </style>
</head>
<body>
<!--<div id="filigrane"> FILIGRANE</div>-->
<table class="tablepdf">
    <tr>
        <td rowspan="2">
            <fieldset class="alignleft">
                <?php echo($this->session->userdata['nomClient'].' '.$this->session->userdata['prenomClient']) ?> <br/>
                67 impasse du vieux renard <br/>
                13100 AIX EN PROVENCE <br/>
                <a href="Sg.dupond@email.fr">Sg.dupond@email.fr</a><br/>
                06.06.06.06.06 / 04.04.04.04.04
            </fieldset>
        </td>
        <td class="alignright"><img src="<?php echo img_url('MiniLogoNextwatt.png'); ?>"/></td>
    </tr>
    <tr>
        <td class="alignright"><?php echo date('j/m/Y')?></td>
    </tr>
    <tr>
        <td colspan="2"><br/></td>
    </tr>
    <tr>
        <td colspan="2"><h1>Estimation de production Photovoltaïque</h1></td>
    </tr>
    <tr>
        <td colspan="2" class="alignleft">Monsieur Dupond, dans le cadre de nos échanges, vous avez souhaité une
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
                <label><h4><strong style="text-decoration:underline;font-size: 120%">Données environnementales :</strong></h4></label>
                Station météo la plus proche : <strong><?php echo $this->session->userdata['Ville'] ?></strong> <br/>
                Orientation du toit : <strong><?php echo $this->session->userdata['Orientation'] ?></strong><br/>
                Pertes du aux masques : <strong><?php echo $this->session->userdata['Ratioc'] ?> %</strong>
            </fieldset>
        </td>
        <td>
            <fieldset class="alignleft doublefieldset">
                <label><h4><strong style="text-decoration:underline;font-size: 120%">Centrale de production :</strong></h4></label>
                Matériel : <strong><?php echo $this->session->userdata['Panneau'] ?></strong> <br/>
                Marque : <strong><?php echo $this->session->userdata['MarquePanneau'] ?></strong><br/>
                Intégration : <strong>Intégrée au bâtiment.</strong><br/>
                Puissance crête : <strong><?php echo number_format($this->session->userdata['Production'], 0, ',', ' ') ?> Watts</strong><br/><br/>
                Prix du kit : <strong><?php echo number_format($this->session->userdata['PrixPanneau'], 0, ',', ' ') ?> €</strong>
            </fieldset>
        </td>
    </tr>
    <tr>
        <td colspan="2"><br/></td>
    </tr>
    <tr>
        <td colspan="2" class="alignleft">Estimation en date du <?php echo date('j/m/Y')?>, tarif de rachat en vigueur
            : <?php echo $this->session->userdata['Tarifedf'] ?> €/kWh, sous réserve d'égibilité au près d'ERDF.
        </td>
    </tr>
    <tr>
        <td colspan="2"><br/></td>
    </tr>
    <tr>
        <td colspan="2">
            <table style="width: 100%;" id="tabannuite">
                <thead>
                <tr>
                    <th>
                        Annuitées
                    </th>
                    <th>
                        Production
                    </th>
                    <th>
                        Tarif
                    </th>
                    <th>
                        Recette
                    </th>
                </tr>
                </thead>
                <tr class="rowfonce">
                    <td> Année 1</td>
                    <td><?php echo number_format($Prodannuelle[0], 0, ',', ' ') ?> kWh</td>
                    <td><?php echo $tarifannuel[0] ?> €/kWh</td>
                    <td><strong><?php echo number_format($flouzannuel[0], 0, ',', ' ') ?> €</strong></td>

                </tr>
                <tr class="rowclair">
                    <td> Année 2</td>
                    <td><?php echo number_format($Prodannuelle[1], 0, ',', ' ') ?> kWh</td>
                    <td><?php echo $tarifannuel[1] ?> €/kWh</td>
                    <td><strong><?php echo number_format($flouzannuel[1], 0, ',', ' ') ?> €</strong></td>
                </tr>
                <tr class="rowfonce">
                    <td> Année 3</td>
                    <td><?php echo number_format($Prodannuelle[2], 0, ',', ' ') ?> kWh</td>
                    <td><?php echo $tarifannuel[2] ?> €/kWh</td>
                    <td><strong><?php echo number_format($flouzannuel[2], 0, ',', ' ') ?> €</strong></td>
                </tr>
                <tr class="rowclair">
                    <td> Année 10</td>
                    <td><?php echo number_format($Prodannuelle[9], 0, ',', ' ') ?> kWh</td>
                    <td><?php echo $tarifannuel[9] ?> €/kWh</td>
                    <td><strong><?php echo number_format($flouzannuel[9], 0, ',', ' ') ?> €</strong></td>
                </tr>
                <tr class="rowfonce">
                    <td> Année 15</td>
                    <td><?php echo number_format($Prodannuelle[14], 0, ',', ' ') ?> kWh</td>
                    <td><?php echo $tarifannuel[14] ?> €/kWh</td>
                    <td><strong><?php echo number_format($flouzannuel[14], 0, ',', ' ') ?> €</strong></td>
                </tr>
                <tr class="rowclair">
                    <td> Année 20</td>
                    <td><?php echo number_format($Prodannuelle[19], 0, ',', ' ') ?> kWh</td>
                    <td><?php echo $tarifannuel[19] ?> €/kWh</td>
                    <td><strong><?php echo number_format($flouzannuel[19], 0, ',', ' ') ?> €</strong></td>
                </tr>
                <tr class="rowfonce">
                    <td></td>
                    <td colspan="2">Total des revenus sur 20 ans</td>
                    <td style="font-size: 120%"><?php echo number_format($flouzcumul[19], 0, ',', ' ') ?> €</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2"><br/></td>
    </tr>
    <tr>
        <td colspan="2" class="alignleft">Hypothèse de dégradation du panneau 0.5 % / an source : Etude INES</td>
    </tr>
    <tr>
        <td colspan="2" class="alignleft">Hypothèse d'augmentation du tarif de rachat <?php echo $this->session->userdata('Inflation') ?>% source : EDF</td>
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
        <td colspan="2" class="alignleft">VOIR LE TEXTE.</td>
    </tr>
</table>