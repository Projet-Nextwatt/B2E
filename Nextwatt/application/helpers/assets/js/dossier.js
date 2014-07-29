$("tr").click(function () {
    console.log($(this).html());
    console.log($(this).find("td:first-child").html());
    console.log($(this).find("td:nth-child(2)").html());
    console.log($(this).find("td:nth-child(3)").html());

    var idClient = $(this).find("td:first-child").html();
    var nomClient = $(this).find("td:nth-child(2)").html();
    var prenomClient = $(this).find("td:nth-child(3)").html();

    $.post(
        'ajax_addDossier',
        {
            idClient: idClient,
            nomClient: nomClient,
            prenomClient: prenomClient
        },
        function (data) {
            if (data) {
                document.location.href = "choix_action";
            } else {
            }
        },
        'text'
    );
});
