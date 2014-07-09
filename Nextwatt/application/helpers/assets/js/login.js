/**
 * Created by Kévin Nérino on 08/07/14.
 */
$('#connexion').click(function () {
    var lgn = $('#login').val();
    var pw = $('#motdepasse').val();
    if (lgn.length > 0 && pw.length > 0) {
        $("#errlogin").html('');
        $("#errpsw").html('');
        $.post(
            'login/ajax_login',
            {
                login: lgn,
                password: pw
            },

            function (data) {
                if (data) {
                        $('#alertconnec').html('' +
                            '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>'+
                            '<strong><i class="ace-icon fa fa-times"></i>Erreur de connexion!</strong>'+
                            data+'</div>');

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
})
