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
    <style type='text/css'>
        table {
            border-collapse: collapse;
            font: helvetica;
            color: #717375;
            line-height: 4.5mm;
            vertical-align: top;
        }

        h1 {
            color: #5DAD4C;
            font-size: 18pt;
        }

        .titre {
            background-color: #5DAD4C;
            color: white;
            font-size: 12pt;
            margin: 0px;
            padding: 2px;
            font-weight: bold;
        }

        strong {
            color: #000;
        }

        em {
            font-size: 7pt;
            line-height: 3mm;
            color: #717375;
        }

        th {
            text-align: center;
            color: #000;
            border-bottom: 1px solid black;
        }

        td {
        }

        ul {
            margin: 0px;
        }

        .titreProjet {
            text-align: center;
        }

        .ref {
            width: 15%;
        }

        td.ref {
            border-right: 1px solid black;
            border-bottom: 1px none black;
        }

        .libelle {
            width: 60%;
        }

        td.libelle {
            border-right: 1px solid black;
            padding-right: 5px;
            padding-left: 5px;
            padding-top: 3px;
            padding-bottom: 3px;
        }

        .TVA {
            width: 8%;
        }

        td.TVA {
            text-align: right;
        }

        .prixTTC {
            width: 15%;
        }

        td.prixTTC {
            text-align: right;
        }

        h4 {
            margin-bottom: 1px;
            margin-top: 2px;
        }

        p {
            margin-top: 0px;
            text-align: justify;
        }
        .table     { display: table }
        .tr        { display: table-row }
        .thead     { display: table-header-group }
        .tbody     { display: table-row-group }
        .tfoot     { display: table-footer-group }
        .col       { display: table-column }
        .colgroup  { display: table-column-group }
        .td, .th    { display: table-cell }
        .caption   { display: table-caption }

    </style>
</head>
<body>
<div class="table">
    <div class="tr">
        <div class="td">
            <img src="http://localhost/B2E/Nextwatt/application/helpers/assets/images/LogoNextwatt.png" width="386" height="83" alt="Logo Nextwatt"/>
        </div>
        <div class="td" style="width: 40%;">
            <?php
            if (isset($_GET['BDC'])) {
                echo "<h1>BON DE COMMANDE</h1>\n";
            } else {
                echo "<h1>DEVIS</h1>\n";
            }
            ?>
            <p>Num&eacute;ro de dossier : <?php echo $this->session->userdata('idDossier') ?><br/>
                R&eacute;f&eacute;rence client : <?php echo $this->session->userdata('idClient'); ?><br/>
                Emis le : <?php echo date("d-m-Y"); ?></p>
        </div>
    </div>
</div>
<!--<br/>-->
<!--<table>-->
<!--    <tr>-->
<!--        <td class='titre'>-->
<!--            <p style='padding-left:10px;'>COORDONN&Eacute;ES ENTREPRISE</p>-->
<!--        </td>-->
<!--        <td></td>-->
<!--        <td class='titre'>-->
<!--            <p style='padding-left:10px;'>COORDONN&Eacute;ES CLIENT</p>-->
<!--        </td>-->
<!--    </tr>-->
<!--    <tr>-->
<!---->
<!--        <td style="width:49%;">-->
<!--            <p style='padding-left:15px; padding-top: 5px;'>-->
<!--                <strong>SAS Nextwatt</strong><br/>-->
<!--                Si&egrave;ge social: Domaine du Petit Arbois<br/>-->
<!--                Avenue Louis Philibert - BP 40004<br/>-->
<!--                13545 Aix en Provence Cedex 4<br/>-->
<!--                <em>SAS- Siret 523 796 738 000 12 APE 7490B <br/>-->
<!--                    TVA intracommunautaire : FR23 523796738</em><br/>-->
<!--                <img style='width:70%;' alt='tel_nextwatt' src='--><?php //echo img_url('tel_nextwatt.png'); ?><!--'/>-->
<!--            </p>-->
<!--        </td>-->
<!--        <td style="width:1%;">-->
<!--        </td>-->
<!--        <td style="width:50%;">-->
<!--            <p style='padding-left:15px; padding-top: 5px;'>-->
<!--                <strong>--><?php //echo($nomclient1 . ' ' . $prenomclient1);
//                    if ($prenomclient2 != null) {
//                        echo(' et ');
//                        echo($prenomclient2);
//                        echo('<br/>');
//                    } else {
//                        echo('<br/>');
//                    } ?><!--</strong><br/>-->
<!---->
<!--                --><?php //echo $adresse; ?><!--<br/>-->
<!--                --><?php //echo $CP . " " . $ville; ?><!--<br/>-->
<!--                Tel<!-- &#9742;-->: --><?php //echo $clienttel1; ?>
<!--                --><?php //   if ($clienttel2 != '') {
//                    echo ' / ' . $clienttel2;
//                }?><!--<br/>-->
<!--                E-mail: --><?php //echo $clientmail; ?><!--<br/><br/>-->
<!--                <strong>Votre contact: </strong>--><?php //echo $userprenom . ' ' . $usernom; ?>
<!--                --><?php //if (!(empty($usermail))) {
//                    echo '<br/>' . $usermail;
//                } ?>
<!--                --><?php //if (!(empty($usertel))) {
//                    echo ' - ' . $usertel;
//                } ?>
<!--            </p>-->
<!--        </td>-->
<!--    </tr>-->
<!--</table>-->
<!--<table>-->
<!--<tr>-->
<!--    <td class='titre' style="width:100%;">-->
<!--        <p style='padding-left:10px;'>VOS PROJETS</p>-->
<!--    </td>-->
<!--</tr>-->
<!--</table>-->
<!---->
<?php
//if (isset($devis['produits'])) {
//    foreach ($devis['produits'] as $d) {
//        ?>
<!--        <h3 class='titreProjet'> Votre projet : --><?php //echo $d['Nom']; ?><!--</h3>-->
<!--        <table style='width: 100%;'>-->
<!--            <tr>-->
<!--                <th class="ref">R&eacute;f&eacute;rences</th>-->
<!--                <th class="libelle">D&eacute;signation du produit</th>-->
<!--                <!-- <th class='prix'>Prix HT</th> -->-->
<!--                <th class="TVA">TVA</th>-->
<!--                <th class="prixTTC">Prix TTC</th>-->
<!--            </tr>-->
<!---->
<!--            <tr>-->
<!--                <td class=ref>--><?php //echo $d['Reference']; ?><!--</td>-->
<!--                <td class="libelle">--><?php //echo $d['Libelle_Mat_SansMarque'] ?><!--</td>-->
<!--                <!-- <td>--><?php ////echo number_format($produit['produitsSelect_prixMatAnHT'], 2, ',', '&nbsp;')."&nbsp;&euro;";?><!--</td> -->-->
<!--                <td class="TVA">--><?php //echo number_format($d['TVA_Mat'] / 100, 1, ',', '.') . "%"; ?><!--</td>-->
<!--                <td class="prixTTC">--><?php //echo number_format($d['Prix_Annonce_TTC'], 2, ',', '.') . " &euro;"; ?><!--</td>-->
<!--            </tr>-->
<!---->
<!--            <tr>-->
<!--                <td class="ref"></td>-->
<!--                <td class="libelle">--><?php //echo $d['Libelle_MO']; ?><!--</td>-->
<!--                <!-- <td>--><?php ////echo number_format($produit['produitsSelect_prixMOHT'], 2, ',', '&nbsp;')."&nbsp;&euro;";?><!--</td> -->-->
<!--                <td class="TVA">--><?php //echo number_format(((int)$d['TVA_MO'] / 100), 1, ',', '.') . "%"; ?><!--</td>-->
<!--                <td class="prixTTC">--><?php //echo number_format($d['Prix_MO'], 2, ',', '.') . " &euro;"; ?><!--</td>-->
<!--            </tr>-->
<!---->
<!--            <tr>-->
<!--                <td class="ref"></td>-->
<!--                <td class="libelle">--><?php //echo html_entity_decode($d['Libelle_Garantie']); ?><!--</td>-->
<!--                <!-- <td></td> -->-->
<!--                <td class="TVA"></td>-->
<!--                <td class="prixTTC"></td>-->
<!--            </tr>-->
<!--        </table>-->
<!--        <!-- Complements -->-->
<!--        --><?php //if (isset($d['complements'])) {
//            foreach ($d['complements'] as $complement) {
//                ?>
<!--                <table style='width: 100%;'>-->
<!--                    --><?php //if ($complement['Prix_Annonce_TTC'] != 0) { ?>
<!--                        <tr>-->
<!--                            <td class='ref'>--><?php //echo $complement['Reference']; ?><!--</td>-->
<!--                            <td class='libelle'>--><?php //echo $complement['Libelle_Mat_SansMarque']; ?><!--</td>-->
<!--                            <!-- <td class='prix'>--><?php ////echo number_format($complement['produitsSelect_prixMatAnHT'], 2, ',', '&nbsp;')."&nbsp;&euro;";?><!--</td> -->-->
<!--                            <td class='TVA'>--><?php //echo number_format(((int)$complement['TVA_Mat'] / 100), 1, ',', '.') . "%"; ?><!--</td>-->
<!--                            <td class='prixTTC'>--><?php //echo number_format($complement['Prix_Annonce_TTC'], 2, ',', '.') . " &euro;"; ?><!--</td>-->
<!--                        </tr>-->
<!--                    --><?php //} ?>
<!--                    --><?php //if ($complement['Prix_MO'] != 0) { ?>
<!--                        <tr>-->
<!--                            <td class='ref'>--><?php //if ($complement['Prix_Annonce_TTC'] == 0) echo $complement['produitsSelect_ref']; ?><!--</td>-->
<!--                            <td class='libelle'>--><?php //echo $complement['Libelle_MO']; ?><!--</td>-->
<!--                            <!--  <td>--><?php ////echo number_format($complement['produitsSelect_prixMOHT'], 2, ',', '&nbsp;')."&nbsp;&euro;";?><!--</td> -->-->
<!--                            <td class='TVA'>--><?php //echo number_format(((int)$complement['TVA_MO'] / 100), 1, ',', '.') . "%"; ?><!--</td>-->
<!--                            <td class='prixTTC'>--><?php //echo number_format($complement['Prix_MO'], 2, ',', '.') . " &euro;"; ?><!--</td>-->
<!--                        </tr>-->
<!--                    --><?php //} ?>
<!--                </table>-->
<!--            --><?php
//            }
//        } ?>
<!--        <!-- Total projet -->-->
<!--        <table style='width: 100%;'>-->
<!--            <tr style="height:1px;">-->
<!--                <th></th>-->
<!--                <th></th>-->
<!--                <th></th>-->
<!--                <th></th>-->
<!--            </tr>-->
<!--            --><?php //if ($d['total_CEE'] != 0) {
//                ?>
<!--                <tr>-->
<!--                    <td style="border-right: 1px none;" class='ref'></td>-->
<!--                    <td style="text-align:right; color:#000;" class='libelle'>Remise CEE offerte par Ecopro (TTC)</td>-->
<!--                    <td class='TVA'>--><?php //echo number_format(((int)$d['TVA_Mat'] / 100), 1, ',', '.') . "%"; ?><!--</td>-->
<!--                    <td class='prixTTC'>--><?php //echo number_format($d['total_CEE'], 2, ',', '.') . " &euro;"; ?><!--</td>-->
<!--                </tr>-->
<!--            --><?php //} ?>
<!--            --><?php //if ($d['Remise'] != 0) {
//                ?>
<!--                <tr>-->
<!--                    <td style="border-right: 1px none;" class='ref'></td>-->
<!--                    <td style="text-align:right; color:#000;" class='libelle'>Remise Exceptionnelle (TTC)</td>-->
<!--                    <td class='TVA'>--><?php //echo number_format(((int)$d['TVA_Mat'] / 100), 1, ',', '.') . "%"; ?><!--</td>-->
<!--                    <td class='prixTTC'>--><?php //echo number_format($d['Remise'], 2, ',', '.') . " &euro;"; ?><!--</td>-->
<!--                </tr>-->
<!--            --><?php //} ?>
<!--            <tr style="height:1px;">-->
<!--                <td style="border-right: 1px none;" class='ref'></td>-->
<!--                <td style="text-align:right; color:#000;" class='libelle'></td>-->
<!--                <td style="border-bottom: 1px solid black;" class='TVA'></td>-->
<!--                <td style="border-bottom: 1px solid black;" class='prixTTC'></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td style="border-right: 1px none;" class='ref'></td>-->
<!--                <td style="text-align:right; color:#000;" class='libelle'>Montant HT</td>-->
<!--                <td class='TVA'></td>-->
<!--                <td class='prixTTC'>--><?php //echo number_format($d['total_HT'], 2, ',', '.') . " &euro;"; ?><!--</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td style="border-right: 1px none;" class='ref'></td>-->
<!--                <td style="text-align:right; color:#000;" class='libelle'>Montant TVA</td>-->
<!--                <td class='TVA'></td>-->
<!--                <td class='prixTTC'>--><?php //echo number_format($d['total_TVA'], 2, ',', '.') . " &euro;"; ?><!--</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td style="border-right: 1px none;" class='ref'></td>-->
<!--                <td style="text-align:right; color:#000;" class='libelle'>Montant TTC</td>-->
<!--                <td class='TVA'></td>-->
<!--                <td class='prixTTC'>-->
<!--                    <strong>--><?php //echo number_format($d['total_TTC'], 2, ',', '.') . " &euro;"; ?><!--</strong></td>-->
<!--            </tr>-->
<!--        </table>-->
<!--        <br/>-->
<!--    --><?php
//    }
//} ?>
<!---->
<!--<table>-->
<!--    <tr>-->
<!--        <td style='border: 3px double #5DAD4C; padding:5px; background-color: white;'>-->
<!--            <table style='text-align:right;'>-->
<!--                --><?php //if ($devis['TOTAL_CEE'] != 0) {
//                    ?>
<!--                    <tr>-->
<!--                        <td>Remise CEE (TTC)</td>-->
<!--                        <td>--><?php //echo number_format($devis['TOTAL_CEE'], 2, ',', '.') . " &euro;"; ?><!--</td>-->
<!--                    </tr>-->
<!--                --><?php //} ?>
<!--                --><?php //if ($devis['TOTAL_Remise'] != 0) {
//                    ?>
<!--                    <tr>-->
<!--                        <td>Remise Exceptionnelle (TTC)</td>-->
<!--                        <td>--><?php //echo number_format($devis['TOTAL_Remise'], 2, ',', '.') . " &euro;"; ?><!--</td>-->
<!--                    </tr>-->
<!--                --><?php //} ?>
<!--                <tr>-->
<!--                    <td>Total HT</td>-->
<!--                    <td>--><?php //echo number_format($devis['TOTAL_HT'], 2, ',', '.') . " &euro;"; ?><!--</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>Total TVA</td>-->
<!--                    <td>--><?php //echo number_format($devis['TOTAL_TVA'], 2, ',', '.') . " &euro;"; ?><!--</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>Total TTC</td>-->
<!--                    <td style="width: 100px;">-->
<!--                        <strong>--><?php //echo number_format($devis['TOTAL_TTC'], 2, ',', '.') . " &euro;"; ?><!--</strong></td>-->
<!--                </tr>-->
<!--            </table>-->
<!--        </td>-->
<!--</table>-->
</body>