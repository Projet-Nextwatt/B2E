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
            margin: 40px;
            font: 13px/20px normal "Open Sans", sans-serif;
            color: #4F5155;
        }

        table {
            text-align: center;
            border-collapse: collapse;
        }

        th {
            background-color: #F1F1F1;
        }

        th, td {
            border: 1px solid #ddd;
        }

        td {
            text-align: center;
        }

        .grayrow {
            background-color: #f9f9f9;
        }

        caption {
            font-weight: bold
        }
    </style>
</head>
<body>
<script type="text/php">
   $watermark = $pdf->open_object();
   $w = $pdf->get_width();
   $h = $pdf->get_height();
   $pdf->text(0, 400, "TEST", Font_Metrics::get_font("verdana", "bold"),110, array(0.85, 0.85, 0.85), 100, 10);
   $pdf->close_object();
   $pdf->add_object($watermark, 'all');
</script>
<!--text( "position x", "position y","texte a aaficher",font_metrics::get_font(" Type de police"," type d'écriture"),
"Taille de caratère", array( ? , ? , ?), ? , "Ecart en les lettres") -->

<span>Vous avez choisi la station météo de : <strong><?php echo $this->session->userdata['Ville'] ?></strong></span>
<br/>
<br/>
<span>L'orientation sera de : <strong><?php echo $this->session->userdata['Orientation'] ?></strong></span>
<br/>
<br/>
<span>Le kit choisi est : <strong><?php echo $this->session->userdata['Panneau'] ?></span>
<br/>
<br/>
<br/>
<table>
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
    <tr class="grayrow">
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
    <tr class="grayrow">
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
    <tr class="grayrow">
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

</body>
</html>