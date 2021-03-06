/**
 * Created by Kévin Nérino on 13/06/14.
 */
function isInt(n) {
    return n % 1 == 0;
}



function geolocalisestation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            $.post(
                'ajax_geoposition',
                {
                    'panneau' :$('input[name=panneau]:checked').val(),
                    'latitude': position.coords.latitude,
                    'longitude': position.coords.longitude
                },
                function (data) {
                    if (data) {
                        var stationtrouvee = JSON.parse(data);
                        $('#station').append(stationtrouvee);
                        $('#station').val(stationtrouvee.ID_Ensoleillement);
                        $('.HEPP').html("Ville : <b>" + stationtrouvee.Ville + "</b> - HEPP : <span id='valeurhepp'>" + stationtrouvee.HEPP + "</span>");
                    } else {
                        $('.HEPP').html("<i class='ace-icon fa fa-exclamation-triangle icon-animated-bell bigger-125'></i> Problème choix de station");
                    }
                }
            );
        })
    }
};

function preselectstation(idEnsol) {
    $.post(
        'ajax_heppstation',
        {
            'panneau' : $('input[name=panneau]:checked').val(),
            idVille: {keyname: idEnsol}
        },
        function (data) {
            if (data) {
                var station = JSON.parse(data)
                $('#station').append(station);
                $('#station').val(station.ID_Ensoleillement);
                $('.HEPP').html("Ville : <b>" + station.Ville + "</b> - HEPP : <span id='valeurhepp'>" + station.HEPP + "</span>");
            } else {
                $('.HEPP').html("<i class='ace-icon fa fa-exclamation-triangle icon-animated-bell bigger-125'></i> Problème choix de station");
            }
        }
    )
}
$("#station").change(function () {
    $.post(
        'ajax_heppstation',
        {
            'panneau' : $('input[name=panneau]:checked').val(),
            idVille: {keyname: $('#station option:selected').val()}
        },
        function (data) {
            if (data) {
                var station = JSON.parse(data)
                console.log();
                $('.HEPP').html("Ville : <b>" + station.Ville + "</b> - HEPP : <span id='valeurhepp'>" + station.HEPP + "</span>");
            } else {
                $('.HEPP').html("<i class='ace-icon fa fa-exclamation-triangle icon-animated-bell bigger-125'></i> Problème choix de station");
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
            if (data && isInt(ratioc) && ratioc != '') {
                $(".resultratioc").html("Ration C : <span id='resultratioc'>" + data + " %</span>");
            } else {
                $(".resultratioc").html("<span class='text-danger'><i class='ace-icon fa fa-exclamation-triangle icon-animated-bell bigger-125'></i> RatioC vide ou non numérique</span> ");
            }

        },
        'text'
    );
});
function calculhepp() {

    var heppbrut = document.getElementById('valeurhepp').innerHTML;
    var orient = document.getElementById('choixorient').innerHTML.substr(0, (document.getElementById('choixorient').innerHTML).length - 1);
    var choisiratioc = document.getElementById('resultratioc').innerHTML;
    $.post(
        'ajax_calculhepp',
        {
            hepp: heppbrut,
            choixorient: orient,
            ratioc: choisiratioc
        },
        function (data) {
            if (data != 0 && data) {
                data = parseInt(data);
                $("#heppnette").html("Résultat : " + data + " h/an");
                $("#heppnet").val(data);
            } else {
                $("#heppnette").html("<span class='text-danger'><i class='ace-icon fa fa-exclamation-triangle icon-animated-bell bigger-125'></i> Calcul impossible donnée(s) manquante(s)</span> ");
            }
        },
        'text'
    );
};
$('input[name="calculprod"]').click(function () {
    var systeme = document.getElementById('systeme').value;
    var heppnet = document.getElementById('heppnet').value;
    var raccordement = $('#raccordement').val();
    var bonus = $('#bonus').val();
    $.post(
        'ajax_calculprod',
        {
            systeme: systeme,
            raccordement: raccordement,
            bonus: bonus
        },
        function (data) {
            if(heppnet !=''){
                if (data != 0) {
                    $("#resultprod").html("Production : <span id='prodcalc'>" + data + "</span> kWh/an");
                    $('#production').val(data);
                } else {
                    $("#resultprod").html("<span class='text-danger'>Calcul impossible donnée(s) manquante(s)</span> ");
                }
            }else{
                $("#resultprod").html("<span class='text-danger'><i class='ace-icon fa fa-exclamation-triangle icon-animated-bell bigger-125'></i> HEPP nette manquant</span> ");
            }

        },
        'text'
    );
});
$('input[name="recetteannuelles"]').click(function () {
    var production = document.getElementById('Production').value;
    var tarifedf = document.getElementById('tarifedf').value;
    $.post(
        'ajax_recetteannuelle',
        {
            production: production,
            tarifedf: tarifedf
        },
        function (data) {
            if (data && production !='' && tarifedf !='') {
                var recette = JSON.parse(data)
                $("#recetteannuelle").html("Recette annuelle : <span id='tarifannuel'>" + recette.annuelle + "</span> &euro;/kWh");
                $("#recettevingtans").html("Recette sur 20 ans : " + recette.vingtans + " &euro;/ sur 20 ans");
            }else{
                $("#recetteannuelle").html("<span class='text-danger'><i class='ace-icon fa fa-exclamation-triangle icon-animated-bell bigger-125'></i> Calcul impossible donnée(s) manquante(s)</span> ");
            }
        },
        'text'
    );
});
function anneeProd() {
    $.post(
        'ajax_prodannuelle',
        {},
        function (data) {
            if (data) {
                var prodAnnuelle = JSON.parse(data);
                $('#Prod1').html(prodAnnuelle[0]);
                $('#Prod2').html(prodAnnuelle[1]);
                $('#Prod3').html(prodAnnuelle[2]);
                $('#Prod10').html(prodAnnuelle[9]);
                $('#Prod15').html(prodAnnuelle[14]);
                $('#Prod20').html(prodAnnuelle[19]);


//                console.log(prodAnnuelle[2]);
//                var content = "<table>"
//                $.each(prodAnnuelle, function (annee, prodAnnuelle) {
//                    content += '<tr><td>' + 'Production pour l\'ann&eacute;e ' + (annee + 1) + ' : ' + prodAnnuelle + ' kWh/an </td></tr>';  // Création des lignes du tableau
//                });
//                content += "</table>"
//
//                $('#prodannuelle').empty();
//                $('#prodannuelle').append(content);
            }
        },
        'text'
    );
};
function cumulProd() {
    $.post(
        'ajax_cumulprod',
        {},
        function (data) {
            if (data) {
                var prodCumulee = JSON.parse(data);
                $('#ProdCumul1').html(prodCumulee[0]);
                $('#ProdCumul2').html(prodCumulee[1]);
                $('#ProdCumul3').html(prodCumulee[2]);
                $('#ProdCumul10').html(prodCumulee[9]);
                $('#ProdCumul15').html(prodCumulee[14]);
                $('#ProdCumul20').html(prodCumulee[19]);

//                var content = "<table>"
//                $.each(prodCumulee, function (annee, prodCumulAnnee) {
//                    content += '<tr><td>' + 'Production cumul&eacute; jusqu\'&acirc; l\'ann&eacute;e ' + (annee + 1) + ' : ' + prodCumulAnnee + ' kWh </td></tr>';
//                });
//                content += "</table>"
//
//                $('#prodcumulee').empty();
//                $('#prodcumulee').append(content);
            }
        },
        'text'
    );
};
function anneetarif() {
    $.post(
        'ajax_tarif',
        {},
        function (data) {
            if (data) {
                var tarif = JSON.parse(data);
                $('#tarif1').html(tarif[0]);
                $('#tarif2').html(tarif[1]);
                $('#tarif3').html(tarif[2]);
                $('#tarif10').html(tarif[9]);
                $('#tarif15').html(tarif[14]);
                $('#tarif20').html(tarif[19]);
//                var content = "<table>"
//                $.each(tarif, function (annee, tarifannee) {
//                    content += '<tr><td>' + 'Tarif pour l\'ann&eacute;e ' + (annee + 1) + ' : ' + tarifannee.toFixed(4) + ' &euro;/kWh </td></tr>';
//                });
//                content += "</table>"
//
//                $('#tarifannee').empty();
//                $('#tarifannee').append(content);
            }
        },
        'text'
    );
};
function anneeflouz() {
    $.post(
        'ajax_anneeflouz',
        {},
        function (data) {
            if (data) {
                var flouz = JSON.parse(data);
                $('#flouz1').html(flouz[0]);
                $('#flouz2').html(flouz[1]);
                $('#flouz3').html(flouz[2]);
                $('#flouz10').html(flouz[9]);
                $('#flouz15').html(flouz[14]);
                $('#flouz20').html(flouz[19]);

//                var content = "<table>"
//                $.each(flouz, function (annee, flouzannee) {
//                    content += '<tr><td>' + 'Flouz pour l\'ann&eacute;e ' + (annee + 1) + ' : ' + flouzannee + ' &euro;/an </td></tr>';
//                });
//                content += "</table>"
//
//                $('#flouzannuel').empty();
//                $('#flouzannuel').append(content);
            }
        },
        'text'
    );
};
function cumulflouz() {
    $.post(
        'ajax_cumulflouz',
        {},
        function (data) {
            if (data) {
                var cumulflouz = JSON.parse(data);
                $('#cumulflouz1').html(cumulflouz[0]);
                $('#cumulflouz2').html(cumulflouz[1]);
                $('#cumulflouz3').html(cumulflouz[2]);
                $('#cumulflouz10').html(cumulflouz[9]);
                $('#cumulflouz15').html(cumulflouz[14]);
                $('#cumulflouz20').html(cumulflouz[19]);
//                var content = "<table>"
//                $.each(flouz, function (annee, flouzcumul) {
//                    content += '<tr><td>' + 'Flouz cumul&eacute; jusqu\'&acirc; l\'ann&eacute;e ' + (annee + 1) + ' : ' + flouzcumul + ' &euro;/an </td></tr>';
//                });
//                content += "</table>"
//
//                $('#flouzcumulee').empty();
//                $('#flouzcumulee').append(content);
            }
        },
        'text'
    );
};
function canvasorient() {


    var canvas15 = document.getElementById("angle15");
    var canvas20 = document.getElementById("angle20");
    var canvas30 = document.getElementById("angle30");
    var canvas45 = document.getElementById("angle45");
    var canvas60 = document.getElementById("angle60");


    if (canvas15 && canvas15.getContext) {

        var context = canvas15.getContext("2d");

// Set the style properties.
        context.fillStyle = '#F4F4F4';
        context.strokeStyle = '#A4CE3B';
        context.lineWidth = 5;


        context.beginPath();
// Start from the top-left point.
        context.moveTo(0, 60); // give the (x,y) coordinates
        context.lineTo(0, 100);
        context.lineTo(150, 100);
        context.lineTo(0, 60);

// Done! Now fill the shape, and draw the stroke.
// Note: your shape will not be visible until you call any of the two methods.
        context.fill();
        context.stroke();
        context.closePath();

    }
    if (canvas20 && canvas20.getContext) {

        var context = canvas20.getContext("2d");

// Set the style properties.
        context.fillStyle = '#F4F4F4';
        context.strokeStyle = '#A4CE3B';
        context.lineWidth = 5;


        context.beginPath();
// Start from the top-left point.
        context.moveTo(0, 46); // give the (x,y) coordinates
        context.lineTo(0, 100);
        context.lineTo(150, 100);
        context.lineTo(0, 46);


// Done! Now fill the shape, and draw the stroke.
// Note: your shape will not be visible until you call any of the two methods.
        context.fill();
        context.stroke();
        context.closePath();

    }
    if (canvas30 && canvas30.getContext) {

        var context = canvas30.getContext("2d");

// Set the style properties.
        context.fillStyle = '#F4F4F4';
        context.strokeStyle = '#A4CE3B';
        context.lineWidth = 5;


        context.beginPath();
// Start from the top-left point.
        context.moveTo(0, 14); // give the (x,y) coordinates
        context.lineTo(0, 100);
        context.lineTo(150, 100);
        context.lineTo(0, 14);


// Done! Now fill the shape, and draw the stroke.
// Note: your shape will not be visible until you call any of the two methods.
        context.fill();
        context.stroke();
        context.closePath();

    }
    if (canvas45 && canvas45.getContext) {

        var context = canvas45.getContext("2d");

// Set the style properties.
        context.fillStyle = '#F4F4F4';
        context.strokeStyle = '#A4CE3B';
        context.lineWidth = 5;


        context.beginPath();
// Start from the top-left point.
        context.moveTo(0, 0); // give the (x,y) coordinates
        context.lineTo(0, 100);
        context.lineTo(100, 100);
        context.lineTo(0, 0);


// Done! Now fill the shape, and draw the stroke.
// Note: your shape will not be visible until you call any of the two methods.
        context.fill();
        context.stroke();
        context.closePath();


    }
    if (canvas60 && canvas60.getContext) {

        var context = canvas60.getContext("2d");

// Set the style properties.
        context.fillStyle = '#F4F4F4';
        context.strokeStyle = '#A4CE3B';
        context.lineWidth = 5;


        context.beginPath();
// Start from the top-left point.
        context.moveTo(0, 0); // give the (x,y) coordinates
        context.lineTo(0, 100);
        context.lineTo(57, 100);
        context.lineTo(0, 0);


// Done! Now fill the shape, and draw the stroke.
// Note: your shape will not be visible until you call any of the two methods.
        context.fill();
        context.stroke();
        context.closePath();


    }

}

