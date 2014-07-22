<div class="row form-group">
<div class="col-xs-12">

<div class='row'>
<div class='col-md-6'>
    <div class="widget-box">
        <div class="widget-header widget-header-flat">
            <h4 class='widget-title'>Fiche client</h4>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <h4><strong>
                        <?php
                        if (empty($client['prenom1'])) {
                            $civ = $client['civilite'];
                            echo($civ == 1 ? 'Madame ' : '');
                            echo($civ == 2 ? 'Mademoiselle ' : '');
                            echo($civ == 3 ? 'Monsieur ' : '');
                        }
                        echo $client['nom1'] . ' ' . $client['prenom1'];
                        if (!(empty($client['prenom2']))) {
                            echo ' et ';
                            if ($client['nom1'] != $client['nom2']) {
                                echo $client['nom2'];
                            }

                            echo ' ' . $client['prenom2'];
                        }
                        ?>
                    </strong></h4>

                <p>
                    <?php
                    echo nl2br($client['adresse']) . '<br/>'
                        . $client['codepostal'] . ' ' . $client['ville'];
                    ?>
                </p>


                <?php if (!(empty($client['email']))) { ?>
                    <p>
                        <strong>E-mail : </strong> <?php echo $client['email'] ?><br/>
                        <a href="mailto:<?php echo($client['email']) ?>">Envoyer un e-mail au client</a>
                    </p>
                <?php } ?>

                <?php if (!(empty($client['tel1'])) OR !(empty($client['tel2']))) { ?>
                    <p>
                        <strong>Téléphone : </strong>
                        <?php
                        echo $client['tel1'];
                        echo((empty($client['tel1']) OR (empty($client['tel2']))) ? '' : ' / ');
                        echo $client['tel2'];
                        ?>
                    </p>
                <?php } ?>

                <p>
                    <strong>Responsable : </strong> <?php echo $responsable; ?>
                </p>
            </div>
        </div>
    </div>
</div>


<div class='col-md-6'>
<div class='row'>
<div class='col-xs-12'>
<div class="widget-box collapsed">
<div class="widget-header widget-header-flat">
    <h4 class='widget-title'>Modification des informations</h4>
                        <span class="widget-toolbar">
                            <a href="#" data-action="collapse">
                                <i class="ace-icon fa fa-chevron-down"></i>
                            </a>
                        </span>
</div>
<div class='widget-body'>
<div class='widget-main'>
<?php
$attributes = array('class' => 'form-horizontal', 'id' => 'form_user', 'role' => 'form');
$hiden = array();

if (isset($client)) {
    $hidden = array('id' => $client['id'], 'Client' => $client['nom1']);
    echo form_open('CI_client/modif_client', $attributes, $hidden);
} else {
    echo form_open('CI_client/verif_form_client', $attributes, $hiden);
}
?>
<div class="row form-group">
    <label for="civilite" class="col-sm-4 no-padding-right control-label">Civilité</label>

    <div class="col-sm-8">
        <?php
        $civ = 3;
        if (empty($_POST) AND isset($client)) {
            $civ = $client['civilite'];
        } else {
            $civ = set_value('civilite');
        }
        ?>
        <select name="civilite" id="civilite" class="dropdown">
            <option value="1" <?php echo($civ == 1 ? 'selected' : ''); ?>>Madame</option>
            <option value="2" <?php echo($civ == 2 ? 'selected' : ''); ?>>Mademoiselle</option>
            <option value="3" <?php echo($civ == 3 ? 'selected' : ''); ?>>Monsieur</option>
        </select>
    </div>
</div>


<div class="row form-group">
    <label for="nom1" class="col-sm-4 no-padding-right control-label">Nom et Prénom</label>

    <div class="col-sm-4">
        <input type="text" value="<?php
        if (empty($_POST) AND isset($client)) {
            echo $client['nom1'];
        } else {
            echo set_value('nom1');
        }
        ?>" name="nom1" class="form-control" id="nom1"
               placeholder="Votre Nom">
    </div>
    <div class="col-sm-4">
        <input type="text" value="<?php
        if (empty($_POST) AND isset($client)) {
            echo $client['prenom1'];
        } else {
            echo set_value('prenom1');
        }
        ?>" name="prenom1"
               class="no-padding-left form-control" id="prenom1" placeholder="Votre prénom">
    </div>
    <div class="col-sm-8 col-sm-offset-4">
        <?php echo form_error('nom1'); ?>
        <?php echo form_error('prenom1'); ?>
    </div>
</div>


<div class="row form-group">
    <label for="nom2" class="col-sm-4 no-padding-right control-label">Conjoint</label>

    <div class="col-sm-4">
        <input type="text"
               name="nom2" id="nom2"
               value="<?php
               if (empty($_POST) AND isset($client)) {
                   echo $client['nom2'];
               } else {
                   echo set_value('nom2');
               }
               ?>"
               class="form-control"
               placeholder="(si différent) Nom">
    </div>
    <div class="col-sm-4">
        <input type="text" value="<?php
        if (empty($_POST) AND isset($client)) {
            echo $client['prenom2'];
        } else {
            echo set_value('prenom2');
        }
        ?>" name="prenom2" class="form-control"
               id="prenom2" placeholder="Prénom">
    </div>
    <div class="col-sm-8 col-sm-offset-4">
        <?php echo form_error('nom2'); ?>
        <?php echo form_error('prenom2'); ?>
    </div>
</div>


<h4 class='green header'></h4>

<div class="row form-group">
    <label for="adresse" class="col-sm-4 no-padding-right control-label">Adresse</label>

    <div class="col-sm-8">
        <textarea class="col-xs-12" name="adresse" rows="3"
                  id="adresse" placeholder="Votre adresse"><?php
            if (empty($_POST) AND isset($client)) {
                echo $client['adresse'];
            } else {
                echo set_value('adresse');
            }
            ?>
        </textarea>
    </div>
    <div class="col-sm-8 col-sm-offset-4">
        <?php echo form_error('adresse'); ?>
    </div>
</div>


<div class="row form-group">
    <label for="codepostal" class="col-sm-4 no-padding-right control-label">Code Postal et Ville</label>

    <div class="col-sm-3">
        <input type="text" value="<?php
        if (empty($_POST) AND isset($client)) {
            echo $client['codepostal'];
        } else {
            echo set_value('codepostal');
        }
        ?>" name="codepostal" class="form-control"
               id="codepostal" placeholder="Code Postal">
    </div>
    <div class="col-sm-5">
        <input type="text" value="<?php
        if (empty($_POST) AND isset($client)) {
            echo $client['ville'];
        } else {
            echo set_value('ville');
        }
        ?>" name="ville" id="ville"
               class="form-control" placeholder="Ville">
    </div>
    <div class="col-sm-8 col-sm-offset-4">
        <?php echo form_error('codepostal'); ?>
        <?php echo form_error('ville'); ?>
    </div>
</div>


<h4 class='green header'></h4>

<div class="row form-group">
    <label for="email" class="col-sm-4 no-padding-right control-label">Email</label>

    <div class="col-sm-8">
        <input type="email" value="<?php
        if (empty($_POST) AND isset($client)) {
            echo $client['email'];
        } else {
            echo set_value('email');
        }
        ?>" name="email" class="form-control"
               id="email" placeholder="Email">
    </div>
    <div class="col-sm-8 col-sm-offset-4">
        <?php echo form_error('email'); ?>
    </div>
</div>


<div class="row form-group">
    <label for="tel1" class="col-sm-4 no-padding-right control-label">Téléphone</label>

    <div class="col-sm-4">
        <input type="text" value="<?php
        if (empty($_POST) AND isset($client)) {
            echo $client['tel1'];
        } else {
            echo set_value('tel1');
        }
        ?>" name="tel1" class="form-control" id="tel1"
               placeholder="Teléphone fixe (par exemple)">
    </div>
    <div class="col-sm-4">
        <input type="text" value="<?php
        if (empty($_POST) AND isset($client)) {
            echo $client['tel2'];
        } else {
            echo set_value('tel2');
        }
        ?>" name="tel2" class="form-control" id="tel2"
               placeholder="Teléphone portable (par exemple)">
    </div>
    <div class="col-sm-8 col-sm-offset-4">
        <?php echo form_error('tel1'); ?>
        <?php echo form_error('tel2'); ?>
    </div>
</div>

<div class="row form-group">
    <label for="respo" class="col-sm-4 no-padding-right control-label">Responsable</label>

    <div class="col-sm-8">
        <?php
        if (empty($_POST) AND isset($client)) {
            $respo = $client['user_id'];
        } else {
            $respo = set_value('user_id');
        }
        $this->fonctionspersos->creerDropdown($users, $respo, 'user_id');
        ?>
    </div>
</div>
<div class="col-sm-8 col-sm-offset-4">
    <?php echo form_error('user_id'); ?>
</div>

<div class="row form-group">
    <div class="col-xs-offset-3 col-md-6">
        <button type="submit" class="btn btn-sm btn-info">
            <i class="ace-icon fa fa-floppy-o bigger-160"></i>
            Enregistrer
        </button>
    </div>
</div>
<?php
echo form_close();
?>
</div>
</div>
</div>
</div>
</div>


<div class='row'>
    <div class='col-xs-12'>
        <div class="widget-box">
            <div class="widget-header widget-header-flat">
                <h4 class='widget-title'>Actions</h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">

                    <?php if (isset($client) && $client['actif'] == 0) { ?>
                        <button type="button" data-toggle="modal" data-target="#Confsuppr"
                                class="btn btn-sm btn-danger">
                            <i class="ace-icon fa fa-trash-o bigger-160"></i>
                            Supprimer
                        </button>
                    <?php } ?>


                    <?php if (isset($client) && $client['actif'] == 1) { ?>
                        <button type="button" data-toggle="modal" data-target="#Confarchiver"
                                class="btn btn-sm btn-warning">
                            <i class="ace-icon fa fa-trash-o bigger-160"></i>
                            Archiver
                        </button>
                    <?php } ?>





                    <?php if (isset($client) && $client['actif'] == 0) { ?>
                        <button type="button" data-toggle="modal" data-target="#Confactiver"
                                class="btn btn-sm btn-success">
                            <i class="ace-icon fa fa-check bigger-160"></i>
                            Désarchiver
                        </button>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>


</div>
<!-- fin de l'a colonne n°2-->


</div>
<!-- fin de la première row -->

<div class='row'>
<div class='col-md-12'>
    <div class="widget-box">
        <div class="widget-header widget-header-flat">
            <h4 class='widget-title'>Dossiers</h4>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                le 1<br/>le 2
            </div>
        </div>
    </div>
</div>
</div>

</div>
<!-- Fin d conteneur pricipal --></div>


<!-- Modal box supprimer -->
<div id="Confsuppr" class="modal fade">
    <div class="modal-dialog" style="display: block; height: auto; width: 300px; top: 194px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title"><i class="ace-icon fa fa-exclamation-triangle red"></i> Supprimer l'élément ?
                </h4>
            </div>
            <div class="modal-body alert alert-info bigger-110">
                <p>Vous êtes sur le point de supprimer le client.</p>
            </div>
            <p class="bigger-110 bolder center grey">
                <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
                Êtes vous sur ?
            </p>

            <div class="modal-footer">
                <?php
                $attributes = array('class' => 'form-horizontal', 'id' => 'form_user', 'role' => 'form');
                $hidden = array();

                $hidden = array('id' => $client['id'], 'Client' => $client['nom1']);
                echo form_open('CI_client/ajax_supprimerclient', $attributes, $hidden);
                ?>
                <button type="submit" class="btn btn-sm btn-danger">Suppression</button>
                <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">Annuler</button>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!--Modal box pour archivage -->
<div id="Confarchiver" class="modal fade">
    <div class="modal-dialog" style="display: block; height: auto; width: 300px; top: 194px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title"><i class="ace-icon fa fa-exclamation-triangle red"></i> Archiver le client ?
                </h4>
            </div>
            <div class="modal-body alert alert-info bigger-110">
                <p>Vous êtes sur le point d'archiver ce client.</p>
            </div>
            <p class="bigger-110 bolder center grey">
                <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
                Êtes vous sur ?
            </p>

            <div class="modal-footer">
                <?php
                $attributes = array('class' => 'form-horizontal', 'id' => 'form_user', 'role' => 'form');
                $hidden = array();

                $hidden = array('id' => $client['id'], 'Client' => $client['nom1']);
                echo form_open('CI_client/ajax_archiverclient', $attributes, $hidden);
                ?>
                <button type="submit" class="btn btn-sm btn-danger">Archiver</button>
                <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">Annuler</button>

                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal box pour désarchivage -->
<div id="Confactiver" class="modal fade">
    <div class="modal-dialog" style="display: block; height: auto; width: 300px; top: 194px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title"><i class="ace-icon fa fa-exclamation-triangle red"></i> Désarchiver le client ?
                </h4>
            </div>
            <div class="modal-body alert alert-info bigger-110">
                <p>Vous êtes sur le point de désarchiver ce client.</p>
            </div>
            <p class="bigger-110 bolder center grey">
                <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
                Êtes vous sur ?
            </p>

            <div class="modal-footer">
                <?php
                $attributes = array('class' => 'form-horizontal', 'id' => 'form_user', 'role' => 'form');
                $hidden = array();
                $hidden = array('id' => $client['id'], 'Client' => $client['nom1']);
                echo form_open('CI_client/ajax_activerclient', $attributes, $hidden);
                ?>
                <button type="submit" class="btn btn-sm btn-danger">Confirmer</button>
                <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">Annuler</button>
                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->
