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
                    'latitude': position.coords.latitude,
                    'longitude': position.coords.longitude
                },
                function (data) {
                    if (data) {
                        var stationtrouvee = JSON.parse(data);
                        $('#station').append(stationtrouvee);
                        $('#station').val(stationtrouvee.id);
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
            'panneau': $('input[name=panneau]:checked').val(),
            idVille: {keyname: $('#station option:selected').val()}
        },
        function (data) {
            if (data) {
                var station = JSON.parse(data)
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
                document.location.href="calculmasque";
              //  $('.choixorient').html("Orientation choisie : <span id='choixorient'>" + data + "</span>");
            }
        },
        'text'
    );
});
$('#ratioc').keyup(function () {
        var ratioc = $('#ratioc').val();
        if (isInt(ratioc) && ratioc != '') {
            if (ratioc <= 100) {
                $.post(
                    'ajax_envoiratioc',
                    {
                        ratioc: ratioc
                    },
                    function (data) {
                        if (data) {
                            if (ratioc <= 100) {
                                $(".resultratioc").html("Ratio C : <span id='resultratioc'>" + data + " %</span>");
                            } else {
                                $(".resultratioc").html("<span class='text-danger'><i class='ace-icon fa fa-exclamation-triangle icon-animated-bell bigger-125'></i>Erreur serveur.</span> ");
                            }
                        }

                    },
                    'text'
                );
            } else {
                $(".resultratioc").html("<span class='text-danger'><i class='ace-icon fa fa-exclamation-triangle icon-animated-bell bigger-125'></i> RatioC doit être inférieur à 100.</span> ");
            }
        } else {
            $(".resultratioc").html("<span class='text-danger'><i class='ace-icon fa fa-exclamation-triangle icon-animated-bell bigger-125'></i> RatioC vide ou non numérique</span> ");
        }

    }
)
;

$('input[name="systeme"]').keyup(function () {
    calculprod()
});
$('#raccordement').change(function () {
    calculprod()
});
$('#bonus').keyup(function () {
    calculprod()
});
$('#puissance').keyup(function () {
    calculprod()
});


function calculprod() {
    var systeme = document.getElementById('puissance').value;
    var heppnet = document.getElementById('heppnet').value;
    var raccordement = $('#raccordement').val();
    var bonus = $('#bonus').val();
    if (heppnet != '') {
        $.post(
            'ajax_calculprod',
            {
                systeme: systeme,
                raccordement: raccordement,
                bonus: bonus
            },
            function (data) {
                if (data != 0) {
                    $("#resultprod").html("Production : <span id='prodcalc'>" + data + "</span> kWh/an");
                    $('#production').val(data);
                } else {
                    $("#resultprod").html("<span class='text-danger'>Calcul impossible donnée(s) manquante(s)</span> ");
                }
            },
            'text'
        );
    } else {
        $("#resultprod").html("<span class='text-danger'><i class='ace-icon fa fa-exclamation-triangle icon-animated-bell bigger-125'></i> HEPP nette manquant</span> ");
    }
}
$("#produit").change(function () {
    $.post(
        'ajax_panneau',
        {
            id: $('#produit option:selected').val()
        },
        function (data) {
            if (data) {
                var d = JSON.parse(data);
                if (d[1] != '0') {
                    $('#puissance').val(d.puissance);
                    if (d.raccorde == 'TRUE') {
                        document.getElementById("raccordement").checked = true;
                    } else {
                        document.getElementById("raccordement").checked = false;
                    }
                    if (typeof(d.bonusProd) != "undefined" && d.bonusProd != null) {
//                    document.getElementById('divbonus').classList.remove("hidden");
                        $('#bonus').val(d.bonusProd / 100);
                    } else {
                        $('#bonus').val(null);
//                    document.getElementById('divbonus').classList.add("hidden");
                    }
                    if (typeof(d.chauffage) != "undefined" && d.chauffage != null) {
//                    document.getElementById('divchauffage').classList.remove("hidden");
                        $('#chauffage').val(d.chauffage);
                    } else {
                        $('#chauffage').val(null);
//                    document.getElementById('divchauffage').classList.add("hidden");
                    }

                    if (typeof(d.ECS) != "undefined" && d.ECS != null) {
//                    document.getElementById('divecs').classList.remove("hidden");
                        $('#ecs').val(d.ECS);
                    } else {
                        $('#ecs').val(null);
//                    document.getElementById('divecs').classList.add("hidden");
                    }
                    $("#resultprod").html("Production : <span id='prodcalc'>" + d[0].toFixed(2) + "</span> kWh/an");
                } else {
                    $("#resultprod").html("<span class='text-danger'><i class='ace-icon fa fa-exclamation-triangle icon-animated-bell bigger-125'></i> HEPP nette manquant</span> ");
                }
            } else {
                $("#resultprod").html("<span class='text-danger'>Calcul impossible donnée(s) manquante(s)</span> ");
            }
        },

        'text'
    );
});
$('input[name="Production"]').keyup(function () {
    calculrecette()
});

function calculrecette() {
    var production = document.getElementById('Production').value;
    var tarifedf = document.getElementById('tarifedf').value;
    $.post(
        'ajax_recetteannuelle',
        {
            production: production,
            tarifedf: tarifedf
        },
        function (data) {
            if (data && production != '' && tarifedf != '') {
                var recette = JSON.parse(data)
                $("#recetteannuelle").html("Recette annuelle : <span id='tarifannuel'>" + recette.annuelle + "</span> &euro;");
                $("#recettevingtans").html("Recette sur 20 ans : " + recette.vingtans + " &euro; sur 20 ans");
            } else {
                $("#recetteannuelle").html("<span class='text-danger'><i class='ace-icon fa fa-exclamation-triangle icon-animated-bell bigger-125'></i> Calcul impossible donnée(s) manquante(s)</span> ");
                $("#recettevingtans").html("");
            }
        },
        'text'
    );
}
$('#test').click(function () {
    var tabrecette = document.getElementById('table-recette').innerHTML;
    $.post(
        'ajax_tabrecette',
        {
            tabrecette: tabrecette
        },
        function (data) {

        }
    )
})
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

};
var img = document.getElementById("img_ID")
if (img) {
    $('#img_ID').mapster({
        fillOpacity: 0.5,
        fillColor: "DAF298",
        stroke: true,
        strokeColor: "DAF298",
        strokeOpacity: 0.5,
        strokeWidth: 4,
        mapKey: 'masque'
    });
}
$('.areamasque').click(function () {
    $.post(
        'ajax_envoiratioc',
        {
            masque: $('#img_ID').mapster('get')
        },
        function (data) {
            if (data) {
                console.log(data);
                $('#ratioc').val(data);
                $(".resultratioc").html("Ratio C : <span id='resultratioc'>" + data + " %</span>");
            }
        },
        'text'
    )
});
// Resize the map to fit within the boundaries provided
var resizeTime = 0;     // total duration of the resize effect, 0 is instant
var resizeDelay = 0;    // time to wait before checking the window size again
// the shorter the time, the more reactive it will be.
// short or 0 times could cause problems with old browsers
function resize(maxWidth, maxHeight) {
    var image = $('#img_ID'),
        imgWidth = image.width(),
        imgHeight = image.height(),
        newWidth = 0,
        newHeight = 0;

    if (imgWidth / maxWidth > imgHeight / maxHeight) {
        newWidth = maxWidth;
    } else {
        newHeight = maxHeight;
    }
    image.mapster('resize', newWidth, newHeight, resizeTime);
}

// Track window resizing events, but only actually call the map resize when the
// window isn't being resized any more

function onWindowResize() {

    var curWidth = $(window).width(),
        curHeight = $(window).height(),
        checking = false;
    if (checking) {
        return;
    }
    checking = true;
    window.setTimeout(function () {
        var newWidth = $(window).width(),
            newHeight = $(window).height();
        if (newWidth === curWidth &&
            newHeight === curHeight) {
            resize(newWidth, newHeight);
        }
        checking = false;
    }, resizeDelay);
}

$(window).bind('resize', onWindowResize);

$('#typepanneau').change(function () {
    selectpanneau();
});
$('#raccord').change(function () {
    selectpanneau();
});

function selectpanneau() {
    var racc;
    if (document.getElementById('raccord').checked == true) {
        racc = 'true';
    } else {
        racc = 'false';
    }
    $.post(
        'ajax_selectpanneaucritere',
        {
            type: $('#typepanneau').val(),
            raccordement: racc
        },
        function (data) {
            if (data) {
                var ref = null;
                var info = JSON.parse(data);
                $('#produit').empty();
                $('#produit').append('<option></option>');
                for (var i in info) {
                    if (info[i]['Reference'] != ref) {
                        ref = info[i]['Reference'];
                        $('#produit').append('<option value="' + info[i]['id'] + '">' + info[i]['Nom'] + '</option>');

                    }
                }
            }
        },
        'text'
    )
}

