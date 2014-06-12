<?php
$region = NULL;
?>
<form name='formhepp'>
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
</form>

<fieldset style="display: inline-block">
    <legend>R&eacute;sultat</legend>
    <span class="HEPP"></span>
</fieldset>
<br/>
<br/>
<br/>
<br/>
<table style="text-align: center">
    <tr>
        <td>
        </td>
        <td>
            <img src="<?php echo $quinze ?>" height="251" width="200">
        </td>
        <td>
            <img src="<?php echo $vingt ?>" height="251" width="200">
        </td>
        <td>
            <img src="<?php echo $trente ?>" height="251" width="200">
        </td>
        <td>
            <img src="<?php echo $quarantecinq ?>" height="251" width="200">
        </td>
        <td>
            <img src="<?php echo $soixante ?>" height="251" width="200">
        </td>
    </tr>
    <tr>
        <td>
            <b> SUD</b>
        </td>
        <td>
            <span class="orientation"> 98 %</span>
        </td>
        <td>
            <span class="orientation"> 100 %</span>
        </td>
        <td>
            <span class="orientation"> 100 %</span>
        </td>
        <td>
            <span class="orientation"> 100 %</span>
        </td>
        <td>
            <span class="orientation"> 91 %</span>
        </td>
    </tr>
    <tr>
        <td>
            <b> SUD-EST / SUD-OUEST</b>
        </td>
        <td>
            <span class="orientation"> 93 %</span>
        </td>
        <td>
            <span class="orientation"> 96 %</span>
        </td>
        <td>
            <span class="orientation"> 95 %</span>
        </td>
        <td>
            <span class="orientation"> 91 %</span>
        </td>
        <td>
            <span class="orientation"> 84 %</span>
        </td>
    </tr>
    <tr>
        <td>
            <b> EST / OUEST</b>
        </td>
        <td>
            <span class="orientation"> 85 %</span>
        </td>
        <td>
            <span class="orientation">  88 %</span>
        </td>
        <td>
            <span class="orientation"> 84 %</span>
        </td>
        <td>
            <span class="orientation"> 77 %</span>
        </td>
        <td>
            <span class="orientation"> 68 %</span>
        </td>
    </tr>
</table>
<br/>
<span class="choixorient"></span>
<br/>
<br/>
<br/>
<br/>
<br/>
<fieldset style="display: inline-block">
    <legend>Pertes dues au masques</legend>
    <span> Ratio C (100% - perte): </span>
    <?php
    $ratioc = array(

        'name' => 'ratioc',

        'id' => 'ratioc',

        'placeholder' => '100%',

        'value' => '100'

    );
    echo form_input($ratioc);
    echo form_submit('envoiratioc', 'valider');
    ?>
    <br/>
    <span class="resultratioc"></span>
</fieldset>
<br/>
<br/>

<fieldset style="display: inline-block">
    <legend>HEPP "nette"</legend>
    <button id="calculhepp">Calculer</button>
    <span id="heppnette"></span>
</fieldset>
<br/>
<br/>

<fieldset style="display: inline-block">
    <legend>Production</legend>
    <?php
    $systeme = array(

        'name' => 'systeme',

        'id' => 'systeme',

        'placeholder' => 'Systeme',

        'value' => set_value('systeme')

    );
    echo form_input($systeme);
    $heppnet = array(

        'name' => 'heppnet',

        'id' => 'heppnet',

        'placeholder' => ' HEPP net',

    );
    echo form_input($heppnet);
    $id = 'id="bonus"';
    $option = array(
        '0' => ' Pas de bonus',
        '10' => ' Bonus de 10%'
    );

    echo form_dropdown('Raccordementflouz', $option, '', $id);
    echo form_submit('calculprod', 'valider');
    ?>
    <br/>
    <span id="resultprod"></span>
</fieldset>
<br/>
<fieldset style="display: inline-block">
    <legend>Recette</legend>
    <?php
    $production = array(

        'name' => 'production',

        'id' => 'production',

        'placeholder' => 'Production',

        'value' => set_value('Production')

    );
    echo form_input($production);
    $tarifedf = array(

        'name' => 'tarifedf',

        'id' => 'tarifedf',

        'placeholder' => 'Tarif EDF'
    );
    echo form_input($tarifedf);
    echo form_submit('recetteannuelles', 'valider');
    ?>
    <br/>
    <span id="recetteannuelle"></span>
    <br/>
    <span id="recettevingtans"></span>
</fieldset>
<br/>
<br/>
<fieldset style="display:inline-block">
    <legend>Production &acirc; l'ann&eacute;e</legend>
    <?php
    echo form_submit('BTNanneeprod', 'valider');
    ?>
    <br/>
    <span id="prodannuelle"></span>
</fieldset>
<fieldset style="display:inline-block">
    <legend>Production cumul&eacute;e jusqu'&acirc; l'ann&eacute;e</legend>
    <?php
    echo form_submit('BTNcumulprod', 'valider');
    ?>
    <br/>
    <span id="prodcumulee"></span>
</fieldset>
<fieldset style="display:inline-block">
    <legend>Tarif &acirc; l'ann&eacute;e</legend>
    <?php

    echo form_submit('BTNtarif', 'valider');
    ?>
    <br/>
    <span id="tarifannee"></span>
</fieldset>
<fieldset style="display:inline-block">
    <legend>Flouz &acirc; l'ann&eacute;e</legend>
    <?php
    $id = 'id="raccordementflouz"';
    $option = array(
        '2' => ' Raccord&eacute; (2 %)',
        '10' => ' Isol&eacute; (10 %)'
    );

    echo form_dropdown('Raccordementflouz', $option, '', $id);
    echo form_submit('BTNanneeflouz', 'valider');
    ?>
    <br/>
    <span id="flouzannuel"></span>
</fieldset>
<fieldset style="display:inline-block">
    <legend>Flouz cumul&eacute; &acirc; l'ann&eacute;e</legend>
    <?php
    $id = 'id="raccordementflouz"';
    $option = array(
        '2' => ' Raccord&eacute; (2 %)',
        '10' => ' Isol&eacute; (10 %)'
    );

    echo form_dropdown('Raccordementflouz', $option, '', $id);
    echo form_submit('BTNcumulflouz', 'valider');
    ?>
    <br/>
    <span id="flouzcumulee"></span>
</fieldset>

<script type="text/javascript" src="<?php echo $jquerymin ?>"></script>
<script type="text/javascript">
$("#station").change(function () {

    $.post(
        'pv/heppstation',
        {
            idVille: {keyname: $('#station option:selected').val()}
        },
        function (data) {
            if (data) {
                var station = JSON.parse(data)
                $('.HEPP').html("Ville : <b>" + station.Ville + "</b> - HEPP : <span id='valeurhepp'>" + station.HEPP + "</span>");
            } else {
                $('.HEPP').html('Problème choix de station');
            }
        },

        'text'
    );
});
$(".orientation").click(function () {
    var choixorient = $(this).text();
    $.post(
        'pv/orientation',
        {
            orientation: choixorient
        },
        function (data) {
            if (data) {
                $('.choixorient').html("Orientation choisie : <span id='choixorient'>" + data + "</span>");
            }
        },
        'text'
    );
});
$('input[name="envoiratioc"]').click(function () {
    var ratioc = $('#ratioc').val();
    $.post(
        'pv/envoiratioc',
        {
            ratioc: ratioc
        },
        function (data) {
            if (data) {
                $(".resultratioc").html("Ration C : <span id='resultratioc'>" + data + " %</span>");
            }
        },
        'text'
    );
});
$('#calculhepp').click(function () {

    var heppbrut = document.getElementById('valeurhepp').innerHTML;
    var orient = document.getElementById('choixorient').innerHTML.substr(0, (document.getElementById('choixorient').innerHTML).length - 1);
    var choisiratioc = document.getElementById('resultratioc').innerHTML.substr(0, (document.getElementById('resultratioc').innerHTML).length - 1);
    $.post(
        'pv/calculhepp',
        {
            hepp: heppbrut,
            choixorient: orient,
            ratioc: choisiratioc
        },
        function (data) {
            if (data) {
                $("#heppnette").html("HEPP \"nette\" : " + data + " h/an");
                $("#heppnet").val(data);
            }
        },
        'text'
    );
});
$('input[name="calculprod"]').click(function () {
    var systeme = document.getElementById('systeme').value;
    var heppnet = document.getElementById('heppnet').value;
    var bonus = $('#bonus').val();
    $.post(
        'pv/calculprod',
        {
            systeme: systeme,
            heppnet: heppnet,
            bonus: bonus
        },
        function (data) {
            if (data) {
                $("#resultprod").html("Production : <span id='prodcalc'>" + data + "</span> kWh/an");
                $('#production').val(data);
            }
        },
        'text'
    );
});
$('input[name="recetteannuelles"]').click(function () {
    var production = document.getElementById('production').value;
    var tarifedf = document.getElementById('tarifedf').value;
    $.post(
        'pv/recetteannuelle',
        {
            production: production,
            tarifedf: tarifedf
        },
        function (data) {
            if (data) {
                var recette = JSON.parse(data)
                $("#recetteannuelle").html("Recette annuelle : <span id='tarifannuel'>" + recette.annuelle + "</span> &euro;/kWh");
                $("#recettevingtans").html("Recette sur 20 ans : " + recette.vingtans + " &euro;/ sur 20 ans");
            }
        },
        'text'
    );
});
$('input[name="BTNanneeprod"]').click(function () {
    var prodAnneeZero = document.getElementById('prodcalc').innerHTML;
    $.post(
        'pv/prodannuelle',
        {
            prodanneezero: prodAnneeZero
        },
        function (data) {
            if (data) {
                var prodAnnuelle = JSON.parse(data);
                var content = "<table>"
                $.each(prodAnnuelle, function (annee, prodAnnuelle) {
                    content += '<tr><td>' + 'Production pour l\'ann&eacute;e ' + (annee + 1) + ' : ' + prodAnnuelle + ' kWh/an </td></tr>';  // Création des lignes du tableau
                });
                content += "</table>"

                $('#prodannuelle').empty();
                $('#prodannuelle').append(content);
            }
        },
        'text'
    );
});
$('input[name="BTNcumulprod"]').click(function () {
    var prodAnneeZero = document.getElementById('prodcalc').innerHTML;
    $.post(
        'pv/cumulprod',
        {
            prodanneezero: prodAnneeZero
        },
        function (data) {
            if (data) {
                var prodCumulee = JSON.parse(data);
                var content = "<table>"
                $.each(prodCumulee, function (annee, prodCumulAnnee) {
                    content += '<tr><td>' + 'Production cumul&eacute; jusqu\'&acirc; l\'ann&eacute;e ' + (annee + 1) + ' : ' + prodCumulAnnee + ' kWh </td></tr>';
                });
                content += "</table>"

                $('#prodcumulee').empty();
                $('#prodcumulee').append(content);
            }
        },
        'text'
    );
});
$('input[name="BTNtarif"]').click(function () {
    var tarifAnneeZero = $('#tarifedf').val();
    var raccordement = $('#raccordementflouz').val();
    $.post(
        'pv/tarif',
        {
            tarifAnneeZero: tarifAnneeZero,
            raccordement: raccordement
        },
        function (data) {
            if (data) {
                var tarif = JSON.parse(data);
                var content = "<table>"
                $.each(tarif, function (annee, tarifannee) {
                    content += '<tr><td>' + 'Tarif pour l\'ann&eacute;e ' + (annee + 1) + ' : ' + tarifannee.toFixed(4) + ' &euro;/kWh </td></tr>';
                });
                content += "</table>"

                $('#tarifannee').empty();
                $('#tarifannee').append(content);
            }
        },
        'text'
    );
});
    $('input[name="BTNanneeflouz"]').click(function () {
        var tarifAnneeZero = $('#tarifedf').val(); // Récup le tarif à l'année zéro
        var productionAnneeZero = document.getElementById('prodcalc').innerHTML; // Récup la prod à l'année zéro
        var raccordement = $('#raccordementflouz').val();
        $.post(
            'pv/anneeflouz',
            {
                tarifAnneeZero: tarifAnneeZero,
                productionAnneeZero: productionAnneeZero,
                raccordement: raccordement
            },
            function (data) {
                if (data) {
                    var flouz = JSON.parse(data);
                    var content = "<table>"
                    $.each(flouz, function (annee, flouzannee) {
                        content += '<tr><td>' + 'Flouz pour l\'ann&eacute;e ' + (annee + 1) + ' : ' + flouzannee + ' &euro;/an </td></tr>';
                    });
                    content += "</table>"

                    $('#flouzannuel').empty();
                    $('#flouzannuel').append(content);
                }
            },
            'text'
        );
    });
    $('input[name="BTNcumulflouz"]').click(function () {
        var tarifAnneeZero = $('#tarifedf').val(); // Récup le tarif à l'année zéro
        var productionAnneeZero = document.getElementById('prodcalc').innerHTML; // Récup la prod à l'année zéro
        var raccordement = $('#raccordementflouz').val();
        $.post(
            'pv/cumulflouz',
            {
                tarifAnneeZero: tarifAnneeZero,
                productionAnneeZero: productionAnneeZero,
                raccordement: raccordement
            },
            function (data) {
                if (data) {
                    var flouz = JSON.parse(data);
                    var content = "<table>"
                    $.each(flouz, function (annee, flouzannee) {
                        content += '<tr><td>' + 'Flouz cumul&eacute; jusqu\'&acirc; l\'ann&eacute;e ' + (i + 1) + ' : ' + flouzCumul + ' &euro;/an </td></tr>';
                    });
                    content += "</table>"

                    $('#flouzcumulee').empty();
                    $('#flouzcumulee').append(content);
                }
            },
            'text'
        );
    });
    $('input[name="BTNcumulflouz"]').click(function () {
        var tarifAnneeZero = $('#tarifedf').val(); // Récup le tarif à l'année zéro
        var productionAnneeZero = document.getElementById('prodcalc').innerHTML; // Récup la prod à l'année zéro
        var flouztotal = tarifAnneeZero * productionAnneeZero;


        var raccordement = $('#raccordementflouz').val();
        var raisontarif = 1 + (raccordement / 100);
        var raisonprod = 1 - (0.5 / 100);
        var raisontotale = raisontarif * raisonprod;


        var raisonflouz;
        var flouzCumul;


        var content = "<table>"
        for (var i = 0; i < 20; i++) {
            raisonflouz = Math.pow(raisontotale, (i + 1))
            flouzCumul = (flouztotal * ((1 - raisonflouz) / (1 - raisontotale))).toFixed();
            content += '<tr><td>' + 'Flouz cumul&eacute; jusqu\'&acirc; l\'ann&eacute;e ' + (i + 1) + ' : ' + flouzCumul + ' &euro;/an </td></tr>';
        }
        content += "</table>"

        $('#flouzcumulee').empty();
        $('#flouzcumulee').append(content);
    });
</script>