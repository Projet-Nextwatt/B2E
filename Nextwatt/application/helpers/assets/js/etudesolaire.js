/**
 * Created by Kévin Nérino on 13/06/14.
 */
$("#station").change(function () {

    $.post(
        'ajax_heppstation',
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
        'ajax_orientation',
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
        'ajax_envoiratioc',
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
        'ajax_calculhepp',
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
        'ajax_calculprod',
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
        'ajax_recetteannuelle',
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
        'ajax_prodannuelle',
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
        'ajax_cumulprod',
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
        'ajax_tarif',
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
        'ajax_anneeflouz',
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
        'ajax_cumulflouz',
        {
            tarifAnneeZero: tarifAnneeZero,
            productionAnneeZero: productionAnneeZero,
            raccordement: raccordement
        },
        function (data) {
            if (data) {
                var flouz = JSON.parse(data);
                var content = "<table>"
                $.each(flouz, function (annee, flouzcumul) {
                    content += '<tr><td>' + 'Flouz cumul&eacute; jusqu\'&acirc; l\'ann&eacute;e ' + (annee + 1) + ' : ' + flouzcumul + ' &euro;/an </td></tr>';
                });
                content += "</table>"

                $('#flouzcumulee').empty();
                $('#flouzcumulee').append(content);
            }
        },
        'text'
    );
});
function init() {

    var canvas15 = document.getElementById("angle15");
    var canvas20 = document.getElementById("angle20");
    var canvas30 = document.getElementById("angle30");
    var canvas45 = document.getElementById("angle45");
    var canvas60 = document.getElementById("angle60");


    if (canvas15.getContext) {

        var context = canvas15.getContext("2d");

// Set the style properties.
        context.fillStyle = '#F4F4F4';
        context.strokeStyle = '#A4CE3B';
        context.lineWidth = 5;


        context.beginPath();
// Start from the top-left point.
        context.moveTo(0, 110); // give the (x,y) coordinates
        context.lineTo(0, 150);
        context.lineTo(150, 150);
        context.lineTo(0, 110);

// Done! Now fill the shape, and draw the stroke.
// Note: your shape will not be visible until you call any of the two methods.
        context.fill();

//        context.fillStyle = '#000';
//        context.font = "35px Open Sans";
//
//        context.fillText("15°", 30, 137);
//        context.font = "20px Open Sans";
        context.stroke();
        context.closePath();

    }
    if (canvas20.getContext) {

        var context = canvas20.getContext("2d");

// Set the style properties.
        context.fillStyle = '#F4F4F4';
        context.strokeStyle = '#A4CE3B';
        context.lineWidth = 5;


        context.beginPath();
// Start from the top-left point.
        context.moveTo(0, 96); // give the (x,y) coordinates
        context.lineTo(0, 150);
        context.lineTo(150, 150);
        context.lineTo(0, 96);


// Done! Now fill the shape, and draw the stroke.
// Note: your shape will not be visible until you call any of the two methods.
        context.fill();
        context.stroke();
        context.closePath();

    }
    if (canvas30.getContext) {

        var context = canvas30.getContext("2d");

// Set the style properties.
        context.fillStyle = '#F4F4F4';
        context.strokeStyle = '#A4CE3B';
        context.lineWidth = 5;


        context.beginPath();
// Start from the top-left point.
        context.moveTo(0, 64); // give the (x,y) coordinates
        context.lineTo(0, 150);
        context.lineTo(150, 150);
        context.lineTo(0, 64);


// Done! Now fill the shape, and draw the stroke.
// Note: your shape will not be visible until you call any of the two methods.
        context.fill();
        context.stroke();
        context.closePath();

    }
    if (canvas45.getContext) {

        var context = canvas45.getContext("2d");

// Set the style properties.
        context.fillStyle = '#F4F4F4';
        context.strokeStyle = '#A4CE3B';
        context.lineWidth = 5;


        context.beginPath();
// Start from the top-left point.
        context.moveTo(0, 50); // give the (x,y) coordinates
        context.lineTo(0, 150);
        context.lineTo(100, 150);
        context.lineTo(0, 50);


// Done! Now fill the shape, and draw the stroke.
// Note: your shape will not be visible until you call any of the two methods.
        context.fill();
        context.stroke();
        context.closePath();


    }
    if (canvas60.getContext) {

        var context = canvas60.getContext("2d");

// Set the style properties.
        context.fillStyle = '#F4F4F4';
        context.strokeStyle = '#A4CE3B';
        context.lineWidth = 5;


        context.beginPath();
// Start from the top-left point.
        context.moveTo(50, 50); // give the (x,y) coordinates
        context.lineTo(50, 150);
        context.lineTo(107, 150);
        context.lineTo(50, 50);


// Done! Now fill the shape, and draw the stroke.
// Note: your shape will not be visible until you call any of the two methods.
        context.fill();
        context.stroke();
        context.closePath();


    }
}

onload = init;