/**
 * Created by Kévin Nérino on 08/07/14.
 */



function connec() {
    var lgn = $('#login').val();
    var pw = $('#motdepasse').val();
    var rmberme;
    if (document.getElementById('rememberme').checked == true) {
        rmberme = 'true';
    } else {
        rmberme = 'false';
    }
    if (lgn.length > 0 && pw.length > 0) {
        $("#errlogin").html('');
        $("#errpsw").html('');
        $.post(
            'login/ajax_login',
            {
                login: lgn,
                password: pw,
                rememberme: rmberme
            },

            function (data) {
                console.log(data);
                if (data != 1) {
                    $('#alertconnec').html('' +
                        '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>' +
                        '<strong><i class="ace-icon fa fa-times"></i>Erreur !</strong>' +
                        '<br/>' + data + '</div>');

                } else {
                    document.location.href = "http://localhost/B2E/Nextwatt/index.php/accueil";
                }
            },
            'text'
        )

    } else {
        if (pw.length > 0) {
            $("#errpsw").html('');
        } else {
            $("#errpsw").html('<div class="alert alert-danger">Champ mot de passe vide.<br></div>');
        }
        if (lgn.length > 0) {
            $("#errlogin").html('');
        } else {
            $("#errlogin").html('<div class="alert alert-danger">Champ login vide.<br></div>');
        }
    }
}
