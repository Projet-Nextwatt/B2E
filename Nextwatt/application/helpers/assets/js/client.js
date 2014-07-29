/**
 * Created by Kévin Nérino on 29/07/14.
 */
$('#addDossier').click(function () {
    var idClient = $("input[name=id]").val();
    var nomClient = $("#nom1").val();
    var prenomClient = $("#prenom1").val();

    $.post(
        '../CI_dossier/addDossier',
        {
            idClient: idClient,
            nomClient: nomClient,
            prenomClient: prenomClient
        },
        function(data){
            if(data){
               window.location='../CI_dossier/select_dossier';
            }
        }
    )
})
